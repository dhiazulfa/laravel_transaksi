@extends('layouts.master')
​
@section('title')
    <title>Data Transaksi</title>
@endsection
​
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Input Data Transaksi</h1>
                    </div>
                    <div class="col-sm-6">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Transaksi</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
​
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        @component('components.card')

                            @slot('title')
                            Tambah
                            @endslot

                            @if (session('error'))
                                @alert(['type' => 'danger'])
                                    {!! session('error') !!}
                                @endalert
                            @endif
​
                            <form role="form" action="{{ route('transaksi.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" cols="5" rows="5" class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="code">Code</label>
                                    <input type="text"
                                    name="code"
                                    class="form-control {{ $errors->has('code') ? 'is-invalid':'' }}" id="code" required>
                                </div>

                                <div class="form-group">
                                    <label for="rate_euro">Rate Euro</label>
                                    <input type="text"
                                    name="rate_euro"
                                    class="form-control {{ $errors->has('rate_euro') ? 'is-invalid':'' }}" id="rate_euro" required>
                                </div>

                                <div class="form-group">
                                    <label for="date_paid">Date Paid</label>
                                    <input type="date"
                                    name="date_paid"
                                    class="form-control {{ $errors->has('date_paid') ? 'is-invalid':'' }}" id="date_paid" required>
                                </div>

                            @slot('footer')
                                <div class="card-footer">
                                    <button class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                            @endslot
                        @endcomponent
                    </div>

                    <div class="col-md-8">
                        @component('components.card')

                            @slot('title')
                            List Data Transaksi
                            @endslot

                            @if (session('success'))
                            @alert(['type' => 'success'])
                                    {!! session('success') !!}
                                @endalert
                            @endif

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Deskripsi</td>
                                            <td>Code</td>
                                            <td>Rate Euro</td>
                                            <td>Date Paid</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @forelse ($transactions as $row)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->description }}</td>
                                            <td>{{ $row->code }}</td>
                                            <td>{{ number_format($row->rate_euro) }}</td>
                                            <td>{{ $row->date_paid }}</td>
                                            <td>
                                                <form action="{{ route('transaksi.destroy', $row->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <a href="{{ route('transaksi.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            @slot('footer')
​
                            @endslot
                        @endcomponent
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
