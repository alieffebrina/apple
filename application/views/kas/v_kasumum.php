<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kas Umum
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Kas </a></li>
        <li class="active">Kas Umum</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
          <div class="col-lg-12">
              <?= $this->session->flashdata('message'); ?>
          </div>
      </div>
      <?php if($aksestambah == 'aktif'){ ?>
      <div class="row">
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">

            <div class="box-header with-border">
              <h3 class="box-title">Tambah Kas Umum</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open("C_Kas/tambah", array('enctype'=>'multipart/form-data', 'class'=>'form-horizontal') ); ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jenis Kas</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="jeniskas" name="jeniskas">
                        <option value="">Pilih Jenis Kas</option>
                        <option value="masuk">Kas Masuk</option>                        
                        <option value="keluar">Kas Keluar</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Keterangan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nominal</label>
                  <div class="col-sm-10">

                    <input type="text" class="form-control" id="hargapokok" name="nominal" placeholder="Nominal">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info" name="simpan" value="simpan">Simpan</button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close();?>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
    <?php } ?>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Kas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Keterangan</th>
                  <th>Kode Transaksi</th>
                  <th>Debet</th>
                  <th>Kredit</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $no=1;
                   foreach ($Kas as $Kas) { ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $Kas->keterangan ?></td>
                      <td><?php echo $Kas->kode ?></td>
                      <td><?php if($Kas->jeniskas == "masuk"){ echo 'Rp. '.number_format($Kas->nominal); } else { echo 'Rp. 0'; } ?></td>
                      <td><?php if($Kas->jeniskas == "keluar"){ echo 'Rp. '.number_format($Kas->nominal); } else { echo 'Rp. 0'; } ?></td>
                      <td>
                        <div class="btn-group">
                          <?php if($akseshapus == 'aktif'){?>
                            <a href="<?php echo site_url('C_Kas/hapus/'.$Kas->id_kas); ?>" onclick="return confirm('Yakin Dihapus ?') "><button type="button" class="btn btn-danger" data-placement="bottom" title="Hapus!"><i class="fa fa-fw fa-trash-o"></i></button></a>
                          <?php } ?>
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