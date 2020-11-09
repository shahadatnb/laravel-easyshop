@extends('layouts.master')
@section('stylesheet')
  <style>
    form.delete {
  display: inline;
}
</style>
  @endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Products Category</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Product Category</a></li>
        <li class="active">All Category</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card shadow mb-4">
        <div class="card-header with-border">
          {!! Form::model($cat,['route'=>['cats.update',$cat->id],'method'=>'PUT']) !!}
              @include('layouts._message')
              <div class="row">
                <div class="col-md-8">
                  {{ Form::label('title','Title') }}
                  {{ Form::text('title',null,['class'=>'form-control']) }}             
                </div>
                <div class="col-md-4">
                  <br>
                  {{ Form::submit('Save', ['class'=>'btn btn-primary btn-block']) }}             
                </div>
              </div>
          {!! Form::close() !!}
        </div>    
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
 @endsection