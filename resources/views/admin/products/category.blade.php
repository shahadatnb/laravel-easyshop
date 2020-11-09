@extends('layouts.master')
@section('stylesheet')
  <style>
    form.delete {
  display: inline;
}
</style>
  @endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Products Category</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Product Category</a></li>
        <li class="active">All Category</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card shadow mb-4">
        <div class="card-header with-border">
          {!! Form::open(['route'=>'cats.store','method'=>'POST']) !!}
              @include('layouts._message')
              <div class="row">
                <div class="col-md-8">
                  {{ Form::label('title','Title') }}
                  {{ Form::text('title',null,['class'=>'form-control']) }}             
                </div>
                <div class="col-md-4">
                  <br>
                  {{ Form::submit('Save', ['class'=>'btn btn-primary btn-block']) }}             
                </div>
              </div>
          {!! Form::close() !!}
        </div>
        <div class="card-body">
          <table class="table">
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Action</th>
            </tr>
            @foreach ($cats as $product)
            <tr>
              <td>{{ $product->id }}</td>
              <td>{{ $product->title }}</td>
              <td>@if($product->cat_id != null ){{ $product->cat->title }}@endif</td>
              <td>
                <a class="btn btn-success btn-xs" href="{{ route('cats.show',$product->id) }}"><i class="fas fa-eye"></i></a>
                <a class="btn btn-success btn-xs" href="{{ route('cats.edit',$product->id) }}"><i class="fas fa-edit"></i>  Edit</a>
                
                  @if($product->status==0)
                    <a class="btn btn-primary btn-xs" href="{{ route('catHide',$product->id) }}">Show</a>
                  @else
                    <a class="btn btn-danger btn-xs" href="{{ route('catHide',$product->id) }}">Hide</a>
                  @endif
                
                <form class="delete" action="{{ route('cats.destroy',$product->id) }}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button type="submit" class="btn btn-danger btn-xs" href='{{ $product->id }}' onclick="return confirm('Are You Sure To Delete This Item?')"><i class="fas fa-trash-alt"></i></button>
              </form>
              </td>
            </tr>
            @endforeach
          </table>
        </div>
        <!-- /.box-body -->
        <div class="card-footer">
          Footer
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
        $('.select2').select2();
      </script>
    @endsection