@extends('layouts.admin-master')
@section('stylesheet')
  {!! Html::style('public/plugins/select2/select2.min.css') !!}

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
      <h1>Products</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Product</a></li>
        <li class="active">All Product</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">

        </div>
        <div class="box-body">
          <table class="table">
            <tr>
              <th>ID</th>
              <th>Product</th>
              <th>Price</th>
              <th>PV</th>
              <th>Action</th>
            </tr>
            @foreach ($products as $product)
            <tr>
              <td>{{ $product->id }}</td>
              <td>{{ $product->product_name }}</td>
              <td>{{ $product->price }}</td>
              <td>{{ $product->pv }}</td>
              <td>
                <a class="btn btn-success btn-xs" href="{{ route('products.show',$product->id) }}"><span class="glyphicon glyphicon-eye-open"></span></a>
                <a class="btn btn-success btn-xs" href="{{ route('products.edit',$product->id) }}"><span class="glyphicon glyphicon-pencil"></span>  Edit</a>
                
                  @if($product->publication_status==0)
                    <a class="btn btn-primary btn-xs" href="{{ route('productHide',$product->id) }}">Show</a>
                  @else
                    <a class="btn btn-default btn-xs" href="{{ route('productHide',$product->id) }}">Hide</a>
                  @endif
                
                <form class="delete" action="{{ route('products.destroy',$product->id) }}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button type="submit" class="btn btn-danger btn-xs" href='{{ $product->id }}' onclick="return confirm('Are You Sure To Delete This Item?')"><span class="glyphicon glyphicon-trash"></span></button>
              </form>
              </td>
            </tr>
            @endforeach
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
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
      {!! Html::script('public/plugins/select2/select2.min.js') !!}
      <script>
        $('.select2').select2();
      </script>
    @endsection