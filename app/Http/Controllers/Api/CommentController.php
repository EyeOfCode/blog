<?php

namespace App\Http\Controllers\Api;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        if (Auth::check()) {
            $this->validate($request, [
                'detail' => 'Required',
            ]);

            $comment = new Comment();
            $comment->detail = $request->input('detail');
            $comment->blog_id = $id;
            $comment->user_id = Auth::User()->id;
            $comment->save();
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back();
    }
}
