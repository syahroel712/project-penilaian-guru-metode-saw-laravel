@extends('admin.layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Region Detail</h4>
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

        <form class="form-horizontal" action="{{ route($url, $region_detail->region_detail_id ?? null) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($region_detail))
            @method('put')
            @endif
            <input type="hidden" name="region_id" value="{{ $region_id ?? $region_detail->region_id }}">
            <div class="card-body">
                <h4 class="card-title text-center">Region Detail</h4>
                <hr>
                <div class="form-group">
                    <label>Judul</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('region_detail_title') {{ 'is-invalid' }} @enderror" name="region_detail_title" value="{{ old('region_detail_title') ?? $region_detail->region_detail_title ?? '' }}">
                        @error('region_detail_title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Slug</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('region_detail_slug') {{ 'is-invalid' }} @enderror" name="region_detail_slug" value="{{ old('region_detail_slug') ?? $region_detail->region_detail_slug ?? '' }}">
                        @error('region_detail_slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Nama Daerah</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('region_detail_name') {{ 'is-invalid' }} @enderror" name="region_detail_name" value="{{ old('region_detail_name') ?? $region_detail->region_detail_name ?? '' }}">
                        @error('region_detail_name')
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