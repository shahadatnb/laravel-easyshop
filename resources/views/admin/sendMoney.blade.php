@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Admin panel</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Send Money</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
           @include('layouts._message')
          <h3 class="box-title">Send Money</h3>
        </div>
        <div class="box-body">
          {!! Form::open(['route'=>'sendMoney','method'=>'POST']) !!}
          <div class="row">
            <div class="col-md-4">
            {{ Form::label('user_id','User Id') }}
            {{ Form::select('user_id',$users,null,['class'=>'form-control select2','required'=>'','placeholder'=>'Select User']) }} 
            </div>
            <div class="col-md-2">
            {{ Form::label('wType','Wallet Type') }}
            {{ Form::select('wType',$wallets,null,['class'=>'form-control','required'=>'','placeholder'=>'Wallet Type']) }} 
            </div>
            <div class="col-md-2">
              {{ Form::label('receipt','Amount') }}
              {{ Form::text('receipt',null,['class'=>'form-control','required'=>'']) }}
            </div>
              <div class="col-md-1"> <br>
              {{ Form::submit('Send',array('class'=>'form-control btn btn-success')) }}
            </div>
          </div>
         {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <p>Transaction List</p>
          <table class="table">
            <tr>
              <th>Date</th>
              <th>User</th>
              <th>Amount</th>
              <th>Payment</th>
              <th>Type</th>
              <th>Remark</th>
            </tr>
            @foreach ($transaction as $item)
            <tr>
              <td>{{ $item->created_at->format('d M Y h:i:s A') }}</td>
              <td>{{ $item->user_id }}</td>
              <td>{{ $item->receipt }}</td>
              <td>{{ $item->payment }}</td>
              <td>{{ $item->wType }}</td>
              <td>{{ $item->remark }}</td>
            </tr>
            @endforeach
          </table>
          <div class="text-center">{{ $transaction->links() }}</div>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
 @endsection

 @section('scripts')
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  });
</script>
  @endsection