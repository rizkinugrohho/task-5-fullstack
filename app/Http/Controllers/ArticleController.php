<?php

namespace App\Http\Controllers;
 
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
 
class ArticleController extends Controller
{
 
    public function index()
    {
 
        $posts = Article::orderBy('created_at','desc')->get();
 
        return view('backend.article.index',compact('posts'));
    }
 
    public function create()
    {
        $categories = Category::where('status','active')->get();
        return view('backend.article.create',compact('categories'));
    }
 
 
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
            'status' => 'required'
        ],[
            'title.required' => 'Judul harus diisi',
            'description.required' => 'Deskripsi harus diisi',
            'images.required' => 'Gambar harus diupload',
            'images.mimes' => 'Gambar harus png,jpg,jpeg',
            'status.required' => 'Status harus dipilih'
        ]);
 
        $image = $request->file('image')->store('posts');
 
 
        Article::create([
            'title' => $request->title,
            'content' => $request->description,
            'image' => $image,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->title, '-')
        ]);
 
         return redirect()->route('article.index')->with('success', 'Artikel berhasil ditambahkan');
 
    }
 
    public function edit($id)
    {
        $post = Article::find($id);
        $categories = Category::where('status','active')->get();
        return view('backend.article.update',['post' => $post,'categories' => $categories]);
    }
 
 
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'mimes:png,jpg,jpeg',
            'status' => 'required'
        ], [
            'title.required' => 'Judul harus diisi',
            'description.required' => 'Deskripsi harus diisi',
            'status.required' => 'Status harus dipilih',
            'image.mimes' => 'Image harus png,jpg,jpeg'
        ]);
 
        $post = Article::find($id);
        // $image = null;
 
        if($request->hasFile('images')){
            if($post->image){
                Storage::delete($post->image);
            }
 
        }
 
        // if(!$request->hasFile('image') && $post->image){
        //     $image = $post->image;
        // }
 
 
 
        // Cover
        $image = null;
 
        if($request->hasFile('image')){
            if($post->image){
                Storage::delete($post->image);
            }
 
            $image = $request->file('image')->store('posts');
        }
 
        if(!$request->hasFile('image') && $post->image){
            $image = $post->image;
        }
 
        $post->update([
            'title' => $request->title,
            'content' => $request->description,
            'image' => $image,
            'status' => $request->status,
            'category_id' => $post->category_id,
            'slug' => Str::slug($request->title, '-')
        ]);
 
        return redirect()->route('article.index')->with('success', 'Artikel berhasil diubah');
 
    }

    public function destroy($id)
    {
        $article = Article::find($id);
 
        $article->delete();
 
        return redirect()->route('article.index')->with('success','Berhasil Menghapus Artikel');
    }
 
}
