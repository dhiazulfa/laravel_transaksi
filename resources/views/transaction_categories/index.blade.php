@extends('layouts.master')
@section('title')
    <title>Data Kategori Transaksi</title>
@endsection
​
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Kategori Transaksi</h1>
                    </div>
                    <div class="col-sm-6">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Kategori Transaksi</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
​
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @card
                            @slot('title')
                            <ol class="breadcrumb float-sm-right">
                            <a href="{{ route('kategori_transaksi.create') }}"
                                class="btn btn-primary btn-sm mr-3">
                                <i class="fa fa-edit"></i> Tambah
                            </a>

                            <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('kategori_transaksi.index') }}">
                                    <input name="cari" class="form-control mr-sm-2 " type="search" aria-label="Search">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" >Search</button>
                            </form>
                            <ol>
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
                                            <th>No</th>
                                            <th>Deskripsi</th>
                                            <th>Code</th>
                                            <th>Rate Euro</th>
                                            <th>Date Paid</th>
                                            <th>Kategori</th>
                                            <th>Nama Transaksi</th>
                                            <th>Nominal(IDR)</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php $no = 0;?>

                                        @forelse ($transaction_categories as $row)

                                    <?php $no++ ;?>

                                        <tr>
                                            <td>
                                                {{ $no }}
                                            </td>

                                            <td>
                                                <strong>{{ ucfirst($row->transaction->description) }}</strong>
                                            </td>

                                            <td>{{ $row->transaction->code }}</td>

                                            <td>@currency($row->transaction->rate_euro)</td>

                                            <td>{{ $row->transaction->date_paid }}</td>

                                            <td>{{ $row->category }}</td>

                                            <td>{{ $row->transaction_name }}</td>

                                            <td>@currency($row->nominal)</td>

                                            <td>
                                                <form action="{{ route('kategori_transaksi.destroy', $row->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <a href="{{ route('kategori_transaksi.edit', $row->id) }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                                <div class="float-right">
                                    {!! $transaction_categories->links() !!}
                                </div>

                            </div>
                            @slot('footer')
​
                            @endslot
                        @endcard
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
