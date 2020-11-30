@extends('layouts.master')
​
@section('title')
    <title>Input Kategori Transaksi</title>
@endsection
​
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Tambah Data</h1>
                    </div>
                    <div class="col-sm-6">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('kategori_transaksi.index') }}">Kategori Transaksi</a></li>
                            <li class="breadcrumb-item active">Tambah</li>
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

                            @endslot

                            @if (session('success'))
                                @alert(['type' => 'success'])
                                    {!! session('success') !!}
                                @endalert
                            @endif
                            <form action="{{ route('kategori_transaksi.store') }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <select name="category" id="category"
                                    required class="form-control {{ $errors->has('category') ? 'is-invalid':'' }}">
                                        <option value="">Pilih</option>
                                            <option value="Income">Income</option>
                                            <option value="Expense">Expense</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="transaction_name">Nama Transaksi</label>
                                    <input type="text" name="transaction_name" required
                                        class="form-control {{ $errors->has('transaction_name') ? 'is-invalid':'' }}">
                                    <p class="text-danger">{{ $errors->first('transaction_name') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="">Nominal</label>
                                    <input type="text" name="nominal" required
                                        class="form-control {{ $errors->has('nominal') ? 'is-invalid':'' }}">
                                    <p class="text-danger">{{ $errors->first('nominal') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="">Pilih Transaksi</label>
                                    <select name="transaction_id" id="transaction_id"
                                        required class="form-control {{ $errors->has('transaction_id') ? 'is-invalid':'' }}">
                                        <option value="">Pilih</option>
                                        @foreach ($transactions as $row)
                                            <option value="{{ $row->id }}">{{ ucfirst($row->description) }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('transaction_id') }}</p>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm">
                                        <i class="fa fa-send"></i> Simpan
                                    </button>
                                </div>
                            </form>
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
