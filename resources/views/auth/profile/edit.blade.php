@extends('layouts.app')
@section('title', 'update')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="margin-left: 200px">
                        <h2>Cập nhật Profile</h2>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form method="post" action="{{route('auth.profile.update', $user->id)}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input name="name" class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp" value="{{$user->name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <input name="email" class="form-control" value="{{$user->email}}">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input name="phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input name="address" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection