@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="mb-2">
                <a href="{{ url('categories') }}" class="btn btn-secondary">
                    Kembali
                </a>

                <a href="{{ url('categories/'.$category->id.'/pdf') }}"
                   class="btn btn-danger">
                    Download PDF
                </a>
            </div>

            <div class="card">
                <div class="card-header">
                    Detail Kategori
                </div>

                <div class="card-body">

                    <p>
                        <strong>Kode Kategori:</strong>
                        {{ $category->kode }}
                    </p>

                    <p>
                        <strong>Nama Kategori:</strong>
                        {{ $category->nama }}
                    </p>

                    <hr>

                    <h5>Item</h5>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Harga Beli</th>
                                <th>Supplier</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($category->masterItems as $item)
                            <tr>
                                <td>{{ $item->kode }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jenis }}</td>
                                <td>{{ number_format($item->harga_beli, 0, ',', '.') }}</td>
                                <td>{{ $item->supplier }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    Belum ada item pada kategori ini.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection