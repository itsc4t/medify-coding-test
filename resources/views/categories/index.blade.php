@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Kategori Items</div>

                <div class="card-body">

                    <form method="POST" action="{{ url('categories') }}" class="mb-4">
                        @csrf

                        <div class="form-group">
                            <label>Kode Kategori</label>
                            <input type="text"
                                name="kode"
                                class="form-control"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text"
                                   name="nama"
                                   class="form-control"
                                   required>
                        </div>

                        <button class="btn btn-primary mt-3">
                            Tambah
                        </button>
                    </form>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->kode }}</td>
                                <td>{{ $category->nama }}</td>
                                <td>

                                    <a href="{{ url('categories/view/'.$category->id) }}"
                                    class="btn btn-primary btn-sm">
                                        Detail
                                    </a>

                                    <a href="{{ url('categories/delete/'.$category->id) }}"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus kategori ini?')">
                                        Hapus
                                    </a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection