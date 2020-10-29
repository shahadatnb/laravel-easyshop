@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Buy Pack</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Buy Pack</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      @include('layouts._message')
     
      <div class="row">
        <!-- ./col -->
        <div class="col-lg-6 col-xs-12">
          <div class="product text-center">
            <h2>{{$product->product_name}}</h2>
            <img class="img-responsive" src="{{url('/public')}}/upload/product/{{$product->photo}}" alt="">
            <div class="footer" style="margin-top: 20px;">
              <div class="row">
                <div class="col-md-6">
                  <button class="btn btn-success">PV : {{$product->price}}</button>
                </div>
              </div>
            </div>
          </div>          
        </div>
        <div class="col-lg-6 col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Filup your Information</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              {!! Form::open(['route'=>'buyPackSubmit','method'=>'POST']) !!}
              <div class="row">
              <div class="col-md-12">
                {{ Form::label('mobile','Mobile No') }}
                {{ Form::text('mobile',null,['class'=>'form-control','required'=>'','placeholder'=>'Ex: 01xxxxxxxxxx']) }}
                {{ Form::hidden('product_id',$product->id) }}
              </div>
              <div class="col-md-12">
                {{ Form::label('kuriar','Kuriar Service Name') }}
                {{ Form::text('kuriar',null,['class'=>'form-control','required'=>'']) }}
              </div>
              <div class="col-md-12">
                {{ Form::label('address','Your Address') }}
                {{ Form::text('address',null,['class'=>'form-control','required'=>'']) }}
              </div>
                <div class="col-md-12"> <br>
                {{ Form::submit('Submit',array('class'=>'form-control btn btn-success')) }}</div>
              </div>
             {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
 @endsection
