<?php


namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Posts\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PostController extends Controller
{
  public function GetAll()
  {
    $posts = Post::join('users', 'autor_id', '=', 'user_id')
      ->orderBy('posts.created_at', 'desc')
      ->paginate();
    foreach ($posts as $post) {
      $res[$post->post_id] = [
        'id' => $post->post_id,
        'title' => $post->title,
        'short_title' => $post->short_title,
        'descr' => $post->descr,
        'name' => $post->name,
      ];
    }
    return response()->json($res);
  }
  public function GetPost($id)
  {
    $post = Post::join('users', 'autor_id', '=', 'user_id')
      ->orderBy('posts.created_at', 'desc')
      ->where('post_id', '=', $id)
      ->first();
    $res = [
      'title' => $post->title,
      'descr' => $post->descr,
      'name' => $post->name,
      'created_at' => $post->created_at,
      'img' => $post->img,
    ];
    return response()->json($res);
  }
  public function GetImg($id)
  {
    $post = Post::all()
      ->where('post_id', '=', $id)
      ->first();
    $PostImage = $post->img;
    $path = storage_path("app/$PostImage");
    return response()->file($path);
  }
  public function PostPost(Request $request)
  {
    $res = [
      'code' => 500,
    ];
    $post = new Post;
    $post->title = $request->title;
    $post->short_title = Str::length($request->title) > 30 ?
      Str::substr($request->title, 0, 30) . '...' :
      $request->title;
    $post->descr = $request->descr;
    $post->autor_id = rand(1, 4);
    if ($request->file('img')) {
      $path = $request->file('img')->store('public');
      $post->img = $path;
    }
    try {
      $post->save();
      $res['code'] = 200;
    } catch (\Throwable $th) {
      $res['code'] = 500;
      $res['massage'] = $th;
      $res['request'] = $request;
    }
    return response()->json($res);
  }
  public function PostDel($id)
  {
    $post = Post::find( $id );
    if ($post) {
      $post->delete();
      return response()->json(200);
    }
  }
}


