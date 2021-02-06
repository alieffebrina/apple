
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <div class="user-panel">
        <div class="pull-left image">&nbsp;
          <img src="<?php echo base_url() ?>assets/images/administrator.jpg" class="img-circle" alt="User Image">
        </div>
        <p>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nama');
          $id = $this->session->userdata('tipeuser') ?></p>
          <a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-circle text-success"></i> Online</a>
        </div></p>
      </div>
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview menu-open">
          <li><a href="index2.html"><i class="fa fa-book"></i> <span>Dashboard</span></a></li>
      <li><a href="index2.html"><i class="fa fa-book"></i> <span>Transaksi Penjualan</span></a></li>
      <li><a href="index2.html"><i class="fa fa-book"></i> <span>Transaksi Refund</span></a></li>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i>Produk</a></li>
            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i>Variant</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i>Merk/Brand</a></li>
      <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i>Kategori</a></li>
      <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i>Marketplace</a></li>
      <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i>Jasa Expedisi</a></li>
      <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i>Stock Opname</a></li>
          </ul>
        </li>
    <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Arus Kas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i>Kas Umum</a></li>
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i>Kas Masuk</a></li>
      <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i>Kas Keluar</a></li>
          </ul>
        </li>
    <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i>Penjualan</a></li>
            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i>Kas Keluar</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i>Stock Barang</a></li>
      <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i>Laba Rugi</a></li>
          </ul>
        </li>
    <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>User Pengguna</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i>Input User</a></li>
            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i>Input Level</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i>Hak Akses</a></li>
          </ul>
        </li>
        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Settings</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>