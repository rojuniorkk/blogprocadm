<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogElement;
use App\Models\BlogElementGroup;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class BlogController extends Controller
{

    /**
     * Display a listing of the resource.
     */

    private function generateRandomString($length = 12)
    {
        $str = '';
        $charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';


        for ($i = 0; $i < $length; $i++) {
            $char = substr($charset, rand(0, strlen($charset) - 1), 1);
            $str .= $char;
        }

        return $str;
    }

    public function index($auth, $path)
    {

        $blog = Blog::where('user_id', $auth)->where('path', $path)->first();
        return view('web.blog.details', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('web.blog.compose');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        function reorderArrayKeys($array, $order)
        {
            $orderedArray = [];

            foreach ($order as $key) {
                if (array_key_exists($key, $array)) {
                    $orderedArray[$key] = $array[$key];
                }
            }

            return $orderedArray;
        }

        $BLOG = Blog::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'path' => $this->generateRandomString()
        ]);


        foreach ($request->elements as $element) {

            $GROUP = BlogElementGroup::create([
                'blog_id' => $BLOG->id,
            ]);


            $element = reorderArrayKeys($element, ['title', 'image', 'content']);


            foreach ($element as $key => $value) {

                if ($key == 'image') {
                    $value = Storage::disk('public')->putFileAs('blog/' . $BLOG->path, $value, $value->getClientOriginalName());
                }

                BlogElement::create([
                    'group_id' => $GROUP->id,
                    'type' => $key,
                    'content' => $value,
                ]);
            }
        }

        return redirect()->route('blog.index', ['user' => $request->user_id, 'path' => $BLOG->path]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
