@extends('layout.main')
@section('header')
    <script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <h2 class="form-signin-heading">Create</h2>
    <div class="panel panel-info">
        <div class="panel-body">
            <form method="post" action="/blog">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="Title">Title</label>
                    <input type="text" class="form-control" id="Title" name="title" placeholder="Title">
                </div>
                <div class="form-group">
                    <label for="Detail">Detail</label>
                    <textarea name="detail" id="editor1" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
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
        CKEDITOR.replace( 'editor1', {
            filebrowserBrowseUrl:"../kcfinder/browse.php?opener=ckeditor&type=files",
            filebrowserImageBrowseUrl:"../kcfinder/browse.php?opener=ckeditor&type=images",
            filebrowserFlashBrowseUrl:"../kcfinder/browse.php?opener=ckeditor&type=flash",
            filebrowserUploadUrl:"../kcfinder/upload.php?opener=ckeditor&type=files",
            filebrowserImageUploadUrl:"../kcfinder/upload.php?opener=ckeditor&type=images",
            filebrowserFlashUploadUrl:"../kcfinder/upload.php?opener=ckeditor&type=flash",
        });
    </script>
@endsection