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
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Logo</label>

                  <div class="col-sm-10">
                    <img src="<?php echo base_url() ?>assets/images/<?php echo $setting->logo ?>" alt="User Image" width="180px" height="230px">
                    <input type="file" class="demoInputBox" id="foto" name="logo" onchange="ValidateSize(this)" >
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
                      <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modalkodepenjualan">Set!</button>
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
                      <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modalkoderefund">Set!</button>
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

  <div class="modal fade" id="modalkodepenjualan">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Kode Penjualan</h4>
      </div>
      <div class="modal-body">
              <div class="form-horizontal">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Format 1</label>
                  <div class="col-sm-9">
                  <div class="input-group">
                    <div class="input-group-btn">
                      <select class="form-control select2" id="kodeformat1" name="format1" class="btn btn-warning dropdown-toggle" onchange="embuh()">
                      <option value=''>Pilih</option>
                        <option value='huruf'>Huruf</option>
                        <option value='tanggal'>Tanggal</option>
                        <option value='no'>No Urut</option>
                      </select>

                    <input type="text" class="form-control" id="texthuruf1" name="texthuruf" style="visibility:hidden">
                    </div>
                    <!-- /btn-group -->
                  </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Format 2</label>
                  <div class="col-sm-9">
                  <div class="input-group">
                    <div class="input-group-btn">
                      <select class="form-control select2" id="format2" name="kota" class="btn btn-warning dropdown-toggle" onchange="embuhb()">
                      <option value=''>Pilih</option>
                        <option value='huruf'>Huruf</option>
                        <option value='tanggal'>Tanggal</option>
                        <option value='no'>No Urut</option>
                      </select>

                    <input type="text" class="form-control" id="texthuruf2" name="texthuruf" style="visibility:hidden">
                    </div>
                    <!-- /btn-group -->
                  </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Format 3</label>
                  <div class="col-sm-9">
                  <div class="input-group">
                    <div class="input-group-btn">
                      <select class="form-control select2" id="format3" name="kota" class="btn btn-warning dropdown-toggle"  onchange="embuhc()">
                      <option value=''>Pilih</option>
                        <option value='huruf'>Huruf</option>
                        <option value='tanggal'>Tanggal</option>
                        <option value='no'>No Urut</option>
                      </select>

                    <input type="text" class="form-control" id="texthuruf3" name="texthuruf" style="visibility:hidden">
                    </div>
                    <!-- /btn-group -->
                  </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Penghubung</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="penghubung" name="penghubung" style="width: 100%;" onchange="embuhhub()">
                      <option value=''>Pilih</option>
                      <option value='-'>-</option>
                      <option value='.'>.</option>
                      <option value=''>Tanpa Penghubung</option>
                    </select>

                    <input type="hidden" class="form-control" id="a" name="a" style="visibility:hidden" >
                  </div>
                </div> 
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kode Final</label>
                  <div class="col-sm-9">
                    <div id ="kodefinal"></div>
                    <input type="text" class="form-control" id="final" name="final" >
                    <br>
                  </div>
                </div>
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnsimpantipeuser">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

 <div class="modal fade" id="modalkoderefund">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Kode Penjualan</h4>
      </div>
      <div class="modal-body">
              <div class="form-horizontal">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Format 1</label>
                  <div class="col-sm-9">
                  <div class="input-group">
                    <div class="input-group-btn">
                      <select class="form-control select2" id="koderefund1" name="koderefund1" class="btn btn-warning dropdown-toggle" onchange="refunda()">
                      <option value=''>Pilih</option>
                        <option value='huruf'>Huruf</option>
                        <option value='tanggal'>Tanggal</option>
                        <option value='no'>No Urut</option>
                      </select>

                    <input type="text" class="form-control" id="textrefund1" name="textrefund1" style="visibility:hidden">
                    </div>
                    <!-- /btn-group -->
                  </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Format 2</label>
                  <div class="col-sm-9">
                  <div class="input-group">
                    <div class="input-group-btn">
                      <select class="form-control select2" id="koderefund2" name="koderefund2" class="btn btn-warning dropdown-toggle" onchange="refundb()">
                      <option value=''>Pilih</option>
                        <option value='huruf'>Huruf</option>
                        <option value='tanggal'>Tanggal</option>
                        <option value='no'>No Urut</option>
                      </select>

                    <input type="text" class="form-control" id="textrefund2" name="textrefund2" style="visibility:hidden">
                    </div>
                    <!-- /btn-group -->
                  </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Format 3</label>
                  <div class="col-sm-9">
                  <div class="input-group">
                    <div class="input-group-btn">
                      <select class="form-control select2" id="koderefund3" name="koderefund3" class="btn btn-warning dropdown-toggle"  onchange="refundc()">
                      <option value=''>Pilih</option>
                        <option value='huruf'>Huruf</option>
                        <option value='tanggal'>Tanggal</option>
                        <option value='no'>No Urut</option>
                      </select>

                    <input type="text" class="form-control" id="textrefund3" name="textrefund3" style="visibility:hidden">
                    </div>
                    <!-- /btn-group -->
                  </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Penghubung</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="hubunganrefund" name="hubunganrefund" style="width: 100%;" onchange="hubrefund()">
                      <option value=''>Pilih</option>
                      <option value='-'>-</option>
                      <option value='.'>.</option>
                      <option value=''>Tanpa Penghubung</option>
                    </select>

                    <input type="hidden" class="form-control" id="a" name="a" style="visibility:hidden" >
                  </div>
                </div> 
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kode Final</label>
                  <div class="col-sm-9">
                    <div id ="kodefinal"></div>
                    <input type="text" class="form-control" id="refundfin" name="refundfin" >
                    <br>
                  </div>
                </div>
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnsimpanrefund">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
