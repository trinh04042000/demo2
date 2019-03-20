@extends('layouts.app')
@section('title', 'add new')
@section('content')
    <div class="col -12">
        <h1>Create new post</h1>
    </div>
    <form method="post" action="{{(route('admin.post.create'))}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input name="title" class="form-control" id="exampleInputEmail1" placeholder="title">
            @if($errors ->has('title'))
                <p class="help is-danger" style="color:red; ">{{$errors->first('title')}}</p>
            @endif
        </div>
        <label for="exampleInputPassword1">Content</label>
        <input name="content" class="form-control" id="exampleInputPassword1" placeholder="content">
        @if($errors ->has('content'))
            <p class="help is-danger" style="color:red; ">{{$errors->first('content')}}</p>
        @endif
        <div class="form-group">
            <label>Image</label>
            <input type="file" class="form-control-file" name="image">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Tỉnh thành</label>
            <select class="form-control" name="catogory_id">
                @foreach($catogories as $catogory)
                    <option value="{{ $catogory->id }}">{{ $catogory->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
    </form>
@endsection