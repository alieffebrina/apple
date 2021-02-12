<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Refund
        <small>Tambah</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Refund</a></li>
        <li class="active">Tambah Refund</li>
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
              <h3 class="box-title">Tambah Refund</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open("refund-cek", array('enctype'=>'multipart/form-data', 'class'=>'form-horizontal') ); ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Pilih Transaksi</label>

                  <div class="col-sm-10">
                    <select class="select2 form-control" style="width: 100%;" name="transaksi" required>
                        <option value="">Pilih Transaksi</option>
                        <?php foreach ($transaksi as $transaksi) : ?>
                            <option value="<?= $transaksi->kode_transaksi ?>" <?php if($idtransaksi != 0){
                              if($transaksi->kode_transaksi == $idtransaksi){ echo "selected"; }
                            }  ?> ><?= $transaksi->kode_transaksi ?></option>
                        <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info">Cari</button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close();?>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
      <?php if($idtransaksi != 0){ ?>
            <?php echo form_open("C_Refund/simpan", array('enctype'=>'multipart/form-data', 'class'=>'form-horizontal') ); ?>
       <div class="box-header with-border">
        <div class="form-group">
            <div class="col-sm-12">
              <input type="hidden" class="form-control" id="koderefund" name="koderefund" value="<?php echo $koderefund ?>" readonly>
               <div class="color-palette-set">
                <div class="bg-light-blue color-palette"><h2 style="text-align: center;"><?php echo $koderefund ?></h2></div>
              </div>
            </div>
          </div>
        </div> 
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Customer</h3>
            </div>
            <!-- /.box-header -->
            <?php foreach ($etransaksi as $etransaksi) { ?>

              <input type="hidden" class="form-control" id="kode_transaksi" name="kode_transaksi" value="<?php echo $etransaksi->kode_transaksi ?>" readonly>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <tbody>
                <tr>
                  <td style="width: 100px">Kode Transaksi</td><td style="width: 10px">:</td><td style="text-align: left;"><?php echo $etransaksi->kode_transaksi ?></td>
                </tr>
                <tr>
                  <td>Nama</td><td>:</td><td><?php echo $etransaksi->namac ?></td>
                </tr>
                <tr>
                  <td>Alamat</td><td>:</td><td><?php echo $etransaksi->alamatc ?></td>
                </tr>                  
                <tr>
                  <td>Telp</td><td>:</td><td><?php echo $etransaksi->tlpc ?></td>
                </tr>
                <tr>
                  <td>Email</td><td>:</td><td><?php echo $etransaksi->emailc ?></td>
                </tr>
                <tr>
                  <td>Catatan</td><td>:</td><td><?php echo $etransaksi->catatanc ?></td>
                </tr>
                <tr>
                  <td>Ekspedisi</td><td>:</td><td><?php echo $etransaksi->ekspedisi ?></td>
                </tr>
                <tr>
                  <td>Garansi</td><td>:</td><td><?php echo date('d-m-Y', strtotime($etransaksi->garansi)) ?></td>
                </tr>
                <tr>
                  <td>Total Pembelian</td><td>:</td><td><?php echo 'Rp. '.number_format($etransaksi->hargatotal) ?></td>

                    <input type="hidden" class="form-control" id="hargatotal" name="hargatotal" value="<?php  echo $etransaksi->hargatotal ?>">
                </tr>
                </tbody>
              </table>
            </div>
          <?php } ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Jenis Refund</h3>
            </div>
            <!-- /.box-header -->
            
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Pilih Jenis Refund</label>

                  <div class="col-sm-10">
                    <select class="select2 form-control" style="width: 100%;" name="jenisrefund" id="jenisrefund" required>
                        <option>Pilih Jenis Refund</option>
                        <option value="uang">Tukar Uang</option>
                        <option value="barang">Tukar Barang</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nominal Refund</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nominalrefund" name="nominalrefund">
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Barang</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama barang</th>
                  <th>Imei</th>
                  <th>Diskon</th>
                  <th>Qtt Beli</th>
                  <th>Harga Beli</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($detail as $detail) { 
                    ?>
                    <tr><input type="hidden" class="form-control" id="no" name="no" value="<?php echo $no++ ?>">
                      <input type="hidden" class="form-control" id="barang" name="barang" value="<?php echo $detail->id_barang ?>">
                      <td><?php echo $detail->nama_barang ?></td>
                      <?php if($detail->id_imei != 0){
                        $query = $this->db->get_where('tb_imei', ['id_imei' => $detail->id_imei])->result();
                        foreach ($query as $query) {
                          $imei = $query->imei;
                        }
                      } else {
                        $imei = '-';
                      } ?>
                      <td><input type="text" class="form-control" id="imei[]" name="imei[]" value="<?php echo $imei ?>"></td>
                      <td><input type="text" class="form-control" id="diskon[]" name="diskon[]" value="<?php echo 'Rp. '.number_format($detail->diskon) ?>" readonly></td>
                      <td><input type="text" class="form-control" id="qtt[]" name="qtt[]" value="<?php echo $detail->qtt ?>" readonly></td>
                      <td><input type="text" class="form-control" id="harga[]" name="harga[]" value="<?php echo 'Rp. '.number_format($detail->harga) ?>" readonly></td>
                    </tr>  
                  <?php } ?>
                </tbody>
              </table>

                <button type="submit" class="btn btn-info">Simpan</button>
            </div>
          </div>
        </div>
      </div>

            <?php echo form_close();?>
    <?php } ?>
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->