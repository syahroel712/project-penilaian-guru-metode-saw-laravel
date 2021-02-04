@extends('admin.layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Kategori</h4>
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

        <form class="form-horizontal" action="{{ route($url, $category->category_id ?? null) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($category))
            @method('put')
            @endif
            <div class="card-body">
                <h4 class="card-title text-center">Kategori</h4>
                <hr>
                <div class="form-group">
                    <label>Nama kategori</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('category_name') {{ 'is-invalid' }} @enderror" name="category_name" value="{{ old('category_name') ?? $category->category_name ?? '' }}">
                        
                        @error('category_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Slug kategori</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('category_slug') {{ 'is-invalid' }} @enderror" name="category_slug" value="{{ old('category_slug') ?? $category->category_slug ?? '' }}">
                        
                        @error('category_slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Foto banner</label>
                    <div class="input-group">
                        <input type="file" class="form-control @error('category_file') {{ 'is-invalid' }} @enderror" name="category_file" value="{{ old('category_file') ?? '' }}">
                        @error('category_file')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Deskripsi kategori</label>
                    <textarea name="category_desc" id="ckedtor" class="ckeditor @error('category_desc') {{ 'is-invalid' }} @enderror">{{ old('category_desc') ?? $category->category_desc ?? '' }}</textarea>
                    @error('category_desc')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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