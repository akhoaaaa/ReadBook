<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Truyen;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    protected $post;

    /**
     * @param $post
     */
    public function __construct(Truyen $post)
    {
        $this->post = $post;
    }


    /**
     * Display a listing of the resource.
     */
    //Get
    public function index()
    {
        $posts = $this->post->get();
        $postsCollection = new PostCollection($posts);

        return response()->json([
            'data'=> $postsCollection
        ],Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    //POST
    public function store(StorePostRequest $request)
    {

        $dataCreate = $request->all();
        $post = $this->post->create($dataCreate);
        $postResource = new PostResource($post);
        return response()->json([
            'data'=> $postResource
        ],Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
