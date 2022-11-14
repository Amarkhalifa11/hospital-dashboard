@extends('admin.admin_master')
@section('admin')
    <div class="d-flex justify-content-between">
        <h3>welcome : {{ Auth::user()->name }} </h3>
        {{-- <h3>count of categories  : {{count($categories)}} </h3> --}}
    </div>
    <div>
        <h1 class="text-center my-5">edit categories</h1>
    </div>

    <div class="card text-center">
        <form action="{{ route('categories.update', ['id'=>$category->id]) }}" method="post">
            @csrf
            <div class="card-body">
                <input type="text" placeholder="category name" name="category_name" value="{{$category->category_name}}"  class="mb-5 form-control" id="1">
                @error('category_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary btn-lg">update category</button>
            </div>
        </form>
    </div>
@endsection
