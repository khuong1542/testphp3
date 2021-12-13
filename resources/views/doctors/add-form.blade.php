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
                    <form action="{{route('doctors.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="">Hospital</label>
                                <select name="hospital_id" class="form-control">
                                    @foreach($hospitals as $hospital)
                                    <option value="{{$hospital->id}}">{{$hospital->name}}</option>
                                    @endforeach
                                </select>
                                @error('hospital_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="">Avatar</label>
                                <input type="file" name="avatar" class="form-control" value="{{old('avatar')}}">
                                @error('avatar')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="">Birth date</label>
                                <input type="date" name="birth_date" class="form-control" value="{{old('birth_date')}}">
                                @error('birth_date')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="">Salary</label>
                                <input type="number" name="salary" class="form-control" value="{{old('salary')}}">
                                @error('salary')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="">Phone Number</label>
                                <input type="text" name="phone_number" class="form-control"
                                    value="{{old('phone_number')}}">
                                @error('phone_number')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                            <a href="{{route('doctors.index')}}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection