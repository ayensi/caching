<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function index()
    {
        return Cache::remember('posts',now()->addMinutes(10),function (){
            return $this->getPosts();
        });
    }
    public function getPosts()
    {
        return Post::all();
    }
    public function deleteCache()
    {
        Cache::forget('posts');
        return response()->json([
            'message' => 'Deleted cache'
        ],200);
    }
}
