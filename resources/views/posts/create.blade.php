
@extends('layouts.master')

@section('content')

<h1>in create</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form class ="container-fluid" method="post" action="/posts">

{{csrf_field()}}

  <div class="form-group">
    <label for="exampleInputTitle">Title</label>
    <input type="text" class="form-control" name="title" placeholder="Enter title">
  </div>

 <div class="form-group">
    <label for="exampleDescription">Description</label>
    <textarea class="form-control" name="description" rows="3"></textarea>
  </div>

   <div class="form-group">
    <label for="exampleSelect1">Post Creator</label>
    <select class="form-control" name="user_id">

    	@foreach ($users as $user)
    <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach

    </select>
  </div>

  
  <button type="submit" class="btn btn-success">Create</button>
</form>

@endsection