@extends('layouts.admin-master')
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

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          {!! Form::open(['route'=>'sendMoney','method'=>'POST']) !!}
          <div class="row">
            <div class="col-md-4">
            {{ Form::label('user_id','User Id') }}
            {{ Form::select('user_id',$users,null,['class'=>'form-control select2','required'=>'']) }} 
          </div>
          <div class="col-md-2">
            {{ Form::label('receipt','Amount') }}
            {{ Form::text('receipt',null,['class'=>'form-control','required'=>'']) }}
          </div>
            <div class="col-md-4"> <br>
            {{ Form::submit('Send',array('class'=>'form-control btn btn-success')) }}</div>
          </div>
         {!! Form::close() !!}
        </div>
        <div class="box-header with-border">
          <h3 class="box-title">Send Money Income Wallet</h3>
        </div>
        <div class="box-body">
          {!! Form::open(['route'=>'sendToIncome','method'=>'POST']) !!}
          <div class="row">
            <div class="col-md-4">
            {{ Form::label('user_id','User Id') }}
            {{ Form::select('user_id',$users,null,['class'=>'form-control select2','required'=>'']) }} 
          </div>
          <div class="col-md-2">
            {{ Form::label('receiptAmt','Amount') }}
            {{ Form::text('receiptAmt',null,['class'=>'form-control','required'=>'']) }}
          </div>
            <div class="col-md-4"> <br>
            {{ Form::submit('Send',array('class'=>'form-control btn btn-success')) }}</div>
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
              <th>Remark</th>
            </tr>
            @foreach ($transaction as $member)
            <tr>
              <td>{{ $member->created_at->format('d M Y h:i:s A') }}</td>
              <td>{{ $member->user_id }}</td>
              <td>{{ $member->receipt }}</td>
              <td>{{ $member->payment }}</td>
              <td>{{ $member->remark }}</td>
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