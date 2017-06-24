@extends('layout.main')
@section('header')
    <style>
        img {
            max-width: 100%;
            height: auto;
        }
    </style>
@endsection

@section('content')
    <div class="col-md-12">
        <button type="button" class="btn btn-warning" onclick="window.location.href='/'">
            <span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span>
            &nbsp;Back
        </button>
    </div>
    <br><br>
    <div class="panel panel-info">
        <div class="panel-heading">
            <b>Title:</b>{{$blog->title}}
        </div>
        <div class="panel-body">
            {!! $blog->detail !!}
        </div>
        <div class="panel-footer">
            <div class="col-md-3" align="left">
                <b>Post By:</b>{{$blog->user->name}}
            </div>
            <div align="right">
                <b>Created on:</b>{{$blog->created_at}}
                <b>Last updated:</b>{{$blog->updated_at}}
                @if(Auth::check() && $blog->user->id == Auth::User()->id)
                    <div align="right">
                        <form id="delete{{$blog->id}}" method="post" action="/blog/{{$blog->id}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <a href="/blog/{{$blog->id}}/edit">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            </a>
                            &nbsp;/&nbsp;
                            <a href="#" onclick="document.getElementById('delete{{$blog->id}}').submit()">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </a>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="panel panel-info">
        <div class="panel-heading">
            <b>Comment</b>({{$blog->comment->count()}})
        </div>
        <div class="panel-body">
            @if(Auth::check())
                <div class="panel panel-info">
                    <div class="panel-body">
                        <form method="post" action="/blog/{{$blog->id}}/comment">
                            {{ csrf_field() }}
                            <textarea class="form-control" name="detail" rows="3"></textarea><br>
                            <div class="col-md-6">
                                <b>Post By:</b>{{$blog->user->name}}
                            </div>
                            <div class="col-md-6" align="right">
                                <button type="submit" class="btn btn-primary">Comment</button>
                            </div>
                        </form>
                        @if ($errors->any())
                            <br><br>
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            @else
                <div class="panel panel-info">
                    <div class="panel-body">
                        <div class="col-md-12" align="center">
                            <button type="button" class="btn btn-primary" onclick="window.location.href='/login'">
                                <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
                                &nbsp;Login
                            </button>
                            <button type="button" class="btn btn-warning" onclick="window.location.href='/register'">
                                <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
                                &nbsp;Register
                            </button>
                        </div>
                    </div>
                </div>
            @endif
            @foreach($blog->comment as $comment)
                <div class="panel panel-info">
                    <div class="panel-body">
                        {{$comment->detail}}
                    </div>
                    <div class="panel-footer">
                        <div class="col-md-3" align="left">
                            <b>Comment By:</b>{{$comment->user->name}}
                        </div>
                        <div align="right">
                                <b>Created on:</b>{{$comment->created_at}}
                                <b>Last updated:</b>{{$comment->updated_at}}
                        @if(Auth::check() && Auth::User()->id == $comment->user_id)
                                <form id="delete{{$comment->id}}" method="post" action="/blog/{{$comment->id}}/comment">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <a href="#" onclick="document.getElementById('delete{{$comment->id}}').submit()">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </a>
                                </form>
                        @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection