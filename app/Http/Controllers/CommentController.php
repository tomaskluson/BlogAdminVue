<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required',
            'post_id' => 'required|integer'
        ]);  

        /* auth()->user()->comments()->create(
            $request->all()
        ); */

        $comment = auth()->user()->comments()->create(
            $request->all()
        );

        /* Comment::create(
            $request->all()
        ); */

        /* return redirect()->back(); */
        return redirect('/posts/' . $comment->post->slug  . '#comments')
            ->with('flash', 'you totally commented!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $this->authorize('update', $comment);

        $comment->text = $request->text;
        $comment->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $this->authorize('update', $comment);

        $comment->delete();
    }
}
