@extends('layouts.admin')
        
@section('content')
    <a href="/posts" class="btn btn-info">Go Back</a>
    <h1>{{$post->title}}</h1>
    <small>Written on{{$post->created_at}}</small>
    <div>
        {{$post->body}}
    </div>
    <hr>
<a href="/posts/{{$post->id}}/edit" class="btn btn-secondary">Edit</a>
<br>
<br>
{!!Form::open(['action' =>['PostController@destroy',$post->id],'method' => 'POST', 'class' => 'pull-right'])!!}
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Delete',['class' =>'btn btn-danger'])}}
{!!Form::close()!!}
@endsection