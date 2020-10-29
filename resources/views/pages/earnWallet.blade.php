@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Earn Wallet</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Income Wallet</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Your Income Balance {{ $balance }}Tk</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
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
              <td>{{ $member->receipt }} Tk</td>
              <td>{{ $member->payment }} Tk</td>
              <td>{{ $member->created_at->format('d M Y h:i:s A') }}</td>
            </tr>
            @endforeach
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
           @include('layouts._message')
{{--
          <h3 class="box-title">Balance transfer to current PV</h3>
          {!! Form::open(['route'=>'transferFromEarn','method'=>'POST']) !!}
            <div class="col-md-4">
              {{ Form::label('amount','Amount') }}
              {{ Form::text('amount',null,['class'=>'form-control','required'=>'']) }}
            </div>
            <div class="col-md-4"> <br>
              {{ Form::submit('Transfer',array('class'=>'form-control btn btn-success')) }}
            </div>
          {!! Form::close() !!}
 --}}

        <h3 class="box-title">Withdraw</h3>
          {!! Form::open(['route'=>'withdrawFormEarn','method'=>'POST']) !!}
          <div class="row">
          <div class="col-md-4">
            {{ Form::label('remark','Payment Information') }}
            {{ Form::text('remark',null,['class'=>'form-control','required'=>'','placeholder'=>'Ex: Bkash No 01xxxxxxxxxx']) }} 
          </div>
            <div class="col-md-4">
            {{ Form::label('payment','Amount') }}
            {{ Form::text('payment',null,['class'=>'form-control','required'=>'']) }}
          </div>
            <div class="col-md-4"> <br>
            {{ Form::submit('Withdraw',array('class'=>'form-control btn btn-success')) }}</div>
          </div>
         {!! Form::close() !!}
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
 @endsection