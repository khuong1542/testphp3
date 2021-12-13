@extends('welcome')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Danh sách</h2>
                </div>
                <div class="card-body">

                    <table class="table table-bordered">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Logo</th>
                            <th>Founding Year</th>
                            <th>Address</th>
                            <th><a href="{{route('hospitals.create')}}" class="btn btn-primary">Add</a></th>
                        </thead>
                        <tbody>
                            @foreach($model as $hospital)
                            <tr>
                                <td>{{$hospital->id}}</td>
                                <td>{{$hospital->name}}</td>
                                <td><img src="{{$hospital->logo}}" width="70" alt=""></td>
                                <td>{{$hospital->founding_year}}</td>
                                <td>{{$hospital->address}}</td>
                                <td>
                                    <form action="{{route('hospitals.destroy',['hospital'=>$hospital->id])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('hospitals.edit',['hospital'=>$hospital->id])}}" class="btn btn-warning">Edit</a>
                                        <button type="submit" onclick="return Delete()" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="10">{{$model->onEachSide(1)->links()}}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection