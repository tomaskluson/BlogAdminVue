<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // uspořádání podle id
        return Post::with('user')->latest('id')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // id musí existovat v tabulce users, nemůžeme si vymyslet jakékoliv
        // |exists:users,id

        // slug musí být unikátní v rámci tabulky posts
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts',
            'text' => 'required',
            'user_id' => 'required|integer|exists:users,id'
        ]);

        // uložení dat z vue formuláře
        $post = Post::create(
            $request->all()
        );

        // přeposlání dat na zpět do VUE
        // 201 - záznam byl vytvořený
        return response()->json([
            'message' => 'post created',
            'post' => $post,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Post::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

/* 
        Rule::unique('users')->ignore($user->id, 'user_id')
Rule::unique('users', 'email_address')->ignore($user->id),


use Illuminate\Validation\Rule;

Validator::make($data, [
    'email' => [
        'required',
        Rule::unique('users')->ignore($user->id),
    ],
]); */


        //slug,{$id} - slug ignoruj pro záznam s $id 
        Validator::make($request, [
            'title' => 'required',
            /* 'slug' => ['required', Rule::unique('posts')->ignore($id, 'slug')], */
            'slug' =>"required|unique:posts,slug,{$id}",
            /* 'slug' => 'required|unique:posts,slug,'. $id, */
            /* 'slug' => ['required', Rule::unique('posts')->ignore($id),], */
            'text' => 'required',
            'user_id' => 'required|integer|exists:users,id'
        ]);

        $post = Post::find($id);
        $post->update(
            $request->all()
        );

        return response()->json([
            'message' => 'post updated',
            'post' => $post,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return response()->json([
            'message' => 'post deleted'
        ], 200);
    }
}
