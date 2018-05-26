<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\WaveHelper;
use Session;

class FbKitController extends Controller
{
    public function index(Request $request) {
    	dd(Session::all());
		$code=$request->get('code');
	    if ($code) {
	    $auth = file_get_contents( 'https://graph.accountkit.com/v1.0/access_token?grant_type=authorization_code&code='.  $code .'&access_token=AA|'.config('custom.FB_ACCOUNT_KIT_APP_ID').'|'.config('custom.FB_ACCOUNT_KIT_APP_SECRET'));

	    $access = json_decode( $auth, true );
	    if( empty( $access ) || !isset( $access['access_token'] ) ){
	       return array( "status" => 1, "message" => "Unable to verify the phone number." );
	     }
	    $appsecret_proof= hash_hmac( 'sha256', $access['access_token'], config('custom.FB_ACCOUNT_KIT_APP_SECRET'));
	    return $this->send_request($appsecret_proof,$access['access_token']);
	    }else{
	    	return "failed";
	        // return view('web.pages.failed');
	    }
    }

    private function send_request($appsecret_proof,$access_token) {
    	$ch = curl_init();
		// Set query data here with the URL
		curl_setopt($ch, CURLOPT_URL, 'https://graph.accountkit.com/v1.0/me/?access_token='. $access_token.'&appsecret_proof='. $appsecret_proof ); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($ch, CURLOPT_TIMEOUT, '4');
		$resp = trim(curl_exec($ch));
        curl_close($ch);
        $info = json_decode( $resp, true );
		if( empty( $info ) || !isset( $info['phone'] ) || isset( $info['error'] ) ){
		    return array( "status" => 2, "message" => "Unable to verify the phone number." );
		}

		$valid_msisdn = $info['phone']['national_number'];

		$msisdn = '0' . $info['phone']['national_number'];
		Session::put('msisdn', $msisdn);
		return Session::all();
		return redirect('/verify');
		// $wave = new WaveHelper;
		// $payment = json_decode($wave->wave_payment($msisdn, 1, "MMK"), true);
		// dd($payment);

		// if ($payment['success']) {
		//     return "success";
		// } else {
		//     return "error";
		// }
    }
}
