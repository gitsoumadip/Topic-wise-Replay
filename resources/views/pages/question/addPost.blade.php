@extends('pages.layout.master')
@section('main')

    <div class="card mt-2">
        <div class="card-header">
           <h5><b>Question:</b> {{$topicDetails->title}}</b></h5>
           <p><b>Description: </b>{{$topicDetails->description}}</p>
        </div>
        @auth
        <div class="card-body">
            <div class="row">
                <form action="{{ route('addComment') }}" method="POST">
                    @csrf
                    <div>
                        <h3>Give an answer</h3>
                        <div>
                            <label for="comments"></label>
                            <textarea name="comments" id="comments" cols="97" rows="3" placeholder=""></textarea>
                            <input type="hidden" name="post_id" value="{{ $topicDetails->id }}" />
                            <input type="hidden" name="user_id" value="{{ session('username') }}">

                        </div>

                            <div style="float:right">
                                <button class="btn btn-primary me-md-2" value="submit">Answer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endauth
    </div>
    <hr>
    <h4 class="border-bottom">Display Comments</h4>

    @forelse ($topicDetails->comment as $comment)
        <div class="card">
            <div class="px-3 py-1 text-left">
                <h4>{{ $comment->comment }} by {{ $comment->user->name }}</h1>
            </div>
            <form action="{{ route('addComment') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ session('username') }}">
                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                <input type="hidden" name="post_id" value="{{ $topicDetails->id }}" />
                <h5>Reply</h5>
                @auth
                    <div class="d-flex align-items-center">
                        <input class="form-control" name="comments" id="comments" placeholder="Give a reply">
                        <button class="btn btn-primary btn-sm px-4 py-2" value="submit">Reply</button>
                    </div>
                @endauth
            </form>
            <div class="ps-5">
                {{-- <p class="border-bottom">Replies</p> --}}
                @forelse ($getReplies($comment->id) as $reply)
                    <p>{{ $reply->comment }} by {{ $reply->user->name }}</p>

                @empty
                @endforelse
            </div>
        </div>
        <hr>

    @empty
    @endforelse
@endsection
