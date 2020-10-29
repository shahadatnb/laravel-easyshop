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
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">All Member List</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-6"><input type="text" class="form-control" id="userID" placeholder="User ID" name="id"></div>
            <div class="col-md-6"><button onclick="" class="btn btn-primary" id="go">GO</button></div>
          </div>         
          
          <table class="table">
            <tr>
              <th>ID</th>
              <th>Type</th>
              <th>Member Name</th>
              <th>Email</th>
              <th>Mobile</th>
              <th>R. ID</th>
              <th>J. Date</th>
              <th>Detail</th>
            </tr>
            @foreach ($members as $member)
            <tr>
              <td><a href="{{ route('profileView',$member->id) }}" target="_blank">{{ $member->id }}</a></td>
              <td>
                @if($member->premium == 1)
                  <span class="label label-info">Premium</span>
                @elseif($member->premium == 2)
                  <span class="label label-success">Standrad</span>
                  <!-- <a href="{{url('/getpremium',$member->id)}}" class="btn btn-success btn-xs">Apprve</a> -->
                @endif
              </td>
              <td>{{ $member->name }}</td>
              <td>{{ $member->email }}</td>
              <td>{{ $member->mobile }}</td>
              <td>{{ $member->referralId }}</td>
              <td>{{ $member->created_at->format('d M Y') }}</td>
              <td><a href="{{ route('profileView',$member->id) }}" target="_blank"><span class="glyphicon glyphicon-eye-open"></span></a></td>
            </tr>
            @endforeach
          </table>
          <div class="text-center">{{ $members->links() }}</div>
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
    @section('scripts')
      <script>
        $('#go').click(function(){
          var userID = $('#userID').val();
          location.href = '{{ url('/profileView/') }}/'+userID;
          console.log(userID);
        });
      </script>
    @endsection