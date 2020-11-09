@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Order List</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Order List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      @include('layouts._message')
     
      <div class="row">
        <div class="col-lg-12 col-xs-12">
          <div class="card shadow mb-4">
            <div class="card-header with-border">
              <h3 class="box-title">Order List</h3>
            </div>
            <div class="card-body">
              <table class="table">
                <tr>
                  <th>Order No</th>
                  <th>Date</th>
                  <th>Price</th>
                  <th>Status</th>
                </tr>
                @foreach ($orders as $order)
                <tr>
                  <td>#{{ $order->id }}</td>
                  <td>{{ $order->created_at->format('d M Y h:i:s A') }}</td>
                  <td>{{ $order->myProduct->price }}</td>
                  <td>
                    @if($order->confirm == 0)
                      Waiting
                    @else
                      Delivered
                    @endif
                  </td>
                </tr>
                @endforeach
              </table>
              <div class="text-center">{{ $orders->links() }}</div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
 @endsection
