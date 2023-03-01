@extends('layout')

@section('content')
    <div class="card">
        <video src="{{$video->path}}" controls class="card-img-top" alt="..."></video>
        <div class="card-body">
            <h5 class="card-title">{{$video->title}}</h5>
            <p class="card-text">{{$video->description}}</p>
        </div>
        <div class="card-footer text-muted">
            {{$video->created_at->diffForHumans()}}
        </div>
    </div>

    @php
    $placeholder_comment = 'UUS COMMENT';
    @endphp

   
    <form action="{{route('comments.store', ['video_id' => $video->id, 'placeholder_comment' => $placeholder_comment ])}}" method="POST">
        @csrf
        <input type="hidden" name="video_id" id="video_id" value="{{$video->id}}">
        <div class="form-group
        @error('body') is-invalid @enderror">
            <label for="comment">Comment</label>
            <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
            @error('body')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
            <button type="submit" class="btn btn-primary mt-3 mb-3">Submit</button>
        </div>
    </form>

    @foreach($video->comments as $comment)
        <div class="card mt-2">
            <div class="card-body">
                <p class="card-text">{{$comment->body}}</p>
            </div>
            <div class="card-footer text-muted">
                {{$comment->user->name}}
                {{$comment->created_at->diffForHumans()}}
            </div>
        </div>
    @endforeach
@endsection
