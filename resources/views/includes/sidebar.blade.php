<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        @if( Session::get('admin_level') == 'admin')
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-dropbox"></i><span class="hide-menu">Master Data </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ route('brands') }}" class="sidebar-link"><i class="mdi mdi-shopping"></i><span class="hide-menu"> Brands </span></a></li>
                        <li class="sidebar-item"><a href="{{ route('categories') }}" class="sidebar-link"><i class="mdi mdi-arrange-bring-to-front"></i><span class="hide-menu"> Kategori </span></a></li>
                        <li class="sidebar-item"><a href="{{ route('regions') }}" class="sidebar-link"><i class="mdi mdi-map-marker"></i><span class="hide-menu"> Regions </span></a></li>
                        <li class="sidebar-item"><a href="{{ route('sliders') }}" class="sidebar-link"><i class="mdi mdi-file-image"></i><span class="hide-menu"> Sliders </span></a></li>
                        <li class="sidebar-item"><a href="{{ route('promos') }}" class="sidebar-link"><i class="mdi mdi-ticket-percent"></i><span class="hide-menu"> Promo </span></a></li>
                        <li class="sidebar-item"><a href="{{ route('customs') }}" class="sidebar-link"><i class="mdi mdi-settings"></i><span class="hide-menu"> Customs </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('products') }}" aria-expanded="false"><i class="mdi mdi-archive"></i><span class="hide-menu">Produk</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('spareparts') }}" aria-expanded="false"><i class="mdi mdi-zip-box"></i><span class="hide-menu">Sparepart</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('blogs') }}" aria-expanded="false"><i class="mdi mdi-blogger"></i><span class="hide-menu">Blog</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('mitra') }}" aria-expanded="false"><i class="mdi mdi-certificate"></i><span class="hide-menu">Mitra Kerja</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('testimonials') }}" aria-expanded="false"><i class="mdi mdi-library"></i><span class="hide-menu">Testimoni Pelanggan</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('legalitas') }}" aria-expanded="false"><i class="mdi mdi-trophy-award"></i><span class="hide-menu">Legalitas Import</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin') }}" aria-expanded="false"><i class="mdi mdi-account-box-outline"></i><span class="hide-menu">Data Admin</span></a></li>
            </ul>
        </nav>
        @else
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-dropbox"></i><span class="hide-menu">Master Data </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ route('brands') }}" class="sidebar-link"><i class="mdi mdi-shopping"></i><span class="hide-menu"> Brands </span></a></li>
                        <li class="sidebar-item"><a href="{{ route('categories') }}" class="sidebar-link"><i class="mdi mdi-arrange-bring-to-front"></i><span class="hide-menu"> Kategori </span></a></li>
                        <li class="sidebar-item"><a href="{{ route('regions') }}" class="sidebar-link"><i class="mdi mdi-map-marker"></i><span class="hide-menu"> Regions </span></a></li>
                        <li class="sidebar-item"><a href="{{ route('sliders') }}" class="sidebar-link"><i class="mdi mdi-file-image"></i><span class="hide-menu"> Sliders </span></a></li>
                        <li class="sidebar-item"><a href="{{ route('promos') }}" class="sidebar-link"><i class="mdi mdi-ticket-percent"></i><span class="hide-menu"> Promo </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('products') }}" aria-expanded="false"><i class="mdi mdi-archive"></i><span class="hide-menu">Produk</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('spareparts') }}" aria-expanded="false"><i class="mdi mdi-zip-box"></i><span class="hide-menu">Sparepart</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('blogs') }}" aria-expanded="false"><i class="mdi mdi-blogger"></i><span class="hide-menu">Blog</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('mitra') }}" aria-expanded="false"><i class="mdi mdi-certificate"></i><span class="hide-menu">Mitra Kerja</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('testimonials') }}" aria-expanded="false"><i class="mdi mdi-library"></i><span class="hide-menu">Testimoni Pelanggan</span></a></li>
            </ul>
        </nav>
        @endif
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>