@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Member List Totlal: {{$totalMember}}</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Member List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card shadow mb-4">
        <div class="card-header with-border">
          
          <table class="table table-bordered table-striped">
            <tr>
              <th>User ID</th>
              <th>Name</th>
              <th>Joining Date</th>
              <th>Details</th>
            </tr>
            @foreach($members as $data)
            <tr>
              <td>{{$data->id}}</td>
              <td>{{$data->name}}</td>
              <td>{{prettyDate($data->created_at)}}</td>
              <td><a href="{{url('/member/id',$data->id)}}" class="btn btn-primary btn-xs">Click</a></td>
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