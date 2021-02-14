<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Penjualan
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_penjualan/laporan'); ?>">Laporan Penjualan</a></li>
        <li class="active">Lihat Data Laporan Penjualan</li>
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
              <form action='<?= site_url("penjualan")?>' method='POST' class="form-horizontal">
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
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">User</label>
                    <div class="col-sm-7">
                      <select class="form-control select2" name="user">
                          <option value="">Pilih User</option>
                          <?php foreach ($user as $user) : ?>
                              <option value="<?= $user->id_user ?>"><?= $user->nama ?></option>
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
              <h3 class="box-title">Laporan Detail Penjualan</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              

              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tanggal Transaksi</th>
                  <th>Kode Transaksi</th>
                  <th>Nama Customer</th>
                  <th>Jenis Transaksi</th>
                  <th>Ekspedisi</th>
                  <th>Garansi</th>
                  <th>Total</th>
                  <th>Catatan</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($transaksi as $key) { ?>
                    <tr>
                      <td><?php echo date('d-m-Y', strtotime($key->tgl_update)) ?></td>
                      <td><?php echo $key->kode_transaksi ?></td>
                      <td><?php echo $key->namac ?></td>
                      <td><?php echo $key->jenistransaksi ?></td>
                      <td><?php echo $key->ekspedisi ?></td>
                      <td><?php echo date('d-m-Y', strtotime($key->garansi)) ?></td>
                      <td><?php echo 'Rp. '.number_format($key->hargatotal) ?></td>
                      <td><?php echo $key->catatanc ?></td>                  
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