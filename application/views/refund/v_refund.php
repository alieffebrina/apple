<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transaksi Refund
        <small>data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Transaksi Refund</a></li>
        <li class="active">Data Transaksi Refund</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

            <div class="row">
                <div class="col-lg-12">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Transaksi Refund</h3>
            </div>
          <?php if($aksestambah == 'aktif'){?>
            <div class="box-header">
            <a href="<?php echo site_url('refund-add/0'); ?>"><button type="button" class="btn btn-success" data-placement="bottom" title="Tambah Transaksi!"><i class="fa fa-fw fa-plus"></i></button></a>
            </div>
          <?php } ?>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Kode Refund</th>
                  <th>Kode Transaksi</th>
                  <th>Nama Customer</th>
                  <th>Jenis Refund</th>
                  <th>Total</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($transaksi as $transaksi) { ?>
                    <tr>
                      <td><?php echo $transaksi->kode_refund ?></td>
                      <td><?php echo $transaksi->kode_transaksi ?></td>
                      <td><?php echo $transaksi->namac ?></td>
                      <td><?php echo $transaksi->jenisrefund ?></td>
                      <td><?php echo 'Rp. '.number_format($transaksi->nominal) ?></td>
                      <td>
                        <div class="btn-group">

                            <a href="<?php echo site_url('refund-detail/'.$transaksi->id_refund); ?>"><button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="View!"><i class="fa fa-fw fa-search"></i></button></a>
                            <a href="<?php echo site_url('C_Refund/print/'.$transaksi->id_refund); ?>"><button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="View!"><i class="fa fa-fw fa-print"></i></button></a>
                        </div>
                      </td>
                    </tr>  
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->