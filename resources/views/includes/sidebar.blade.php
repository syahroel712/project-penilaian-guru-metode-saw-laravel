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
                        <li class="sidebar-item"><a href="{{ route('guru') }}" class="sidebar-link"><i class="mdi mdi-account-card-details"></i><span class="hide-menu"> Guru </span></a></li>
                        <li class="sidebar-item"><a href="{{ route('sekolah') }}" class="sidebar-link"><i class="mdi mdi-school"></i><span class="hide-menu"> Sekolah </span></a></li>
                        <li class="sidebar-item"><a href="{{ route('kriteria') }}" class="sidebar-link"><i class="mdi mdi-arrange-bring-to-front"></i><span class="hide-menu"> Kriteria </span></a></li>
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('kriteria-penilaian') }}" aria-expanded="false"><i class="mdi mdi-account-check"></i><span class="hide-menu">Kriteria Penilaian</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('analisa') }}" aria-expanded="false"><i class="mdi mdi-file-chart"></i><span class="hide-menu">Analisa SAW</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin') }}" aria-expanded="false"><i class="mdi mdi-account-box-outline"></i><span class="hide-menu">Data Admin</span></a></li>
            </ul>
        </nav>
        @else
        @endif
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>