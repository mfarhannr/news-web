@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h5 class="fw-bold my-auto">Manajemen Berita</h5>
                    <a href="/berita-create" class="btn btn-secondary">Tambah Berita</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive small">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Isi</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allBerita as $item)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{ Str::limit($item->judul, 10) }}</td>
                                    <td>{!! Str::words($item->isi, 20) !!}</td>
                                    <td>{{ $item->kategori->nama_kategori }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>
                                        <a href="asd" class="btn btn-success btn-sm">edit</a>
                                        <form class="d-inline" onsubmit="return confirm('sure to delete this data')"
                                            action="{{ route('berita.delete', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger mb-0">delete</button>
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
