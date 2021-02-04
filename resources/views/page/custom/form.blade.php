@extends('admin.layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Artikel</h4>
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

        <form class="form-horizontal" action="{{ route($url, $custom->custom_id ?? null) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($custom))
            @method('put')
            @endif
            <div class="card-body">
                <h4 class="card-title text-center">Artikel</h4>
                <hr>
                @if(isset($custom))
                <div class="form-group">
                    <label>Nama</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('custom_name') {{ 'is-invalid' }} @enderror" name="custom_name" value="{{ old('custom_name') ?? $custom->custom_name ?? '' }}" readonly>
                        @error('custom_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                @else
                <div class="form-group">
                    <label>Nama</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('custom_name') {{ 'is-invalid' }} @enderror" name="custom_name" value="{{ old('custom_name') ?? $custom->custom_name ?? '' }}" >
                        @error('custom_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                @endif
                <div class="form-group">
                    <label>Judul</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('custom_title') {{ 'is-invalid' }} @enderror" name="custom_title" value="{{ old('custom_title') ?? $custom->custom_title ?? '' }}">
                        @error('custom_title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Isi Artikel</label>
                    <textarea name="custom_desc" id="ckedtor" class="ckeditor @error('custom_desc') {{ 'is-invalid' }} @enderror">{{ old('custom_desc') ?? $custom->custom_desc ?? '' }}</textarea>
                    @error('custom_desc')
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