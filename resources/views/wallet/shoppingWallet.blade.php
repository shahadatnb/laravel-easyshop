@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Wallet</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Wallet</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card shadow mb-4">
        <div class="card-header with-border">
          <h3 class="box-title">Your {{$walletName}} Balance {{ $balance }} Tk</h3>
        </div>
        <div class="card-body">
          <p>Transaction List</p>
          <table class="table">
            <tr>
              <th>Remark</th>
              <th>Receipt</th>
              <th>Payment</th>
              <th>Date</th>
            </tr>
            @foreach ($transaction as $member)
            <tr>
              <td>{{ $member->remark }}</td>
              <td>{{ $member->receipt }}</td>
              <td>{{ $member->payment }}</td>
              <td>{{ $member->created_at->format('d M Y h:i:s A') }}</td>
            </tr>
            @endforeach
          </table>
        </div>
        <!-- /.box-body -->
         <div class="card-footer">
           @include('wallet.sendMoneyAc')
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
 @endsection