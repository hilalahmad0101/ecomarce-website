<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);

            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }

    function index(): View
    {
        $blogs = Blog::latest()->get();
        return view('admin.blog.index', compact('blogs'));
    }
    function create(): View
    {
        $categories = BlogCategory::whereStatus(1)->latest()->get();
        return view('admin.blog.create', compact('categories'));
    }
    function store(Request $request): RedirectResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2096',
            'title' => 'required',
            'description' => 'required',
            'cat_id' => 'required',
            'tags' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
        ]);
        $blog = new Blog();

        $filename = '';
        if ($request->file('image')) {
            $filename = $request->file('image')->store('blog', 'public');
        }

        $blog->image = $filename;
        $blog->title = $request->title;
        $blog->cat_id = $request->cat_id;
        $blog->description = $request->description;
        $blog->tags = $request->tags;
        $blog->meta_description = $request->meta_description;
        $blog->meta_keyword = $request->meta_keywords;
        $blog->save();
        return redirect()->route('admin.blog.index')->with('success', 'Blog Create successfully');
    }
    function edit($id): View
    {
        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::whereStatus(1)->latest()->get();
        return view('admin.blog.update', compact('blog', 'categories'));
    }
    function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2096',
            'title' => 'required',
            'description' => 'required',
            'cat_id' => 'required',
            'tags' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
        ]);
        $blog = Blog::findOrFail($id);

        $filename = '';
        if ($request->file('image')) {
            $filename = $request->file('image')->store('blog', 'public');
        } else {
            $filename = $blog->image;
        }

        $blog->image = $filename;
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->tags = $request->tags;
        $blog->meta_description = $request->meta_description;
        $blog->meta_keyword = $request->meta_keywords;
        $blog->save();
        return redirect()->route('admin.blog.index')->with('success', 'Blog Update successfully');
    }
    function delete($id): RedirectResponse
    {
        $blog = Blog::findOrFail($id);
        $path = public_path('storage\\' . $blog->image);
        if (File::exists($path)) {
            File::delete($path);
        }
        $blog->delete();
        return redirect()->route('admin.blog.index')->with('success', 'Blog Delete successfully');
    }
}
