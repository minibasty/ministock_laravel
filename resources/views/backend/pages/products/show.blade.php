@extends('backend.layouts.default_layout')
@section('title') Show Product @parent @endsection

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Show Product</h1>
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

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">{{$product->product_name}}</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
      </div>
    </div>
    <div class="card-body">
      <div class="form-row">

        <div class="col-12 col-sm-4">
          <div class="form-group col-12">
            <label for="product_image">ภาพสินค้า</label>
            <img class="img-fluid rounded"
              src="{{ $product->product_iamge ? asset('assets/images/products/'.$product->product_iamge) : asset('assets/images/noImg.jpg')}}"
              alt="">
          </div>
          <div class="form-group row col-12">
            <div class="col"><b>บาร์โค้ด</b></div>
            <div class="col">{{$product->product_barcode}}</div>
          </div>
          <div class="form-group row col-12">
            <div class="col"><b>จำนวน</b></div>
            <div class="col">{{$product->product_qty}}</div>
          </div>
          <div class="form-group row col-12">
            <div class="col"><b>บาร์โค้ด</b></div>
            <div class="col">{{$product->product_price}}</div>
          </div>
          <div class="form-group row col-12">
            <div class="col"><b>บาร์โค้ด</b></div>
            <div class="col">{{$product->product_category}}</div>
          </div>
          <div class="form-group row col-12">
            <div class="col"><b>สถานะ</b></div>
            <div class="col">
            {!! config('global.pro_status')[ $product->product_status]!!}
            </div>
          </div>
          <div class="form-group row col-12">
            <div class="col"><b>วันที่แก้สร้าง</b></div>
            <div class="col">
                {{ date("d/m/Y", strtotime($product->created_at)) }}
            </div>
          </div>
          <div class="form-group row col-12">
            <div class="col"><b>วันที่แก้ไข</b></div>
            <div class="col">
            {{ date("d/m/Y", strtotime($product->updated_at)) }}
            </div>
          </div>

        </div>

        <div class="col-12 col-sm-8">
          <label for="product_name">ชื่อสินค้า</label>
          <h4>{{$product->product_name}}</h4>
          <label for="product_detail">รายละเอียด</label>
          <p>{{$product->product_detail}}</p>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
