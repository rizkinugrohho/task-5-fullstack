@extends('layouts.master')
 
@section('title', 'List Artikel')
 
@section('content')
@include('layouts.message')
<div class="container">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('article.create') }}" class="btn btn-success btn-sm" style="color: #fff;">
                <i class="la la-plus" style="color: #fff;"></i>
                Tambah
            </a>
        </div>
        <div class="card-body">
            <h1 class="text-center" style="margin-bottom: 1em;">Daftar Artikel</h1>
            <div class="table-responsive">
                <table id="bs4-table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width: 10px;">No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Konten</th>
                            <th style="width: 50px;">Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td style="white-space: nowrap;">{{ $post->title }}</td>
                            <td>@if ($post->category)
                                    {{ $post->category->title }}
                                @endif
                            </td>
                            <td>{!! substr($post->content, 0, 60) !!}...</td>
                            <td>
                                <span class="badge badge-{{ $post->status == 'inactive' ? 'danger' : 'success' }}">
                                    {{ $post->status == 'inactive' ? 'Tidak Aktif' : 'Aktif' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('article.edit',$post->id) }}" class="btn btn-info btn-sm"
                                    style="color: #fff;"> <i class="la la-edit"
                                        style="color: #fff; font-size: 1.5em;"></i>
                                    Ubah
                                </a>
                                <form action="{{ route('article.destroy',$post->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus data?');"
                                        class="btn btn-danger btn-sm d-inline">
                                        <i class="la la-trash" style="color: #fff; font-size: 1.5em;"></i>Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection