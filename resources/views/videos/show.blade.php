@extends('layout')

@section('content')

<table class="table">
    <thead>
        <tr>
            <th>Video</th>
            <th>Title</th>
            <th>Description</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <video src="{{$video->path}}" controls class="card-img-top" alt="..."></video>
            </td>
            <td>{{$video->title}}</td>
            <td>{{$video->description}}</td>
            <td>{{$video->created_at->diffForHumans()}}</td>
        </tr>
    </tbody>
</table>
<a href="{{route('videos.index')}}" class="btn btn-danger ">Back</a>
<table class="table mt-2">
    <thead>
        <tr>
            <th>Comment</th>
            <th>User</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($video->comments as $key => $comment)
        <tr>
            <td>{{$comment->body}}</td>
            <td>{{$comment->user->name}}</td>
            <td>{{$comment->created_at->diffForHumans()}}</td>
        </tr>
    </tbody>
    @endforeach
</table>
   
@endsection