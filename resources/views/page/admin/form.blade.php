@extends('layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Admin</h4>
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

        <form class="form-horizontal" action="{{ route($url, $admin->admin_id ?? null) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($admin))
            @method('put')
            @endif
            <div class="card-body">
                <h4 class="card-title text-center">Admin</h4>
                <hr>
                <div class="form-group">
                    <label>Nama</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('admin_name') {{ 'is-invalid' }} @enderror" name="admin_name" value="{{ old('admin_name') ?? $admin->admin_name ?? '' }}">
                        
                        @error('admin_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>No Telpon</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('admin_notelp') {{ 'is-invalid' }} @enderror" name="admin_notelp" value="{{ old('admin_notelp') ?? $admin->admin_notelp ?? '' }}">
                        
                        @error('admin_notelp')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control @error('admin_email') {{ 'is-invalid' }} @enderror" name="admin_email" value="{{ old('admin_email') ?? $admin->admin_email ?? '' }}">
                        
                        @error('admin_email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control @error('admin_password') {{ 'is-invalid' }} @enderror" name="admin_password" value="{{ old('admin_password') ?? '' }}">
                        @error('admin_password')
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