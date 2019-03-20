@extends('layouts.app')
@section('content')
    <td><img src="{{'/upload/images/' . $posts->image}}" style="height: 130px; width:285px"></td><br>
    <td>{{$posts->title}}</td><br>
    <td>{{$posts->create_at}}</td><br>
    <td>{!!$posts->content!!}<td><br>

    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
@endsection