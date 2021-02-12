<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Refund
        <small>Detail</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Refund</a></li>
        <li class="active">Detail Refund</li>
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
              <h3 class="box-title">Detail Refund</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <!-- /.box-header -->
            <?php foreach ($refund as $etransaksi) { ?>

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
                  <td>Garansi</td><td>:</td><td><?php echo date('d-m-Y', strtotime($etransaksi->garansi)) ?></td>
                </tr>
                <tr>
                  <td>Total Pembelian</td><td>:</td><td><?php echo 'Rp. '.number_format($etransaksi->hargatotal) ?></td>
                </tr>
                <tr>
                  <td>Total Refund</td><td>:</td><td><?php echo 'Rp. '.number_format($etransaksi->nominal) ?></td>
                </tr>
                <tr>
                  <td>Jenis Refund</td><td>:</td><td><?php echo $etransaksi->jenisrefund ?></td>
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

              <a href="<?php echo site_url('refund'); ?>"><button class="btn btn-success" type="button" value="cetak" name="cetak">Kembali</button></a>
            </div>
          </div>
        </div>
      </div>

    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->