@extends('layouts.admin-master')
@section('stylesheet')
  {!! Html::style('public/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}
  {!! Html::style('public/plugins/select2/select2.min.css') !!}

  <style>
    img{max-width: 100%}
    #image_row label {position: absolute;}
  </style>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Product</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Product</a></li>
        <li class="active">Detail</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      {!! Form::model($product,['route'=>['products.update',$product->id],'method'=>'PUT', 'files' => true ]) !!}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <div class="row">
            <div class="col-md-12">
              {{ Form::label('product_name','Name') }}
              {{ Form::text('product_name',null,['class'=>'form-control']) }} 
              @if($errors->has('product_name'))
                  <span class="help-block">{{ $errors->first('product_name') }}</span>
              @endif             
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              {{ Form::label('price','Price') }}
              {{ Form::text('price',null,['class'=>'form-control']) }} 
              @if($errors->has('price'))
                  <span class="help-block">{{ $errors->first('price') }}</span>
              @endif 
            </div>
            <div class="col-md-6">
              {{ Form::label('pv','PV') }}
              {{ Form::text('pv',null,['class'=>'form-control']) }} 
              @if($errors->has('pv'))
                  <span class="help-block">{{ $errors->first('pv') }}</span>
              @endif 
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              {{ Form::label('description','Description') }}
              {{ Form::textarea('description',null,['class'=>'form-control textarea']) }}
              @if($errors->has('description'))
                  <span class="help-block">{{ $errors->first('description') }}</span>
              @endif
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              {{ Form::label('photo','Photo') }}
              {{ Form::file('photo',null,array('class'=>'form-control','maxlenth'=>'255')) }}
              @if($errors->has('photo'))
                  <span class="help-block">{{ $errors->first('photo') }}</span>
              @endif 
            </div>

            <div class="col-md-6">
            {{ Form::label('cat_id',' ') }}
              {{ Form::submit('Update', ['class'=>'btn btn-success btn-block']) }}
            </div>
          </div>
        </div>
        <div class="box-body">          
              <img style="max-width: 200px" src="{{url('/public')}}/upload/product/{{$product->photo}}" alt="">
        {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
      

    </section>
    <!-- /.content -->
  </div>
 @endsection
    @section('scripts')
      {!! Html::script('public/plugins/select2/select2.min.js') !!}
    {!! Html::script('public/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}
      <script>
        $('.select2').select2();
        $(".textarea").wysihtml5();
      </script>
    @endsection