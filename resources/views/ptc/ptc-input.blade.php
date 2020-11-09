@extends('layouts.admin-master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>PTC Click</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">PTC</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card shadow mb-4">
        <div class="card-header with-border">
          <h3 class="box-title">PTC</h3>
          <div class="card-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          {!! Form::open(['route'=>'ptcs.store','method'=>'POST','class'=>'form-horizontal']) !!}
          <div class="row">
            <div class="col-md-3">
              {{ Form::label('publish_date','Publish Date') }}
              {{ Form::text('publish_date',date('Y-m-d'),['class'=>'form-control','required'=>'']) }} 
            </div>
            <div class="col-md-7">
              {{ Form::label('link','Link') }}
              {{ Form::text('link',null,['class'=>'form-control','required'=>'']) }} 
            </div>
            <div class="col-md-2"> <br>
            {{ Form::submit('Submit',array('class'=>'form-control btn btn-success')) }}</div>
          </div>
         {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
        <div class="card-footer">
          <table class="table">
            <tr>
              <th>ID</th>
              <th>Date</th>
              <th>Link</th>
              <th>#</th>
            </tr>
            @foreach($ptcs as $ptc)
            <tr>
              <td>{{$ptc->id}}</td>
              <td>{{$ptc->publish_date}}</td>
              <td><a target="_blank" href="{{$ptc->link}}">{{$ptc->link}}</a></td>
              </tr>
            @endforeach
          </table>
          <div class="text-center">{{ $ptcs->links() }}</div> 
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
 @endsection