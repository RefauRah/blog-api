<?php

namespace App\Http\Controllers;

use App\Jobs\SendNotification;
use App\Models\Post;
use App\Models\Payment;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::all();

        return response()->json([
            'status' => 'succes',
            'message' => 'Berhasil mengambil data',
            'data' => $post
        ]);
    }

    public function store(Request $req)
    {
        $this->validate($req, [
            'title' => 'required',
            'content' => 'required'
        ]);

        Post::create([
            'title' => $req['title'],
            'content' => $req['content']
        ]);

        return response()->json([
            'status' => 'succes',
            'message' => 'Berhasil menyimpan data',
        ]);
    }

    public function sendNotification(Request $req)
    {
        // dispatch(new SendNotification());

        // return response()->json([
        //     'status' => 'succes',
        //     'message' => true
        // ]);
    }
}
