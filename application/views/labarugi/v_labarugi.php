<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laba Rugi
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Laporan</a></li>
        <li class="active">Laba Rugi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

            <div class="row">
                <div class="col-lg-12">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            </div>
      <div class="row">
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">

            <div class="box-header with-border">
              <h3 class="box-title">Laporan Laba Rugi </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open("C_Labarugi/pdf", array('enctype'=>'multipart/form-data', 'class'=>'form-horizontal') ); ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Pendapatan</label>

                  <div class="col-sm-10">
                    <?php
                    $masuk = 0;
                    foreach ($kasmasuk as $kasmasuk) {
                       $masuk = $masuk + $kasmasuk->nominal;
                     } ?>
                    <input type="text" class="form-control" id="brand" name="brand" readonly value="<?php echo 'Rp. '.number_format($masuk) ?>">
                  </div>
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kas Keluar</label>

                  <div class="col-sm-10">
                    <?php
                    $keluar = 0;
                    foreach ($kaskeluar as $kaskeluar) {
                       $keluar = $keluar + $kaskeluar->nominal;
                     } ?>
                    <input type="text" class="form-control" id="brand" name="brand" readonly value="<?php echo 'Rp. '.number_format($keluar) ?>">
                  </div>
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Laba/Rugi</label>

                  <div class="col-sm-10">
                    <?php $saldo = $masuk-$keluar;
                    if($keluar > $masuk){
                      $total = 'Rugi Rp. '.number_format($saldo);
                    } else {

                      $total = 'Laba Rp. '.number_format($saldo);
                    }
                    ?>
                    <input type="text" class="form-control" id="brand" name="brand" readonly value="<?php echo $total ?>">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info">Cetak</button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close();?>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>

    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->