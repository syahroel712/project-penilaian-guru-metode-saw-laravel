@extends('admin.layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Produk Foto</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
                        <!-- <li class="breadcrumb-item active" aria-current="page"></li> -->
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="card">

        <form class="form-horizontal" action="{{ route($url, $product_photo->product_photo_id ?? null) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($product_photo))
            @method('put')
            @endif
            <input type="hidden" name="product_id" value="{{ $product_id ?? $product_photo->product_id }}">
            <div class="card-body">
                <h4 class="card-title text-center">Produk Foto</h4>
                <hr>
                <div class="form-group">
                    <label>Nama Foto</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('product_photo_name') {{ 'is-invalid' }} @enderror" name="product_photo_name" value="{{ old('product_photo_name') ?? $product_photo->product_photo_name ?? '' }}">
                        @error('product_photo_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <div class="input-group">
                        <input type="file" class="form-control @error('product_photo_file') {{ 'is-invalid' }} @enderror" name="product_photo_file" value="{{ old('product_photo_file') ?? '' }}">
                        @error('product_photo_file')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="border-top">
                <div class="card-body">
                    <button type="submit" class="btn btn-info">Save</button>
                    <button class="btn btn-warning" type="button" onclick="window.history.back()">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection