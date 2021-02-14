<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Kas
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_Kas/laporan'); ?>">Laporan Kas</a></li>
        <li class="active">Lihat Data Laporan Kas</li>
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
              <form action='<?= site_url("Kas")?>' method='POST' class="form-horizontal">
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
              <h3 class="box-title">Laporan Detail Kas</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              

              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tanggal Kas</th>
                  <th>Keterangan</th>
                  <th>Kode Transaksi</th>
                  <th>Debet</th>
                  <th>Kredit</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                   foreach ($kas as $Kas) { ?>
                    <tr>
                      <td><?php echo date('d-m-Y', strtotime($Kas->tgl_update)) ?></td>
                      <td><?php echo $Kas->keterangan ?></td>
                      <td><?php echo $Kas->kode ?></td>
                      <td><?php if($Kas->jeniskas == "masuk"){ echo 'Rp. '.number_format($Kas->nominal); } else { echo 'Rp. 0'; } ?></td>
                      <td><?php if($Kas->jeniskas == "keluar"){ echo 'Rp. '.number_format($Kas->nominal); } else { echo 'Rp. 0'; } ?></td>
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