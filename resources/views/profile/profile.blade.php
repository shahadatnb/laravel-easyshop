@extends('layouts.master')
@section('stylesheet')
@endsection
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Profile</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ url('/student') }}">Member</a></li>
        <li class="active">Member Detail</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Details</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <a href="{{ url('editProfile') }}" class="btn btn-default btn-sm">Edit Profile</a>
                <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">Update profile photo</button>
                <a href="{{ url('changePass') }}" class="btn btn-default btn-sm">Change Password</a>
                <table class="table table-bordered table-striped">
                  <tr>
                    <td></td>
                    <td>ID no</td>
                    <td>{{ Auth::user()->id }}</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>Username</td>
                    <td>{{ Auth::user()->username }}</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>Full Name</td>
                    <td>{{ Auth::user()->name }}</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>Mobile</td>
                    <td>{{ Auth::user()->mobile }}</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>Email</td>
                    <td>{{ Auth::user()->email }}</td>
                  </tr>
                  <!-- <tr>
                    <td></td>
                    <td>Skype ID</td>
                    <td>{{-- Auth::user()->skypeid --}}</td>
                  </tr> -->
                </table>              
                  
              </div>              
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->

      <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              @if(Auth::user()->photo != null )
              <img class="profile-user-img img-responsive img-circle" src="{{url('/')}}/public/upload/member/{{ Auth::user()->photo }}" alt="profile picture">
              @else
              <img src="{{ url('/')}}/public/admin/dist/img/avatar5.png" class="img-circle" alt="User Image">
              @endif

              <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
              <h6 class="profile-username text-center">ID: {{ Auth::user()->id }}</h6>

              <p class="text-muted text-center"></p>
            </div>
          </div>
        </div>
        <!-- /.col -->
      </div>
          
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Profile Photo</h4>
      </div>
      {!! Form::open(array('route'=>['changePhoto',Auth::user()->id],'method'=>'PUT', 'files' => true)) !!}
      <div class="modal-body">
        <p>{{ Form::file('photo',null,array('class'=>'form-control','required'=>'')) }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        {{ Form::submit('Update Photo',array('class'=>'btn btn-primary')) }}
      </div>
      {!! Form::close() !!}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



    </section>
    @endsection
    @section('scripts')
    @endsection