@extends('admin.admin_master')
@section('admin')
    <div class="d-flex justify-content-between">
        <h3>welcome : {{ Auth::user()->name }} </h3>
        {{-- <h3>count of categories  : {{count($categories)}} </h3> --}}
    </div>
    <div>
        <h1 class="text-center my-5">edit doctor</h1>
    </div>

 <div class="card text-center">
        <form action="{{ route('doctors.update', ['id'=>$doctors->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

                <input type="text" placeholder="doctor name" value="{{$doctors->doctor_name}}" name="doctor_name" class="mb-3 form-control" id="1">
                @error('doctor_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <input type="text" placeholder="doctor age" value="{{$doctors->age}}" name="age" class="mb-3 form-control" id="1">
                @error('age')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <input type="text" placeholder="doctor mobile" value="{{$doctors->mobile}}" name="mobile" class="mb-3 form-control" id="1">
                @error('mobile')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <input type="file" name="image" value="{{$doctors->image}}" class="mb-3 form-control" id="1">
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <button type="submit" class="btn btn-primary btn-lg">update doctor</button>
            </div>
        </form>
    </div> 
@endsection
