<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title></title>
    <link rel="stylesheet" type="text/css" href="{{url('frontend/css/style.css')}}">
</head>
<body>

<div class="container-fluid" style="margin-top:50px">
    <div class="wrap-sm text-center">
        <h3>Select your operator</h3>
        <div class="row input-lg item-options">
            <div class="item">
                <input id="telenor" type="radio" id="operator" name="operator" value="gp"/>
                <label for="telenor">
                    <img src="{{url('images/telenor-logo.png')}}" />
                    <span class="sr-only">Gramee</span>
                </label>
            </div>
            <div class="item">
                <input id="wavemoney" type="radio" id="operator" name="operator" value="rb"/>
                <label for="wavemoney">
                    <img src="{{url('images/wavemoney-logo.png')}}" />
                    <span class="sr-only">Robi</span>
                </label>
            </div>
        </div>
        <div class="row">
            <button type="submit" id="check">Next</button>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</body>
</html>