@extends('layouts.admin-master')
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
          <h3 class="box-title">User Pin <a href="{{ url('pingenarate')}}">Generate New Pin</a></h3>

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
              <th>Pin</th>
              <th>Used By</th>
            </tr>
            @foreach ($pin as $member)
            <tr>
              <td>{{ $member->pin }}</td>
              <td>@if($member->userInfo)
                {{ $member->userInfo->id }}
              @endif</td>
            </tr>
            @endforeach
          </table>
          <div class="text-center">{{ $pin->links() }}</div>
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