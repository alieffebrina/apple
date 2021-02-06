
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
          $id = $this->session->userdata('level') ?></p>
          <a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-circle text-success"></i> Online</a>
        </div></p>
      </div>
      <!-- /.search form -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="active treeview menu-open">
          <li><a href="index2.html"><i class="fa fa-book"></i> <span>Dashboard</span></a></li>
        </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-edit"></i> <span>Master Data</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
          <?php foreach ($masterdata as $masterdata) {
               echo "<li><a href='site_url(".$masterdata->link.")'><i class='fa fa-circle-o'></i><span>".$masterdata->menu."</span></a></li>";
           } ?>
        </ul>
        </li>
        <?php $query = $this->db->query("SELECT * FROM tb_akses where id_menu = '17' and view = '1' and id_level = $id")->num_rows(); 
        if($query != 0){ ?>
          <li><a href="<?php echo site_url('transaksi'); ?> "><i class="fa fa-book"></i> <span>Transaksi Penjualan</span></a></li>
        <?php } ?>
        <?php $query = $this->db->query("SELECT * FROM tb_akses where id_menu = '18' and view = '1' and id_level = $id")->num_rows(); 
        if($query != 0){ ?>
          <li><a href="<?php echo site_url('refund'); ?> "><i class="fa fa-book"></i> <span>Transaksi Refund</span></a></li>
        <?php } ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Arus Kas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <?php foreach ($kas as $kas) { 
               echo "<li><a href='site_url(".$kas->link.")'><i class='fa fa-circle-o'></i><span>".$kas->menu."</span></a></li>";
            } ?>
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
            <?php foreach ($laporan as $laporan) { ?>
               <li><a href="<?php echo site_url($laporan->link); ?> "><i class="fa fa-circle-o"></i> <span><?php echo $laporan->menu ?></span></a></li>
            <?php } ?>
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
            <?php foreach ($user as $user) { ?>
               <li><a href="<?php echo site_url($user->link); ?> "><i class="fa fa-circle-o"></i><span><?php echo $user->menu ?></span></a></li>
            <?php } ?>
          </ul>
        </li>
        
        <?php $query = $this->db->query("SELECT * FROM tb_akses where id_menu = '19' and view = '1' and id_level = $id")->num_rows(); 
        if($query != 0){ ?>
          <li><a href="<?php echo site_url('setting'); ?> "><i class="fa fa-book"></i> <span>Setting</span></a></li>
        <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>