@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center mt-5">
        <div class="col-sm-8">
            <div class="card panel-default">

                <div class="card-body">
                <h5 class="card-title">Register</h5>
                @include('layouts._message')
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-4 control-label">Full Name</label>

                            <div class="col">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

 
                        <div class="form-group{{-- $errors->has('mobile') ? ' has-error' : '' --}}">
                            <label for="mobile" class="col-md-4 control-label">Mobile No</label>

                            <div class="col">
                                <input id="mobile" type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" required>

                                @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('hand') ? ' has-error' : '' }}">
                            <label for="hand" class="col-md-4 control-label">Side</label>

                            <div class="col">
                                {{ Form::select('hand', ['1' => 'Left Side', '2' => 'Right Side'
                                              ], null, ['class'=>'form-control','required'=>'','placeholder' => 'Hand Side']) }}

                                @if ($errors->has('hand'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hand') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<!-- 
                        <div class="form-group{{-- $errors->has('payment_method') ? ' has-error' : '' }}">
                            <label for="payment_method" class="col-md-4 control-label">Payment Method</label>

                            <div class="col">
                                {{ Form::select('payment_method', ['bKash' => 'bKash', 'Rocket' => 'Rocket', 'Bank' => 'Bank'], null, ['class'=>'form-control','required'=>'','placeholder' => 'Select']) }}

                                @if ($errors->has('payment_method'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('payment_method') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('account_details') ? ' has-error' : '' }}">
                            <label for="account_details" class="col-md-4 control-label">Account Details</label>

                            <div class="col">
                                <input id="account_details" type="text" class="form-control" name="details" value="{{ old('account_details') }}" required>

                                @if ($errors->has('account_details'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('account_details') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}-->
                        <div class="form-group{{ $errors->has('pin') ? ' has-error' : '' }}">
                            <label for="pin" class="col-md-4 control-label">PIN</label>
                        
                            <div class="col">
                                <input id="pin" type="text" class="form-control" name="pin" value="{{ old('pin') }}" required>
                        
                                @if ($errors->has('pin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- <div class="form-group{{-- $errors->has('skypeid') ? ' has-error' : '' --}}">
                            <label for="skypeid" class="col-md-4 control-label">Skype ID</label>
                        
                            <div class="col">
                                {{-- Form::text('skypeid', null, ['class'=>'form-control','required'=>'','placeholder' => 'Skype ID']) --}}
                        
                                @if ($errors->has('skypeid'))
                                    <span class="help-block">
                                        <strong>{{-- $errors->first('skypeid') --}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->

                        <div class="form-group{{ $errors->has('referralId') ? ' has-error' : '' }}">
                            <label for="referralId" class="col-md-4 control-label">Referral ID</label>

                            <div class="col">
                                <input id="referralId" type="number" class="form-control" name="referralId" value="{{ old('referralId') }}" required>

                                @if ($errors->has('referralId'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('referralId') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
