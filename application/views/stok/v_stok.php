<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Stok
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('stok'); ?>">Laporan Stok</a></li>
        <li class="active">Lihat Data Laporan Stok</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class='col-lg-12'>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Filter</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <form action='<?= site_url("stok")?>' method='POST' class="form-horizontal">
                <div class='row'>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Barang</label>
                    <div class="col-sm-7">
                      <select class="form-control select2" name="barang">
                          <option value="">Pilih Barang</option>
                          <?php foreach ($barang as $barang) : ?>
                              <option value="<?= $barang->id_barang ?>" <?php if($idbarang != ''){ if($idbarang == $barang->id_barang){ echo "selected"; } } ?> ><?= $barang->nama_barang ?></option>
                          <?php endforeach; ?>
                      </select>
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
              <h3 class="box-title">Laporan Detail Stok Barang</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              

              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tanggal Transaksi</th>
                  <th>Kode Transaksi</th>
                  <th>Nama Barang</th>
                  <th>Qtt</th>
                  <th>Stok saat ini</th>
                  <th>Keterangan</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($historystok as $key) { ?>
                    <tr>
                      <td><?php echo date('d-m-Y', strtotime($key->tgl_update)) ?></td>
                      <td><?php echo $key->kodetransaksi ?></td>
                      <td><?php echo $key->nama_barang.'-'.$key->varian ?></td>
                      <td><?php echo $key->stokberubah ?></td>
                      <td><?php echo $key->stoksisa ?></td>
                      <td><?php echo $key->keterangan ?></td>                  
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>