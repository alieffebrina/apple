<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Barang
        <small>Tambah</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Barang</a></li>
        <li class="active">Tambah Barang</li>
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
        <div class='col-lg-12'>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Filter</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <form action='<?= site_url("lapbarang")?>' method='POST' class="form-horizontal">
                <div class='row'>
                    <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tanggal</label>
                      <div class="col-sm-7">
                        <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="tanggalan form-control" id="tgl" name="tgl" value="<?php echo date('d-m-Y')?>">
                          </div>
                      </div>
                    </div>
                </div><br>
                <div class='row'>
                  <div class='col-lg-12'>
                    <label for="inputEmail3" class="col-sm-2 control-label"></label>
                    <div class="col-sm-3">
                      <button type="submit" name="btn_submit" class="btn btn-primary">Tampilkan</button>
                      <button type="submit" name="excel" id="btn_print" value="excel" class="btn btn-warning">Cetak Excel</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data barang</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama barang</th>
                  <th>Varian</th>
                  <th>Part Number</th>
                  <th>Stok Awal</th>
                  <th>Stok Saat Ini</th>
                  <th>Harga Pokok</th>
                  <th>Harga Jual</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($barang as $barang) { ?>
                    <tr>
                      <td><?php echo $barang->nama_barang ?></td>
                      <td><?php echo $barang->varian.'-'.$barang->brand.'-'.$barang->kategori ?></td>
                      <td><?php echo $barang->part_number ?></td>
                      <td><?php echo $barang->stokawal ?></td>
                      <td><?php echo $barang->stoksisa ?></td>
                      <td><?php echo 'Rp. '.number_format($barang->hargapokok) ?></td>
                      <td><?php echo 'Rp. '.number_format($barang->hargajual) ?></td>
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