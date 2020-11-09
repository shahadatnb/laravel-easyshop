@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Admin panel</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card shadow mb-4">
        <div class="card-header with-border">
          <h3 class="box-title">Settings</h3>
        </div>
        <div class="card-body">
          @foreach($settings as $setting)
          {!! Form::open(['route'=>['saveSetting',$setting->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
          <div class="row">
            <div class="col-md-10">
              {{ Form::label($setting->name,$setting->description) }}
              {{ Form::text('value',$setting->value,['class'=>'form-control','required'=>'']) }} 
            </div>
            <div class="col-md-2"> <br>
            {{ Form::submit('Submit',array('class'=>'form-control btn btn-success')) }}</div>
          </div>
         {!! Form::close() !!}
         @endforeach
        </div>
        <!-- /.box-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
 @endsection