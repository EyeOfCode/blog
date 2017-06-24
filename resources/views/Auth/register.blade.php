@extends('layout.main')

@section('content')
    <div style="width:50%;margin:auto;">
        <form method="post" action="/register">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" class="form-control" id="Name" name="name" placeholder="Name" required autofocus>
            </div>
            <div class="form-group">
                <label for="Email1">Email address</label>
                <input type="email" class="form-control" id="Email1" name="email" placeholder="Email address" required>
            </div>
            <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" class="form-control" id="Password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="ConfirmPassword">Confirm password</label>
                <input type="password" class="form-control" id="ConfirmPassword" name="password_confirmation"
                       placeholder="Confirm password" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
            <button class="btn btn-warning" type="button" onclick="window.location.href='/';">
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