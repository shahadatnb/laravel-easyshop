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
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Order List</a></h3>
        </div>
        <div class="box-body">
         <table class="table">
                <tr>
                  <th>Order No</th>
                  <th>Product Name</th>
                  <th>Date</th>
                  <th>Price</th>
                  <th>PV</th>
                  <th>User Name</th>
                  <th>Mobile</th>
                  <th>Kuriar</th>
                  <th>Address</th>
                  <th>Action</th>
                </tr>
                @foreach ($orders as $order)
                <tr>
                  <td>#{{ $order->id }}</td>
                  <td>{{ $order->myProduct->product_name }}</td>
                  <td>{{ $order->created_at->format('d M Y') }}</td>
                  <td>{{ $order->myProduct->price }}</td>
                  <td>{{ $order->myProduct->pv }}</td>
                  <td>{{ $order->userInfo->name }}</td>
                  <td>{{ $order->mobile }}</td>
                  <td>{{ $order->kuriar }}</td>
                  <td>{{ $order->address }}</td>
                  <td>
                    @if($order->confirm == 0)
                      <a href="{{url('/productDeleveryConfirm',$order->id)}}" class="btn btn-success btn-sm">Confirm</a>
                    @else
                      Delivered
                    @endif
                  </td>
                </tr>
                @endforeach
              </table>
          <div class="text-center">{{ $orders->links() }}</div>
        <!-- /.box-body -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
 @endsection