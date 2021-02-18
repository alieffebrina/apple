<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Barang
        <small>Imei</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Barang</a></li>
        <li class="active">Imei</li>
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
              <h3 class="box-title">Imei</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="form-horizontal">
              <div class="box-body">
                <?php foreach ($barang as $barang) { ?>
                   <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Barang</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" readonly value="<?php echo $barang->nama_barang ?>">
                    <input type="hidden" class="form-control" name="idbarang" readonly value="<?php echo $barang->id_barang ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Varian</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" readonly value="<?php echo $barang->varian ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Imei Number</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" readonly value="<?php echo $barang->part_number ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Stok Awal</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" readonly value="<?php echo $barang->stokawal ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Stok Sisa</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" readonly value="<?php echo $barang->stoksisa ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Harga Pokok</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" readonly value="<?php echo 'Rp. '.number_format($barang->hargapokok) ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Harga Jual</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" readonly value="<?php echo 'Rp. '.number_format($barang->hargajual) ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Laba</label>
                  <?php $laba = $barang->hargajual-$barang->hargapokok; ?>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" readonly value="<?php echo 'Rp. '.number_format($laba) ?>">
                  </div>
                </div>
                <?php } ?>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo site_url('barang'); ?>"><button type="button" class="btn btn-default">Kembali</button></a>
              </div>
              <!-- /.box-footer -->
          </div>
        </diV>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
      <!-- <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Imei</h3>
            </div>
            /.box-header -->
            <!-- <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Imei</th>
                  <th>Stok</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($imei as $imei) { ?>
                    <tr>
                      <td><?php echo $imei->imei ?></td>
                      <td><?php echo $imei->stok ?></td>
                    </tr>  
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div> -->
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->