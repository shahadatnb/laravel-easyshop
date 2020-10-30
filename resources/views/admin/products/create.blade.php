@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Ceade Product</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Product</a></li>
        <li class="active">Ceade Product</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      {!! Form::open(['route'=>'products.store','method'=>'POST']) !!}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          @include('layouts._message')
          <div class="row">
            <div class="col-md-8">
              {{ Form::label('title','Title') }}
              {{ Form::text('title',null,['class'=>'form-control']) }} 
              @if($errors->has('title'))
                  <span class="help-block">{{ $errors->first('title') }}</span>
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