@extends('layouts.app')
@section('content')

    <h1>My Blog</h1>
    <div class="col-6">
        <form class="navbar-form navbar-right" action="{{ route('admin.post.search') }}" method="get">
            @csrf
            <div class="row">
                <div class="col-8">
                    <div class="form-group">
                        <input type="text" class="form-control" name="keyword" placeholder="Search"
                        >
                    </div>
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>
            </div>
        </form>
    </div>


    @if(Session::has('success'))
        <h5 class="text-primary">{{ Session::get('success')}}</h5>
    @endif

    @if(isset($message))
        <h5 class="text-primary">{{ $message }}</h5>
    @endif
    <div class="row">
        <table class="col-12 table table-striped">
            <thead>
            <tr class="text-center" style="font-size: 20px">
                <td>Title</td>
                <td>Content</td>
                <td>Create_at</td>
                <td>Avatar</td>
                <td>Thể loại</td>
                <td colspan="4">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td><a href="{{ route('admin.post.show',$post->id)}}">{{$post->title}}</a>
                    </td>
                    <td>{{$post->content}} </td>
                    <td>{{$post->created_at}}</td>
                    <td><img src="{{'/upload/images/' . $post->image}}" style="height: 130px; width:200px"></td>
                    <td>{{$post->catogory->name}}</td>
                    <td><a href="{{ route('admin.post.edit',$post->id)}}" class="btn btn-primary">Edit</a>
                    </td>
                    {{--<td><a href="{{route('post.exportPDF', $post->id)}}" class="btn btn-warning">Export</a>--}}
                    <td>
                        <a href="{{ route('admin.post.destroy',$post->id) }}" class="btn btn-danger"
                           onclick="return confirm('Bạn có muốn xoá ? ')">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
