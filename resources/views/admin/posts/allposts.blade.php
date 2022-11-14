@extends('admin.admin_master')
@section('admin')
<div class="d-flex justify-content-between">
    <h3>welcome : {{Auth::user()->name}} </h3>
    <h3>count of posts  : {{count($posts)}} </h3>
</div>
<div>
    <h1 class="text-center my-5" >all posts</h1>
    @if (session('message'))
        <h2 class="text-center text-success mb-3">{{session('message')}}</h2>
    @endif
</div>

<div class="row">
    <table class="table table-dark table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">post title</th>
            <th scope="col">post image</th>
            <th scope="col">post auther</th>
            <th scope="col">post date</th>
            <th scope="col">created at</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
          </tr>
        </thead>
        <tbody>
            @php
                $i=1;
            @endphp
            @foreach ($posts as $post)
            
            <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$post->post_title}}</td>
                {{-- <td>{{$post->post_image}}</td> --}}
                <td><img src="{{$post->post_image}}" height="50" alt=""></td>
                <td>{{$post->post_auther}}</td>
                <td>{{$post->post_date}}</td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td class="text-center"><a href="{{ route('posts.edit', ['id'=>$post->id]) }}" class="btn btn-warning btn-lg">edit</a></td>
                <td class="text-center"><a href="{{ route('posts.softDeletes', ['id'=>$post->id]) }}" class="btn btn-danger btn-lg">delete</a></td>
            </tr>

            @endforeach
        </tbody>
      </table>

      {{ $posts->links() }}
</div> 
    
@endsection