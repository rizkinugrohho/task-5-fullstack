<?php
 
namespace App\Http\Controllers;
 
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
 
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories  = Category::orderBy('created_at','desc')->get();
        return view('backend.category.index',compact('categories'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required'
        ],[
            'title.required' => 'Judul harus diisi',
            'description.required' => 'Deskripsi harus diisi',
            'status.required' => 'Status harus dipilih'
        ]);
 
        Category::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'slug' => Str::slug($request->title, '-')
        ]);
 
        return redirect()->route('category.index')->with('success','Kategori Berhasil Ditambahkan !');
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.category.update',compact('category'));
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
 
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required'
        ],[
            'title.required' => 'Judul harus diisi',
            'description.required' => 'Deskripsi harus diisi',
            'status.required' => 'Status harus dipilih'
        ]);
 
        $category = Category::find($id);
 
        $category->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'slug' => Str::slug($request->title, '-')
        ]);
 
       return redirect()->route('category.index')->with('success','Berhasil Merubah Kategori');
 
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
 
        $category->delete();
 
        return redirect()->route('category.index')->with('success','Berhasil Menghapus Kategori');
    }
}
