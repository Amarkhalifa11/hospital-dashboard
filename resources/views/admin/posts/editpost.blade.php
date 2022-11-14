@extends('admin.admin_master')
@section('admin')
    <div class="d-flex justify-content-between">
        <h3>welcome : {{ Auth::user()->name }} </h3>
    </div>
    <div>
        <h1 class="text-center my-5">edit post</h1>
    </div>

    <div class="card text-center">
        <form action="{{ route('posts.update', ['id'=>$posts->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

                <input type="text" placeholder="post name" value="{{$posts->post_title}}" name="post_title" class="mb-3 form-control" id="1">
                @error('post_title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <input type="text" placeholder="post auher" value="{{$posts->post_auther}}" name="post_auther" class="mb-3 form-control" id="1">
                @error('post_auther')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <input type="date" placeholder="post date" value="{{$posts->post_date}}" name="post_date" class="mb-3 form-control" id="1">
                @error('post_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <input type="file" name="post_image" value="{{$posts->post_image}}" class="mb-3 form-control" id="1">
                @error('post_image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <button type="submit" class="btn btn-primary btn-lg">update post</button>
            </div>
        </form>
    </div>
@endsection
