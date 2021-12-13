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
                            <th>Hospital</th>
                            <th>Avatar</th>
                            <th>Birth Date </th>
                            <th>Salary</th>
                            <th>Phone Number</th>
                            <th><a href="{{route('doctors.create')}}" class="btn btn-primary">Add</a></th>
                        </thead>
                        <tbody>
                            @foreach($model as $doctor)
                            <tr>
                                <td>{{$doctor->id}}</td>
                                <td>{{$doctor->name}}</td>
                                <td>{{$doctor->hospitals->name}}</td>
                                <td><img src="{{$doctor->avatar}}" width="70" alt="Image doctor"></td>
                                <td>{{$doctor->birth_date}}</td>
                                <td>{{$doctor->salary}}</td>
                                <td>{{$doctor->phone_number}}</td>
                                <td>
                                    <form action="{{route('doctors.destroy',['doctor'=>$doctor->id])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('doctors.edit',['doctor'=>$doctor->id])}}" class="btn btn-warning">Edit</a>
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