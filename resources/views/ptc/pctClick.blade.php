@extends('layouts.master')
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
          <p>This is test PTC, Click a link and wait 5 second then Click "Skip Add", Task Complete.</p>
          <div class="card-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <table class="table">
            <tr>
              <th>Link</th>
            </tr>
            @foreach($ptcs as $ptc)
            <tr>
              <td><a target="_blank" href="{{$ptc->link}}">{{$ptc->link}}</a></td>
              </tr>
            @endforeach
          </table>
        </div>
        <!-- /.box-body -->
        <div class="card-footer">
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
 @endsection