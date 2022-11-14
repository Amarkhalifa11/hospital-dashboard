@extends('admin.admin_master')
@section('admin')
<div class="d-flex justify-content-between">
    <h3>welcome : {{Auth::user()->name}} </h3>
    <h3>count of doctors  : {{count($doctors)}} </h3>
</div>
<div>
    <h1 class="text-center my-5" >all doctors</h1>
    @if (session('message'))
        <h2 class="text-center text-success mb-3">{{session('message')}}</h2>
    @endif
</div>

<div class="row">
    <table class="table table-dark table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">doctors name</th>
            <th scope="col">doctors image</th>
            <th scope="col">doctors mobile</th>
            <th scope="col">doctors age</th>
            <th scope="col">created at</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
          </tr>
        </thead>
        <tbody>
            @php
                $i=1;
            @endphp
            @foreach ($doctors as $doctor)
            
            <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$doctor->doctor_name}}</td>
                <td><img src="{{$doctor->image}}" height="50" alt=""></td>
                <td>{{$doctor->mobile}}</td>
                <td>{{$doctor->age}}</td>
                <td>{{$doctor->created_at->diffForHumans()}}</td>
                <td class="text-center"><a href="{{ route('doctors.edit', ['id'=> $doctor->id]) }}" class="btn btn-warning btn-lg">edit</a></td>
                <td class="text-center"><a href="{{ route('doctors.SoftDelete', ['id'=>$doctor->id]) }}" class="btn btn-danger btn-lg">delete</a></td>
            </tr>

            @endforeach
        </tbody>
      </table>

      {{ $doctors->links() }}
</div> 
    
@endsection