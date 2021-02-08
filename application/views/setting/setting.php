<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Setting
        <small>Tambah</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Setting</a></li>
        <li class="active">Setting</li>
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
              <h3 class="box-title">Setting</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open("C_Setting/ubah", array('enctype'=>'multipart/form-data', 'class'=>'form-horizontal') ); ?>
            <?php foreach ($setting as $setting) { ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama setting</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_toko" name="nama_toko" value="<?php echo $setting->nama_toko ?>">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $setting->id_setting ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>

                  <div class="col-sm-10">
                    <textarea name="alamat" class="form-control"><?php echo $setting->alamat ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $setting->email ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Website</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="website" name="website" value="<?php echo $setting->website ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Telp</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="telp" name="telp" value="<?php echo $setting->telp ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Mobile Phone</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="hp" name="hp" value="<?php echo $setting->hp ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Instagram</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="instagram" name="instagram" value="<?php echo $setting->instagram ?>">
                  </div>
                </div>

                <!-- <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kode Barang</label>

                  <div class="col-sm-10">
                    <div class="input-group input-group-sm">
                    <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="<?php echo $setting->kode_barang ?>">

                    <span class="input-group-btn">
                      <button type="button" class="btn btn-info btn-flat" id="setkode_barang">Set!</button>
                    </span>
                  </div>
                  </div>
                </div> -->
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kode Penjualan</label>

                  <div class="col-sm-10">
                    <div class="input-group input-group-sm">
                    <input type="text" class="form-control" id="kode_penjualan" name="kode_penjualan" value="<?php echo $setting->kode_penjualan ?>">

                    <span class="input-group-btn">
                      <button type="button" class="btn btn-info btn-flat" id="setkode_penjualan">Set!</button>
                    </span>
                  </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kode Refund</label>

                  <div class="col-sm-10">
                    <div class="input-group input-group-sm">
                    <input type="text" class="form-control" id="kode_refund" name="kode_refund" value="<?php echo $setting->kode_refund ?>">

                    <span class="input-group-btn">
                      <button type="button" class="btn btn-info btn-flat" id="setkode_refund">Set!</button>
                    </span>
                  </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info">Simpan</button>
              </div>
              <!-- /.box-footer -->
            <?php } ?>
            <?php echo form_close();?>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->