@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <p class="text-uppercase text-sm">+ Postingan</p>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="/admin-create-postingan" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Judul</label>
                                    <input class="form-control" type="text" name="name" onfocus="focused(this)"
                                        onfocusout="defocused(this)">
                                </div>
                                @error('name')
                                <p class="text-danger text-xs pt-1">{{ $message }}</p>
                                @enderror
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Kategori</label>
                                    <select class="form-select" name="kategori_postingan_id">
                                        <option>---</option>
                                        @foreach ($allCategory as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('kategori_postingan_id')
                                <p class="text-danger text-xs pt-1">{{ $message }}</p>
                                @enderror
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Gambar</label>
                                    <input type="file" name="image" class="form-control"
                                        onfocus="focused(this)" onfocusout="defocused(this)">
                                </div>
                                @error('image')
                                <p class="text-danger text-xs pt-1">{{ $message }}</p>
                                @enderror
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Deskripsi</label>
                                    <textarea class="form-control" id="editor" type="text" name="deskripsi" onfocus="focused(this)"
                                        onfocusout="defocused(this)"></textarea>
                                </div>
                                @error('deskripsi')
                                <p class="text-danger text-xs pt-1">{{ $message }}</p>
                                @enderror
                                <button type="submit" class="btn btn-primary btn-sm ms-auto mt-4">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        id</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Gambar</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Judul</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Kategori</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Make at</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @foreach ($allPostingan as $item)
                                <tr>
                                    <td>
                                        <p class="ps-3 text-xs font-weight-bold mb-0">{{ $i }}.</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <img src="{{asset('img/' . $item->image)}}" alt="image" class="height-100 w-auto border-radius-lg shadow-sm me-3">
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $item->name }}</span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $item->kategori_postingan->name }}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $item->updated_at}}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <form class="d-inline" onsubmit="return confirm('sure to delete this data')"
                                            action="/admin-create-postingan/{{ $item->id }}/delete"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-xs btn-danger mb-0 font-weight-bold text-xs">
                                                <span class="btn-inner--icon"><i class="fas fa-trash-alt"></i></span>
                                                <span class="btn-inner--text"> Delete</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @php
                                $i++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>