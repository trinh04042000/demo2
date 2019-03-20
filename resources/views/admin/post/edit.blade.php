@extends('layouts.app')
@section('title', 'update')
@section('content')
    <div class="col -12">
        <h1>Update post</h1>
    </div>
    <form method="post" action="{{(route('admin.post.update', $posts->id))}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input name="title" class="form-control" id="exampleInputEmail1" placeholder="title"
                   value="{{$posts->title}}">
            @if($errors ->has('title'))
                <p class="help is-danger" style="color:red; ">{{$errors->first('title')}}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Content</label>
            <input name="content" class="form-control" id="exampleInputPassword1" placeholder="content"
                   value="{{$posts->content}}">
            @if($errors ->has('content'))
                <p class="help is-danger" style="color:red; ">{{$errors->first('content')}}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" class="form-control-file" name="image">
        </div>
        <div class="form-group">
            <label>Tỉnh thành</label>
            <select class="form-control" name="catogory_id">
                @foreach($catogories as $catogory)
                    <option
                            @if($posts->catogory_id == $catogory->id)
                            {{"selected"}}
                            @endif
                            value="{{$catogory->id}}">{{$catogory->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
    </form>
@endsection