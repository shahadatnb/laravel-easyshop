@extends('layouts.admin-master')
@section('stylesheet')
  {!! Html::style('public/plugins/select2/select2.min.css') !!}
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Ceeade Product</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Product</a></li>
        <li class="active">Ceeade Product</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      {!! Form::open(['route'=>'products.store','method'=>'POST']) !!}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <div class="row">
            <div class="col-md-8">
              {{ Form::label('product_name','Name') }}
              {{ Form::text('product_name',null,['class'=>'form-control']) }} 
              @if($errors->has('product_name'))
                  <span class="help-block">{{ $errors->first('product_name') }}</span>
              @endif             
            </div>
            <div class="col-md-4">
              <br>
              {{ Form::submit('Next Step', ['class'=>'btn btn-primary btn-block']) }}             
            </div>
          </div>
        </div>
        <div class="box-body">          
          
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
      {!! Form::close() !!}

    </section>
    <!-- /.content -->
  </div>
 @endsection
    @section('scripts')
      {!! Html::script('public/plugins/select2/select2.min.js') !!}
      <script>
        $('.select2').select2();
      </script>
    @endsection