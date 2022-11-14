@extends('admin.admin_master')
@section('admin')
<div class="d-flex justify-content-between">
    <h3>welcome : {{Auth::user()->name}} </h3>
    <h3>count of users  : {{count($users)}} </h3>
</div>
<div>
    <h1 class="text-center my-5" >all users</h1>
</div>

<div class="row">
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
            <th scope="col">created at</th>
          </tr>
        </thead>
        <tbody>
            @php
                $i=1;
            @endphp
            @foreach ($users as $user)
            
            <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
            </tr>

            @endforeach
        </tbody>
      </table>
</div>
    
@endsection