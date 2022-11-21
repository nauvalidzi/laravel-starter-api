<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $address = Blog::where(function ($query) use ($search) {
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('contents', 'like', "%{$search}%");
        })->get();

        return response()->json([
            'success' => true,
            'query' => $search,
            'data' => $address,
        ]);
    }

    public function show($id)
    {
        $blog = Blog::find($id);

        if (!$blog) {
            return response()->json([
                'success' => true,
                'data' => 'Blog not found.'
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $blog
        ]);
    }
}
