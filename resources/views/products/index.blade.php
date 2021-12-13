@extends('welcome')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Sản phẩm</h1>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('products.create')}}" class="btn btn-primary">
                            <h3 class="card-title">Thêm mới</h3>
                        </a>

                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-hover">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Quantity</th>
                                <!-- <th>Detail</th> -->
                                <th></th>
                            </thead>
                            <tbody>
                                @if(count($products) > 0)
                                @foreach($products as $product)
                                <tr>
                                    <td>{{($products->currentPage() - 1)*$products->perPage() + $loop->iteration}}
                                    </td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td><img src="{{$product->image}}" width="70" alt="Ảnh sản phẩm"></td>
                                    <td>{{$product->quantity}}</td>
                                    <!-- <td>{{$product->detail}}</td> -->
                                    <td>
                                        <form action="{{route('products.destroy',['product' => $product->id])}}"
                                            method="post">
                                            @csrf
                                            <a href="{{route('edit', ['id' => $product->id]) }}"
                                                class="btn btn-warning">Edit</a>
                                            <button type="submit" onclick="return Delete()"
                                                class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="10" class="text-center">Chưa có sản phẩm nào!</td>
                                </tr>
                                @endif
                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <td colspan="10">
                                        {{$products->onEachSide(1)->links()}}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>







<script>
function Delete() {
    var conf = confirm('Delete');
    return conf;
}
</script>
@endsection