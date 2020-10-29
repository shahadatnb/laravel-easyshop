@php use App\User; @endphp
@extends('layouts.master')
@section('stylesheet')
  <!-- hierarchy-view -->
  {!! Html::style('public/admin/dist/css/hierarchy-view.css') !!}
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Dashboard</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Member List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
        <div class="box-body basic-style" style="">
          <div class="hv-container">
            <div class="hv-wrapper">

                <!-- Key component -->
                <div class="hv-item">

                    <div class="hv-item-parent">

                        <p class="simple-card"><img width="50" src="{{ url('/') }}/public/admin/dist/img/avatar1.png" alt=""><br> ID# {{ $members->id }} MC# {{ User::myChild($members->id) }} <br>{{ $members->name }} <br>
                          {{-- <span>LT#{{ App\User::myChild($members->id, 1) }}</span> - <span>RT#{{ App\User::myChild($members->id, 2) }}</span> --}}
                        </p>
                    </div>

                        @if(count($members->childs))

                            @include('pages.levelTreeChild',['childs' => $members->childs, 'defth' => 1])

                        @endif

                </div>

            </div>
          </div>
          
        </div>
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