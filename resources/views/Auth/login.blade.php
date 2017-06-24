@extends('layout.main')

@section('content')
    <div style="width:50%;margin:auto;">
        <form class="form-signin" method="post" action="/login">
            {{ csrf_field() }}
            <h2 class="form-signin-heading">Please login</h2>
            <input type="email" class="form-control" name="email" placeholder="Email Address" required
                   autofocus>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <a href="/register">Register?</a>
            <button class="btn btn-lg btn-primary btn-block" type="submit">
                <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
                Login
            </button>
            <button class="btn btn-lg btn-warning btn-block" type="button"
                    onclick="window.location.href='/';">
                <span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span>
                Back
            </button>
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
        </form>
    </div>
@endsection