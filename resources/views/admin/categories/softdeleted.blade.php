@extends('admin.admin_master')
@section('admin')
<div class="d-flex justify-content-between">
    <h3>welcome : {{Auth::user()->name}} </h3>
    {{-- <h3>count of categories  : {{count($categories)}} </h3> --}}
</div>
<div>
    <h1 class="text-center my-5" >all softdeleted</h1>
    @if (session('message'))
        <h2 class="text-center text-success mb-3">{{session('message')}}</h2>
    @endif
</div>

<div class="row">
    <table class="table table-dark table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">user</th>
            <th scope="col">category name</th>
            <th scope="col">created at</th>
            <th scope="col">restore</th>
            <th scope="col">delete</th>
          </tr>
        </thead>
        <tbody>
            @php
                $i=1;
            @endphp
            @foreach ($trashedcategories as $category)
            
            <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$category->user->name}}</td>
                <td>{{$category->category_name}}</td>
                <td>{{$category->created_at->diffForHumans()}}</td>
                <td class="text-center"><a href="{{ route('categories.restore', ['id'=>$category->id]) }}" class="btn btn-success btn-lg">restore</a></td>
                <td class="text-center"><a href="{{ route('categories.harddelete', ['id'=>$category->id]) }}" class="btn btn-danger btn-lg">delete</a></td>
            </tr>

            @endforeach
        </tbody>
      </table>

      {{ $trashedcategories->links() }}
</div> 
    
@endsection