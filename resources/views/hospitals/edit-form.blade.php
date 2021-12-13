@extends('welcome')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Thêm mới</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('hospitals.update',['hospital'=>$model->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" value="{{old('name', $model->name)}}">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Logo</label>
                            <input type="file" name="logo" class="form-control">
                            @error('logo')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <img src="{{old('logo', $model->logo)}}" alt="">
                        </div>
                        <div class="form-group">
                            <label for="">Founding Year</label>
                            <input type="number" name="founding_year" class="form-control" value="{{old('founding_year', $model->founding_year)}}">
                            @error('founding_year')
                            <span class="text-danger">{{$message}}</span>
                            @enderror</div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control" value="{{old('address', $model->address)}}">
                            @error('address')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                            <a href="{{route('hospitals.index')}}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection