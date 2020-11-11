@extends('backend.layouts.default_layout')
@section('title') Blank @parent @endsection
@section('content')
<section class="content">
  @if($message = Session::get('success'))
  <div class="alert alert-success text-center">
    {{ $message }}
  </div>
  @endif
  <section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Product List</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Product list</a></li>
          <li class="breadcrumb-item active">Show Product</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col col-md-12">
          <div class="form-group">
            <a href="/backend/products/create">
              <button class="btn btn-sm btn-outline-success" type="button">
                <i class="fas fa-plus"></i> Add Product</button>
            </a>

          </div>

          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Barcode</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Category</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $item)
              <tr>
                <td scope="row">{{++$i}}</td>
                <td>{{$item->product_name}}</td>
                <td>{{$item->product_name}}</td>
                <td>{{$item->product_qty}}</td>
                <td>{{$item->product_price}}</td>
                <td>{{$item->product_category}}</td>
                <td><span class="badge badge-success">{{$item->product_status}}</span></td>
                <td>
                  <form action="{{route('products.destroy',$item->id)}}" method="POST">
                    @csrf
                    <a class="btn btn-sm btn-info" href="{{route('products.show',$item->id)}}">
                      <i class="fas fa-eye"></i>
                      View
                    </a>
                    <a class="btn btn-sm btn-warning" href="{{route('products.edit',$item->id)}}">
                      <i class="fas fa-pen"></i>
                      Edit
                    </a>
                    @method('DELETE')
                    <button onclick="return confirm('Are you sure !')" class="btn btn-sm btn-danger" type="submit">
                      <i class="fas fa-trash"></i>
                      Delete
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{$products->links()}}
        </div>
      </div>
    </div>
  </div>

</section>

@endsection