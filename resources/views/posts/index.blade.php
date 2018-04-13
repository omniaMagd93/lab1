@extends('layouts.master')

@section('content')


<div class="col-md-12 text-center"> 

<button type="button" class="btn btn-success" >Create Post</button>

</div>

<div class ="container-fluid"> 
<table  class="table table-bordered table-striped text-center">
  <thead>
    <tr class="text-center">
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Posted By</th>
      <th scope="col">Created At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($posts as $post)

    <tr>
      <th scope="row">1</th>
      <td>{{$post->title}}</td>
      <td>{{$post->user->name}}</td>
      <td>{{date('Y-m-d', strtotime($post->created_at))}}</td>
      <td>
        <button type="button" class="btn btn-info">View</button>
        <button type="button" class="btn btn-primary">Edit</button>
        <button type="button" class="btn btn-danger">Delete</button>
      </td>
    </tr>

    @endforeach
    
  </tbody>
</table>

</div>

@endsection