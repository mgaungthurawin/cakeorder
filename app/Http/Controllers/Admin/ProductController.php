<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Product;
use App\Admin\Category;
use Flash;
use App\Http\Requests\ProductRequest;
use App\Helper\ImageHelper;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->get('title')) {
            $products = Product::where('title', 'like', '%' . $request->get('title') . '%')->paginate(10);
            return $this->indexpage($products);
        }

        $products = Product::orderBy('id', 'DESC')->paginate(10);
        return $this->indexpage($products);
    }

    private function indexpage($products) {
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $imagehelper = new ImageHelper;
        $image_name = $imagehelper->upload($request, 'image', 'images');

        $data = $request->all();
        $data['image'] = $image_name;
        $product = Product::create($data);
        $product->categories()->sync($request->category_id);

        Flash::success('successfully save the product');
        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('categories')->find($id);

        if (empty($product)) {
            Flash::error('Product not found');
            return redirect(route('product.index'));
        }

        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $selected = $product->categories()->pluck('category_id')->all();

        if (empty($product)) {
            Flash::error('Product no found');
            return redirect(route('product.index'));
        }
        return view('admin.product.edit', compact('product', 'categories', 'selected'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        if (!empty($request->image)) {
            $imagehelper = new ImageHelper;
            $image_name = $imagehelper->upload($request, 'image', 'images');
            $data['image'] = $image_name;
            unlink(public_path($data['img']));
        }

        Product::find($id)->update($data);
        $product = Product::find($id);
        $product->categories()->sync($request->category_id);
        Flash::success('successfully update the product');
        return redirect(route('product.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        $product = Product::find($id);
        $image = $product->image;
        $product->delete();
        unlink(public_path($image));
        Flash::success('product deleted successfully');            
        return redirect(route('product.index'));
    }
}







