@extends('layouts.admin-master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Admin panel</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Withdraw</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Withdraw Money</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <p>Transaction List</p>
          <table class="table">
            <tr>
              <th>Date</th>
              <th>User ID</th>
              <th>User Name</th>
              <th>Amount</th>
              <th>Remark</th>
              <th>Action</th>
            </tr>
            @foreach ($transaction as $member)
            <tr>
              <td>{{ $member->created_at->format('d M Y h:i:s A') }}</td>
              <td>{{ $member->user_id }}</td>
              <td>{{ $member->userInfo->name }}</td>
              <td>{{ $member->payment }}</td>
              <td>{{ $member->remark }}</td>
              <td>@if($member->confirm == 0 )
                  <a onclick="return confirmSubmit();" href="{{ route('withdrawConfirm', $member->id ) }}" class="btn btn-primary btn-sm">Get Confirm</a>
                  @else
                  Comfirmed
                  @endif
                </td>
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
    function confirmSubmit() {
      var msg;
      msg= "Are you sure? Withdraw Confirm.";
      var agree=confirm(msg);
      if (agree)
      return true ;
      else
      return false ;
    }
  </script>
@endsection