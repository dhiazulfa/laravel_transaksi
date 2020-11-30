@extends('layouts.master')
​
@section('title')
    <title>Edit Kategori Transaksi</title>
@endsection
​
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Data</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('kategori_transaksi.index') }}">Produk</a></li>
                            <li class="breadcrumb-item active">Edit</li>
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

                            @if (session('error'))
                                @alert(['type' => 'danger'])
                                    {!! session('error') !!}
                                @endalert
                            @endif
                            <form action="{{ route('kategori_transaksi.update', $product->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">

                                <div class="form-group">
                                    <label for="">Category</label>
                                    <select name="category" id="category"
                                    required class="form-control {{ $errors->has('category') ? 'is-invalid':'' }}">
                                        <option value="">Pilih</option>
                                            <option value="Income">Income</option>
                                            <option value="Expense">Expense</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Transaction Name</label>
                                    <input type="text" name="transaction_name" required
                                        value="{{ $transaction_categories->transaction_name }}"
                                        class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}">
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="">Nominal</label>
                                    <input type="number" name="nominal" required
                                        value="{{ $transaction_categories->nominal }}"
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
                                    <button class="btn btn-info btn-sm">
                                        <i class="fa fa-refresh"></i> Update
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
