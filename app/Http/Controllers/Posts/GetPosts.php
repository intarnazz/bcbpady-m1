<?php


namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Posts\Post;

class GetPosts extends Controller
{
  public function GetAll()
  {
    $posts = Post::join('users', 'autor_id', '=', 'user_id')
      ->orderBy('posts.created_at', 'desc')
      ->paginate();
    $res = [];
    foreach ($posts as $post) {
      $res[$post->post_id] = [
        'title' => $post->title,
        'short_title' => $post->short_title,
        'descr' => $post->descr,
        'name' => $post->name,
      ];
    }
    ;
    return response()->json($res);
  }
}