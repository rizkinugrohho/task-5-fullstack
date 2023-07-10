@extends('layouts.master')
 
@section('title' , 'Buat Artikel')
 
 
@section('content')
 
<div class="container">
    <form action="{{ route('article.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">Buat Artikel</div>
            <div class="card-body">
                <div class="form-body">
 
                    <div class="form-group row @error('title') is-invalid @enderror">
                        <label for="title" class="control-label text-right col-md-3">Judul</label>
                        <div class="col-md-5">
                            <input type="text" name="title" id="title" class="form-control
                            @error('title') is-invalid @enderror" value="{{ old('title') }}">
 
                            @error('title')
                            <div class="text-danger">
                                <small>{{ $message }}</small>
                            </div>
                            @enderror
                        </div>
                    </div>
 
                    <div class="form-group row @error('title') is-invalid @enderror">
                        <label for="description" class="control-label text-right col-md-3">Deskripsi</label>
                        <div class="col-md-8">
                            <textarea name="description" id="description" class="form-control cke_wrapper
                                @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
 
                            @error('description')
                            <div class="text-danger">
                                <small>{{ $message }}</small>
                            </div>
                            @enderror
                        </div>
 
                    </div>
 
                    <div class="form-group row @error('category_id') is-invalid @enderror">
                        <label for="category_id" class="control-label text-right col-md-3 mt-2">Kategori</label>
                        <div class="col-md-3">
                            <select name="category_id" id="category_id" class="form-control
                                @error('categori_id') is-invalid @enderror">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                                @endforeach
                            </select>
 
                            @error('category_id')
                            <div class="text-danger">
                                <small>{{ $message }}</small>
                            </div>
                            @enderror
                        </div>
                    </div>
 
 
                    <div class="form-group row @error('status') is-invalid @enderror">
                        <label for="status" class="control-label text-right col-md-3">Status</label>
                        <div class="col-md-3">
                            <select name="status" id="status"
                                class="form-control @error('status') is-invalid @enderror">
                                <option value="">-- Pilih Status --</option>
                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Tidak Aktif
                                </option>
                            </select>
 
                            @error('status')
                            <div class="text-danger">
                                <small class="col-md-8">{{ $message }}</small>
                            </div>
                            @enderror
                        </div>
                    </div>
 
                    <div class="form-group row @error('image') has-error @enderror">
                        <label class="control-label text-right col-md-3">Gambar</label>
                        <div class="col-md-5">
                            <input type="file" name="image" placeholder=""
                                class="form-control @error('image') has-error @enderror" autocomplete="image"
                                value="{{ old('image') }}">
 
                            @error('image')
                            <div class="text-danger">
                                <small>{{ $message }}</small>
                            </div>
                            @enderror
                        </div>
                    </div>
 
                    <div class="card-footer">
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="offset-sm-3 col-md-5">
                                            <button type="submit" class="btn btn-primary btn-rounded">
                                                <i class="la la-save" style="color: #fff; font-size: 1.5em;"></i> Simpan
                                            </button>
                                            <a href="{{ route('article.index') }}" class="btn btn-info btn-rounded"
                                                style="color: #fff;"> <i class="la la-chevron-left"
                                                    style="color: #fff; font-size: 1.5em;"></i>
                                                Kembali
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
 
@endsection