@extends('layout.main')
@section('header')
    <script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <h2 class="form-signin-heading">Edit</h2>
    <div class="panel panel-info">
        <div class="panel-body">
            <form method="post" action="/blog/{{$blog->id}}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="Title">Title</label>
                    <input type="text" class="form-control" id="Title" name="title" value="{{$blog->title}}"
                           placeholder="Title">
                </div>
                <div class="form-group">
                    <label for="Detail">Detail</label>
                    <textarea name="detail" id="editor2" rows="10">{{$blog->detail}}</textarea>
                </div>
                <div class="form-group">
                    <label>Created on:</label>{{$blog->created_at}}&nbsp;
                    <label>Last updated:</label>{{$blog->updated_at}}
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
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
    </div>
@endsection

@section('footer')
    <script type="text/javascript">
        CKEDITOR.replace('editor2', {
            filebrowserBrowseUrl: "../../kcfinder/browse.php?opener=ckeditor&type=files",
            filebrowserImageBrowseUrl: "../../kcfinder/browse.php?opener=ckeditor&type=images",
            filebrowserFlashBrowseUrl: "../../kcfinder/browse.php?opener=ckeditor&type=flash",
            filebrowserUploadUrl: "../../kcfinder/upload.php?opener=ckeditor&type=files",
            filebrowserImageUploadUrl: "../../kcfinder/upload.php?opener=ckeditor&type=images",
            filebrowserFlashUploadUrl: "../../kcfinder/upload.php?opener=ckeditor&type=flash",
        });
    </script>
@endsection