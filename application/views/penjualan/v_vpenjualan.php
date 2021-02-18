<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transaksi Penjualan
        <small>detail</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Transaksi Penjualan</a></li>
        <li class="active">Detail Transaksi Penjualan</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
                <div class="col-lg-12">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            </div>
      <div class="row">
        <div class="col-md-6">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">

       <?php echo form_open("C_Penjualan/tambah", array('enctype'=>'multipart/form-data') ); ?>
              <h3 class="profile-username text-center">Data Customer</h3>
              <br>
              <div class="form-horizontal">
                <?php foreach ($cek as $cek) { ?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Jenis Pembayaran</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="namac" name="namac" readonly value="<?php echo $cek->jenistransaksi; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="namac" name="namac" readonly value="<?php echo $cek->namac; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Telp</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="telp" name="telp"  value="<?php echo $cek->tlpc; ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $cek->emailc; ?>" readonly >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Alamat</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="alamatc" readonly ><?php echo $cek->alamatc; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Catatan </label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="catatan" readonly><?php echo $cek->catatanc; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Garansi </label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="garansi" name="garansi" readonly  value="<?php echo $cek->garansi; ?>" >
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Ekspedisi</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="namac" name="namac" readonly value="<?php echo $cek->ekspedisi; ?>">
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-6">
          <div class="nav-tabs-custom box-body box-profile">            
              <h3 class="profile-username text-center">Transaksi Penjualan</h3>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                
                
                <!-- /.post -->

                <!-- Post -->
            <!-- /.box-header -->
            <div class="box">

            <div class="box-header with-border">
              <div class="form-group">
                  <div class="col-sm-12">
                    <input type="hidden" class="form-control" id="kode_penjualan" name="kode_penjualan" value="<?php echo  $cek->kode_transaksi  ?>" readonly>
                     <div class="color-palette-set">
                      <div class="bg-light-blue color-palette"><h2 style="text-align: center;"><?php echo $cek->kode_transaksi ?></h2></div>
                    </div>
                  </div>
                </div>
              </div>

            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Nama Barang</th>
                  <th>Imei</th>
                  <th>Qtt</th>
                  <th>Harga</th>
                  <th>Diskon</th>
                  <th>Subtotal</th>
                  <th style="width: 40px">Label</th>
                </tr>
                <?php 
                  $no = 1;
                  $tot = 0;
                  foreach ($viewdetail as $viewdetail){ 
                    $kodepenjualan = $viewdetail->kode_transaksi;
                    $subtotal = ($viewdetail->qtt *$viewdetail->harga)-$viewdetail->diskon;
                    $tot = $tot+$subtotal;
                    if($viewdetail->id_imei != 0){
                      $query = $this->db->get_where('tb_imei', ['id_imei' => $viewdetail->id_imei])->result();
                      foreach ($query as $query) {
                        $imei = $query->imei;
                      }
                    } else {
                      $imei = '-';
                    }
                    ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $viewdetail->nama_barang ?></td>
                  <td><?php echo $viewdetail->part_number ?></td>
                  <td><?php echo $viewdetail->qtt ?></td>
                  <td><?php echo 'Rp. '.number_format($viewdetail->harga) ?></td>
                  <td><?php echo 'Rp. '.number_format($viewdetail->diskon) ?></td>
                  <td><?php echo 'Rp. '.number_format($subtotal)  ?></td>
                </tr>       
                <?php } ?>         
              </table>
            </div>
            
              <div class="alert alert-warning alert-dismissible">
                <h4 id="totalrp"><i class="icon fa fa-money" ></i> Total : Rp. <?php echo number_format($tot); ?> </h4>
              </div>
              <input type="hidden" class="form-control" id="total" name="total" value="<?php echo $tot ?>">
              <a href="<?php echo site_url('transaksi/cetak/'.$cek->kode_transaksi); ?>"><button class="btn btn-primary pull-right" type="button" value="cetak" name="cetak">Cetak</button></a>
              <a href="<?php echo site_url('transaksi'); ?>"><button class="btn btn-success" type="button" value="cetak" name="cetak">Kembali</button></a>

          <?php } ?>
          </div>
        </form>
                <!-- /.post -->

                <!-- Post -->
                
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>