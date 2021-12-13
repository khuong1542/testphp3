@extends('welcome')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Sửa sản phẩm</h1>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('products.update', ['product'=> $products->id])}}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Tên sản phẩm</label>
                                    <input type="text" name="name" class="form-control" placeholder=""
                                        value="{{$products->name}}">
                                    @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Giá</label>
                                    <input type="text" name="price" class="form-control" placeholder=""
                                        value="{{$products->price}}">
                                    @error('price')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Số lượng</label>
                                    <input type="number" name="quantity" class="form-control" placeholder=""
                                        value="{{$products->quantity}}">
                                    @error('quantity')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <div class="form-group">
                                    <label for="">Ảnh</label>
                                    <input type="file" name="image" class="form-control" placeholder="">
                                    @error('image')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    <img src="{{$products->image}}" width="150" alt="Ảnh sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="">Chi tiết:</label>
                                    <textarea name="detail" rows="10"
                                        class="form-control">{{$products->name}}</textarea>
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <br>
                                <a href="{{route('products.index')}}" class="btn btn-danger">Hủy</a>
                                &nbsp;
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection