@extends('admin.layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Produk</h4>
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

        <form class="form-horizontal" action="{{ route($url, $product->product_id ?? null) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @if(isset($product))
            @method('put')
            @endif
            <div class="card-body">
                <h4 class="card-title text-center">Produk</h4>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kode Produk</label>
                            <div class="input-group">
                                <input type="text"
                                    class="form-control @error('product_kode') {{ 'is-invalid' }} @enderror"
                                    name="product_kode"
                                    value="{{ old('product_kode') ?? $product->product_kode ?? '' }}">
                                @error('product_kode')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Produk</label>
                            <div class="input-group">
                                <input type="text"
                                    class="form-control @error('product_name') {{ 'is-invalid' }} @enderror"
                                    name="product_name"
                                    value="{{ old('product_name') ?? $product->product_name ?? '' }}">
                                @error('product_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kategori Produk</label>
                            <div class="input-group">
                                <select name="category_id" id="category_id"
                                    class="form-control @error('category_id') {{ 'is-invalid' }} @enderror">
                                    <option value="">-Pilih-</option>
                                    @foreach($categories as $no => $category)
                                        <option {{ (old('category_id') == 'Top Seller' ? 'selected':'') }} value="{{ $category->category_id }}">
                                        {{ $category->category_name }}</option>
                                    @endforeach 
                                </select>
                                @if(isset($product))
                                <script>
                                    document.getElementById('category_id').value =
                                        '<?php echo $product->category_id ?>'
                                </script>
                                @endif
                                @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Brand Produk</label>
                            <div class="input-group">
                                <select name="brand_id" id="brand_id"
                                    class="form-control @error('brand_id') {{ 'is-invalid' }} @enderror">
                                    <option value="">-Pilih-</option>
                                    @foreach($brands as $no => $brand)
                                        <option {{ (old('brand_id') == 'Top Seller' ? 'selected':'') }} value="{{ $brand->brand_id }}">
                                        {{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                                @if(isset($product))
                                <script>
                                    document.getElementById('brand_id').value =
                                        '<?php echo $product->brand_id ?>'
                                </script>
                                @endif
                                @error('brand_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Harga Produk</label>
                            <div class="input-group">
                                <input type="text"
                                    class="form-control @error('product_price') {{ 'is-invalid' }} @enderror"
                                    name="product_price"
                                    value="{{ old('product_price') ?? $product->product_price ?? '' }}">
                                @error('product_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tampilkan Harga Produk</label>
                            <div class="input-group">
                                <select name="product_price_show" id="product_price_show"
                                    class="form-control @error('product_price_show') {{ 'is-invalid' }} @enderror">
                                    <option value="">-Pilih-</option>
                                    <option {{ (old('product_price_show') == 'Aktif' ? 'selected':'') }} value="Aktif">
                                        Ya</option>
                                    <option {{ (old('product_price_show') == 'Nonaktif' ? 'selected':'') }}
                                        value="Nonaktif">Tidak</option>
                                </select>
                                @if(isset($product))
                                <script>
                                    document.getElementById('product_price_show').value =
                                        '<?php echo $product->product_price_show ?>'
                                </script>
                                @endif
                                @error('product_price_show')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Stok Produk</label>
                            <div class="input-group">
                                <input type="text"
                                    class="form-control @error('product_stock') {{ 'is-invalid' }} @enderror"
                                    name="product_stock"
                                    value="{{ old('product_stock') ?? $product->product_stock ?? '' }}">
                                @error('product_stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tipe Produk</label>
                            <div class="input-group">
                                <select name="product_type" id="product_type"
                                    class="form-control @error('product_type') {{ 'is-invalid' }} @enderror">
                                    <option value="">-Pilih-</option>
                                    <option {{ (old('product_type') == 'Pemula' ? 'selected':'') }} value="Pemula">
                                        Pemula</option>
                                    <option {{ (old('product_type') == 'Terlaris' ? 'selected':'') }}
                                        value="Terlaris">Terlaris</option>
                                </select>
                                @if(isset($product))
                                <script>
                                    document.getElementById('product_type').value =
                                        '<?php echo $product->product_type ?>'
                                </script>
                                @endif
                                @error('product_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Produk Terjual</label>
                            <div class="input-group">
                                <input type="number"
                                    class="form-control @error('product_sold') {{ 'is-invalid' }} @enderror"
                                    name="product_sold"
                                    value="{{ old('product_sold') ?? $product->product_sold ?? '' }}">
                                @error('product_sold')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kondisi Produk</label>
                            <div class="input-group">
                                <select name="product_condition" id="product_condition"
                                    class="form-control @error('product_condition') {{ 'is-invalid' }} @enderror">
                                    <option value="">-Pilih-</option>
                                    <option {{ (old('product_condition') == 'Baru' ? 'selected':'') }} value="Baru">
                                        Baru</option>
                                    <option {{ (old('product_condition') == 'Rekondisi' ? 'selected':'') }}
                                        value="Rekondisi">Rekondisi Import</option>
                                </select>
                                @if(isset($product))
                                <script>
                                    document.getElementById('product_condition').value =
                                        '<?php echo $product->product_condition ?>'
                                </script>
                                @endif
                                @error('product_condition')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Foto Produk</label>
                            <div class="input-group">
                                <input type="file" class="form-control @error('product_file') {{ 'is-invalid' }} @enderror" name="product_file" value="{{ old('product_file') ?? '' }}">
                                @error('product_file')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tampilkan Produk</label>
                            <div class="input-group">
                                <select name="product_status" id="product_status"
                                    class="form-control @error('product_status') {{ 'is-invalid' }} @enderror">
                                    <option value="">-Pilih-</option>
                                    <option {{ (old('product_status') == 'Aktif' ? 'selected':'') }} value="Aktif">
                                        Ya</option>
                                    <option {{ (old('product_status') == 'Nonaktif' ? 'selected':'') }}
                                        value="Nonaktif">Tidak</option>
                                </select>
                                @if(isset($product))
                                <script>
                                    document.getElementById('product_status').value =
                                        '<?php echo $product->product_status ?>'
                                </script>
                                @endif
                                @error('product_status')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Deskripsi Produk</label>
                                <textarea name="product_desc" id="ckedtor"
                                    class="ckeditor @error('product_desc') {{ 'is-invalid' }} @enderror" style="width: 100%">{{ old('product_desc') ?? $product->product_desc ?? '' }}</textarea>
                                @error('product_desc')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group" style="width : 100%">
                            <label>Spesifikasi Produk</label>
                                <textarea name="product_spec" id="ckedtor"
                                    class="ckeditor @error('product_spec') {{ 'is-invalid' }} @enderror">{{ old('product_spec') ?? $product->product_spec ?? '' }}</textarea>
                                @error('product_spec')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group" style="width : 100%">
                            <label>Download Driver Produk</label>
                                <textarea name="product_download" id="ckedtor"
                                    class="ckeditor @error('product_download') {{ 'is-invalid' }} @enderror">{{ old('product_download') ?? $product->product_download ?? '' }}</textarea>
                                @error('product_download')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
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
