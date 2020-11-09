<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProCat;
use Session;
use Auth;

class ProductCat extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = ProCat::all();
        return view('admin.products.category',compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    
    public function catHide($id){
        $data = ProCat::find($id);
        if($data->status==0){
            $data->status = 1;
        }else{
            $data->status = 0;
        }
        
        $data->save();
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
            'title'=>'required|max:255',
            ));

        $data = new ProCat;
        $data->title = $request->title;
        $data->save();
        return redirect()->route('cats.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = ProCat::find($id);
        return view('admin.products.categoryEdit',compact('cat'));
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
            'title'=>'required|max:255',
            ));

        $data = ProCat::find($id);
        $data->title = $request->title;
        $data->save();
        return redirect()->route('cats.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=ProCat::find($id);
        
        if($item){
            if(count($item->product)>0){
                Session::flash('warning','Already Sales.');                
            }else{                
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
