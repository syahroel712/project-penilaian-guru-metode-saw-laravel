@extends('admin.layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Promo</h4>
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

        <form class="form-horizontal" action="{{ route($url, $promo->promo_id ?? null) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($promo))
            @method('put')
            @endif
            <div class="card-body">
                <h4 class="card-title text-center">Promo</h4>
                <hr>
                <div class="form-group">
                    <label>Judul</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('promo_title') {{ 'is-invalid' }} @enderror" name="promo_title" value="{{ old('promo_title') ?? $promo->promo_title ?? '' }}">
                        @error('promo_title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Produk</label>
                    <div class="input-group">
                        <select name="product_id" id="product_id"
                            class="form-control @error('product_id') {{ 'is-invalid' }} @enderror select2">
                            <option value="">-Pilih-</option>
                            @foreach($products as $no => $product)
                                <option {{ (old('product_id') == '$product->product_id' ? 'selected':'') }} value="{{ $product->product_id }}">
                                {{ $product->product_name }}</option>
                            @endforeach 
                        </select>
                        @if(isset($promo))
                        <script>
                            document.getElementById('product_id').value =
                                '<?php echo $promo->product_id ?>'
                        </script>
                        @endif
                        @error('product_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <div class="input-group">
                        <input type="file" class="form-control @error('promo_file') {{ 'is-invalid' }} @enderror" name="promo_file" value="{{ old('promo_file') ?? '' }}">
                        @error('promo_file')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <div class="input-group">
                        <select name="promo_published" id="promo_published" class="form-control @error('promo_published') {{ 'is-invalid' }} @enderror">
                            <option value="">-Pilih-</option>
                            <option {{ (old('promo_published') == 'Aktif' ? 'selected':'') }} value="Aktif">Aktif</option>
                            <option {{ (old('promo_published') == 'Nonaktif' ? 'selected':'') }} value="Nonaktif">Nonaktif</option>
                        </select>
                        @if(isset($promo))
                        <script>
                            document.getElementById('promo_published').value = '<?php echo $promo->promo_published ?>'
                        </script>
                        @endif
                        @error('promo_published')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="promo_desc" id="ckedtor" class="ckeditor @error('promo_desc') {{ 'is-invalid' }} @enderror">{{ old('promo_desc') ?? $promo->promo_desc ?? '' }}</textarea>
                    @error('promo_desc')
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