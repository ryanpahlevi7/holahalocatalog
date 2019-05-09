<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('dist/img/man.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU UTAMA</li>
        <li class="@yield('active_dashboard')">
          <a href="/home">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
          <li class="@yield('active_kategori')">
          <a href="/admin/kategori">
            <i class="fa fa-user"></i> <span>Kategori</span>
          </a>
        </li>
        <li class="@yield('active_produk')">
          <a href="/admin/produk">
            <i class="fa fa-users "></i> <span>Produk</span>
          </a>
        </li>
        <li class="@yield('active_lihat_produk')">
          <a href="/admin/lihat_produk">
            <i class="fa fa-table "></i> <span>Lihat Produk</span>
          </a>
        </li>
    </section>
    <!-- /.sidebar -->
  </aside>