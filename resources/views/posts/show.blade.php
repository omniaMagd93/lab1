
@extends('layouts.master')

@section('content')

<div class ="container-fluid" >
 <form >
  <fieldset>
    <legend>Post Info</legend>
    <table>

    	<tr>
    <td>Title:</td>
    <td> {{$post->title}}</td>
        </tr>

        <tr>
        	<td>Description:</td>
        	<td>{{$post->description}}</td>
        </tr>

        
    </table>
  </fieldset>
</form> 

<br>
<br>

 <form>
  <fieldset>
    <legend>Post Creator Info</legend>
    <table>

        <tr>
    <td>Name:</td>
    <td> {{$post->user->name}}</td>
        </tr>
  
        <tr>
            <td>Email:</td>
            <td>{{$post->user->email}}</td>
        </tr>
         <tr>
            <td>Date:</td>
            <td>{{$post->creat_date}}</td>
        </tr>

        
    </table>
  </fieldset>
</form> 

</div>

@endsection