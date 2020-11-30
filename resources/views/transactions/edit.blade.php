@extends('layouts.master')
​
@section('title')
    <title>Edit Transaksi</title>
@endsection
​
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Transaksi</h1>
                    </div>
                    <div class="col-sm-6">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('transaksi.index') }}">Kategori</a></li>
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
                    <div class="col-md-6">
                        @card
                            @slot('title')
                            Edit
                            @endslot

                            @if (session('error'))
                                @alert(['type' => 'danger'])
                                    {!! session('error') !!}
                                @endalert
                            @endif
​
                            <form role="form" action="{{ route('transaksi.update', $transactions->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" cols="5" rows="5" class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}">{{ $transactions->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="code">Code</label>
                                    <input type="text"
                                        name="code"
                                        value="{{ $transactions->code }}"
                                        class="form-control {{ $errors->has('code') ? 'is-invalid':'' }}" id="code" required>
                                </div>

                                <div class="form-group">
                                    <label for="rate_euro">Rate Euro</label>
                                    <input type="text"
                                        name="rate_euro"
                                        value="{{ $transactions->rate_euro }}"
                                        class="form-control {{ $errors->has('rate_euro') ? 'is-invalid':'' }}" id="rate_euro" required>
                                </div>

                                <div class="form-group">
                                    <label for="date_paid">Date Paid</label>
                                    <input type="text"
                                        name="date_paid"
                                        value="{{ $transactions->date_paid }}"
                                        class="form-control {{ $errors->has('date_paid') ? 'is-invalid':'' }}" id="code" required>
                                </div>

                            @slot('footer')
                                <div class="card-footer">
                                    <button class="btn btn-info">Update</button>
                                </div>
                            </form>
                            @endslot
                        @endcard
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
