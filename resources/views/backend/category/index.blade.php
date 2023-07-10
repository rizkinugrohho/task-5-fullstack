@extends('layouts.master')
 
@section('title', 'List Kategori')
 
@section('content')
@include('layouts.message')
<div class="card">
    <div class="card-header">
        <a href="{{ route('category.create') }}" class="btn btn-success btn-sm" style="color: #fff;">
            <i class="la la-plus" style="color: #fff;"></i>
            Tambah
        </a>
    </div>
    <div class="card-body">
        <h1 class="text-center" style="margin-bottom: 1em;">Daftar Kategori</h1>
        <div class="table-responsive">
            <table id="bs4-table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th style="width: 10px;">No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th style="width: 50px;">Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <span class="badge badge-{{ $category->status == 'inactive' ? 'danger' : 'success' }}">
                                {{ $category->status == 'inactive' ? 'Tidak Aktif' : 'Aktif' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-info btn-sm"
                                style="color: #fff;"> <i class="la la-edit" style="color: #fff; font-size: 1.5em;"></i>
                                Ubah
                            </a>
                            <form action="{{ route('category.destroy',$category->id) }}" method="POST" class="d-inline">
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
@endsection