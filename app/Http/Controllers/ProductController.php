<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use Session;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id','desc')->get();
        return view('admin.products.index')->withProducts($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'product_name'=>'required|max:255',
            //'cat_id'=>'required'
            ));

        $data = new Product;
        $data->product_name = $request->product_name;
        $data->user_id = Auth::user()->id;
        $data->save();
        return redirect()->route('products.edit',$data->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){}

    public function productHide($id){
        $data = Product::find($id);
        if($data->publication_status==0){
            $data->publication_status = 1;
        }else{
            $data->publication_status = 0;
        }
        
        $data->save();
        return redirect()->back();
    }

    public function productDelevery()
    {
        $orders = Order::latest()->paginate(10);
        return view('admin.products.productDelevery')->withOrders($orders);
    }

    public function productDeleveryConfirm($id)
    {
        $order = Order::findOrFail($id);
            $order->confirm = 1;
            $order->save();

        return redirect()->route('productDelevery');
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
        return view('admin.products.edit')->withProduct($product);
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
        $this->validate($request, array(
            'product_name'=>'required|max:255',
            'price'=>'numeric|required',
            'pv'=>'numeric|required',
            'description'=>'required',
            'photo'=>'nullable|image:max:1024',
            ));

        $data = Product::find($id);
        $data->product_name = $request->product_name;
        $data->price = $request->price;
        $data->pv = $request->pv;
        $data->reduced_price = $request->reduced_price;
        $data->description = $request->description;
        $data->publication_status = 1;
        $image = $request->file('photo');
        if ($image) {

            $old_image_path = public_path().'/upload/product/'.$data->photo;
                if(file_exists($old_image_path)) {
                //dd($old_image_path);exit;
                  @unlink($old_image_path);
            }

            $upload = 'public/upload/product';
            $filename = time() . '_' . $image->getClientOriginalName();
            $success = $image->move($upload, $filename);

            if ($success) {
                $data->photo = $filename;
                $data->save();
                Session::flash('success','Product Successfully Save');

                return redirect()->route('products.edit',$data->id);
            } else {
                Session::flash('success', "Image couldn't be uploaded.");
                return redirect()->route('products.edit',$data->id);
            }
        } else {
        $data->save();
        }
        return redirect()->route('products.edit',$data->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=Product::find($id);
        
        if($item){
            $order = Order::where('product_id',$id)->get();
            if($order){
                Session::flash('warning','Already Sales.');                    
                }else{
                    $old_image_path = public_path().'/upload/product/'.$item->photo;
                    if(file_exists($old_image_path)) {
                      @unlink($old_image_path);
                }
                $item->delete();
                Session::flash('success','Removed');                
            }
        }
        else{
            Session::flash('warning','Not Found');
            }

        return redirect()->back();
    }
}
