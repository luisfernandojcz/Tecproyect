<?php

namespace App\Http\Controllers;


use App\Commet;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommetController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'body'=>'required',
        ]);
        $comment = new Commet();
        $comment->body =  $request->body;
        $comment->user()->associate($request->user());
        $post = Post::find($request->post_id);
        $post->comments()->save($comment);
        return back()->with('info','El comentario está siendo evaluado');
    }
    public function replyStore(Request $request)
    {
        $request->validate([
            'body'=>'required',
        ]);
        $reply = new Commet();
        $reply->body =  $request->get('body');
        $reply->user()->associate($request->user());
        $reply->parent_id =  $request->get('comment_id');
        $post = Post::find($request->get('post_id'));
        $post->comments()->save($reply);
        return back()->with('info','La respuesta está siendo evaluado');
    }

    public function edit(Commet $commet)
    {
        return view('admin.posts.partials._editComments', compact('commet'));
    }
    public function update(Request $request, Commet $commet)
    {
        $request->validate([
            'body'=>'required',
        ]);
        $commet->fill($request->all())->save();
        return back()->with('info','Actualizado con éxito');
    }
    
    public function destroy(Commet $commet)
    {
        $commet->delete();
        return back()->with('info','Borrado con éxito');
    }
}
