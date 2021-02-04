@extends('layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Dashboard</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <!-- <li class="breadcrumb-item active" aria-current="page"></li> -->
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('pesan'))
            <p class="alert alert-info">{{ Session::get('pesan') }}</p>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4>Oi</h4>
                        </div>
                    </div>
                    <div class="row">
                        <!-- column -->
                        <div class="col-lg-12">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit voluptate dolorum commodi? Est, asperiores optio facere veniam laborum harum doloribus. Cum iste porro, magni similique rerum est eius animi numquam?</p>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus tempore minus omnis eveniet perferendis molestias facere eum nisi repellat nesciunt laudantium maiores nam cupiditate tenetur dignissimos, quis repudiandae delectus hic.</p>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores unde, voluptate debitis illo reiciendis quisquam possimus! Ipsam quo placeat possimus at incidunt numquam alias dicta sequi quidem est, repellendus atque?</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection