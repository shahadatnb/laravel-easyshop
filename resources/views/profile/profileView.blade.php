@extends('layouts.admin-master')
@section('stylesheet')
@endsection
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Profile</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Member</a></li>
        <li class="active">Member Detail</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
      <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              @if($user->photo != null )
              <img class="profile-user-img img-responsive img-circle" src="{{url('/')}}/public/upload/member/{{ $user->photo }}" alt="profile picture">
              @else
              <img src="{{ url('/')}}/public/admin/dist/img/avatar.png" class="img-circle" alt="User Image">
              @endif

              <h3 class="profile-username text-center">{{ $user->name }}</h3>
              <h6 class="profile-username text-center">ID: {{ $user->id }}</h6>

              <p class="text-muted text-center"></p>
            </div>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Details</a></li>
              <li><a href="#currentWallet" data-toggle="tab">Main Wallet</a></li>
              <li><a href="#incomeWallet" data-toggle="tab">Income Wallet</a></li>
              <li><a href="#password" data-toggle="tab">Password</a></li>
            </ul>
            <div class="tab-content">            
              <!-- /.tab-pane -->
              <div class="active tab-pane" id="activity">
                <table class="table">
                  <tr>
                    <td></td>
                    <td>ID no</td>
                    <td>{{ $user->id }}</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>Username</td>
                    <td>{{ $user->username }}</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>Full Name</td>
                    <td>{{ $user->name }}</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>Mobile</td>
                    <td>{{ $user->mobile }}</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>Email</td>
                    <td>{{ $user->email }}</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>Joining Date</td>
                    <td>{{ $user->created_at->format('d M Y') }}</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>Referral ID</td>
                    <td>{{ $user->referralId }}</td>
                  </tr>
                  <!-- <tr>
                    <td></td>
                    <td>Skype ID</td>
                    <td>{{ $user->skypeid }}</td>
                  </tr> -->
                </table>              
                  
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="currentWallet">
                <!-- The currentWallet -->
                <p><b>Balance:</b> {{ $currentBalance }} Tk</p>
                <table class="table">
                  <tr>
                    <th>Remark</th>
                    <th>Receipt</th>
                    <th>Payment</th>
                    <th>Date</th>
                  </tr>
                  @foreach ($currentWallet as $member)
                  <tr>
                    <td>{{ $member->remark }}</td>
                    <td>{{ $member->receipt }}</td>
                    <td>{{ $member->payment }}</td>
                    <td>{{ $member->created_at->format('d M Y h:i:s A') }}</td>
                  </tr>
                  @endforeach
                </table>
              </div>              
              <!-- /.tab-pane -->
              <div class="tab-pane" id="incomeWallet">
                <!-- The currentWallet -->
                <p><b>Balance:</b> {{ $incomeBalance }} Tk</p>
                <table class="table">
                  <tr>
                    <th>Remark</th>
                    <th>Receipt</th>
                    <th>Payment</th>
                    <th>Date</th>
                  </tr>
                  @foreach ($incomeWallet as $member)
                  <tr>
                    <td>{{ $member->remark }}</td>
                    <td>{{ $member->receipt }}</td>
                    <td>{{ $member->payment }}</td>
                    <td>{{ $member->created_at->format('d M Y h:i:s A') }}</td>
                  </tr>
                  @endforeach
                </table>
              </div>              
              <!-- /.tab-pane -->
              <div class="tab-pane" id="password">
                <!-- The currentWallet -->
                <h3>Password Chenge</h3>
                {!! Form::open(['url' => 'changePassAdmin','class'=>'form-horizontal']) !!}              
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Password</label>

                    <div class="col-md-6">
                        <input id="password" type="text" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Change Password
                        </button>
                    </div>
                </div>
              {!! Form::close() !!}
              </div>              
              <!-- /.tab-pane -->

              
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
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