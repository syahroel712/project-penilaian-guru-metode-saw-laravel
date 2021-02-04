@extends('admin.layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Brands</h4>
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

        <form class="form-horizontal" action="{{ route($url, $brand->brand_id ?? null) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($brand))
            @method('put')
            @endif
            <div class="card-body">
                <h4 class="card-title text-center">Brands</h4>
                <hr>
                <div class="form-group">
                    <label>Nama Brand</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('brand_name') {{ 'is-invalid' }} @enderror" name="brand_name" value="{{ old('brand_name') ?? $brand->brand_name ?? '' }}">
                        @error('brand_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
                <div class="form-group">
                    <label>Logo Brand</label>
                    <div class="input-group">
                        <input type="file" class="form-control @error('brand_file') {{ 'is-invalid' }} @enderror" name="brand_file" value="{{ old('brand_file') ?? '' }}">
                        @error('brand_file')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <div class="input-group">
                        <select name="brand_published" id="brand_published" class="form-control @error('brand_published') {{ 'is-invalid' }} @enderror">
                            <option value="">-Pilih-</option>
                            <option {{ (old('brand_published') == 'Aktif' ? 'selected':'') }} value="Aktif">Publish</option>
                            <option {{ (old('brand_published') == 'Nonaktif' ? 'selected':'') }} value="Nonaktif">Hide</option>
                        </select>
                        @if(isset($brand))
                        <script>
                            document.getElementById('brand_published').value = '<?php echo $brand->brand_published ?>'
                        </script>
                        @endif
                        @error('brand_published')
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