<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transaksi Penjualan
        <small>tambah</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Transaksi Penjualan</a></li>
        <li class="active">Tambah Transaksi Penjualan</li>
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
                <?php if($trss != '1'){

                  foreach ($trss as $trss) {
                    $jenistransaksi = $trss->jenistransaksi;
                    $namac = $trss->namac;
                    $email = $trss->emailc;
                    $alamat = $trss->alamatc;
                    $catatan = $trss->alamatc;
                    $tlp = $trss->tlpc;
                    $ekspedisitrss = $trss->id_ekspedisi;
                    $garansi = $trss->garansi;
                  }
                } else {
                  $jenistransaksi = '';
                    $namac = '';
                    $email = '';
                    $alamat = '';
                    $catatan = '';
                    $tlp = '';
                    $ekspedisitrss = '';
                    $garansi = '';
                }?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Jenis Pembayaran</label>
                  <div class="col-sm-9">
                    <select class="js-states form-control" id="js-states" name="jenistransaksi">
                        <option value="">Jenis Pembayaran</option>
                        <option value="tunai" <?php if($jenistransaksi == 'tunai'){ echo "selected";} ?> >Tunai</option>
                        <option value="transfer" <?php if($jenistransaksi == 'transfer'){ echo "selected";} ?> >Transfer</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="namac" name="namac" required value="<?php echo $namac; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Telp</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="telp" name="telp"  value="<?php echo $tlp; ?>" maxlength="12">
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-9"> -->
                    <input type="hidden" class="form-control" id="email" name="email" value=" alamatc" >
                  <!-- </div
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Alamat</label>
                  <div class="col-sm-9">alamatc -->
                    <input type="hidden" class="form-control" id="alamatc" name="alamatc" value=" " >
                 <!--  </div>
                </div> -->
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Catatan </label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="catatan"><?php echo $catatan; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Garansi </label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="garansi" name="garansi" required  value="<?php echo $garansi; ?>" >
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Ekspedisi</label>
                  <div class="col-sm-9">
                    <select class="js-states form-control" id="js-states" name="ekspedisi" required>
                        <option value="">Pilih Varian</option>
                        <?php foreach ($ekspedisi as $ekspedisi) : ?>
                            <option value="<?= $ekspedisi->id_ekspedisi ?>" <?php if($ekspedisitrss == $ekspedisi->id_ekspedisi ){ echo "selected";} ?>><?= $ekspedisi->ekspedisi ?></option>
                        <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-body box-profile">

              <h3 class="profile-username text-center">Data Barang</h3>
              <br>
              <div class="form-horizontal">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Barang</label>
                  <div class="col-sm-9">
                <select class="form-control select2" style="width: 100%;" name="barangjual" id="barangjual">
                        <option value="" selected="selected">Pilih Barang</option>
                        <?php foreach ($barang as $barang) : ?>
                            <option value="<?= $barang->id_barang ?>"><?= $barang->part_number.' - '.$barang->nama_barang.' - '.$barang->varian.' - '.$barang->brand.' - '.$barang->kategori ?></option>
                        <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Imei</label>
                  <div class="col-sm-9">
                    <select class="js-states form-control select2" id="imei" name="imei">
                        <option value="">Pilih Imei</option>
                    </select>
                  </div>
                </div> -->
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Stok Awal</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="stok" name="stok" readonly>
                    <input type="hidden" class="form-control" id="namabarang" name="namabarang" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Qtt</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="qtt" name="qtt" value="1" onkeyup='Calculate()'>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Harga</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="hargajual" name="hargajual">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Diskon</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="diskon" name="diskon" onkeyup='Calculate()'>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Sub Total</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="subtotal" readonly>
                    <input type="hidden" class="form-control" id="subtotalrupiah">
                  </div>
                  <!-- <a class=""> -->
                </div>
              </div>
              <button class="btn btn-primary btn-block"  type="submit" value="simpansementara" name="simpansementara">Tambah</button>
            </div>
          </div>
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
                    <input type="hidden" class="form-control" id="kode_penjualan" name="kode_penjualan" value="<?php echo $kodepenjualan ?>" readonly>
                     <div class="color-palette-set">
                      <div class="bg-light-blue color-palette"><h2 style="text-align: center;"><?php echo $kodepenjualan ?></h2></div>
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
                <?php if ($total>0){ 
                  $no = 1;
                  $tot = 0;
                  foreach ($cek as $cek){ 
                    $subtotal = ($cek->qtt *$cek->harga)-$cek->diskon;
                    $tot = $tot+$subtotal;
                    if($cek->id_imei != 0){
                      $query = $this->db->get_where('tb_imei', ['id_imei' => $cek->id_imei])->result();
                      foreach ($query as $query) {
                        $imei = $query->imei;
                      }
                    } else {
                      $imei = '-';
                    }
                    ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $cek->nama_barang ?></td>
                  <td><?php echo $cek->part_number ?></td>
                  <!-- <td><?php echo $imei ?></td> -->
                  <td><?php echo $cek->qtt ?></td>
                  <td><?php echo 'Rp. '.number_format($cek->harga) ?></td>
                  <td><?php echo 'Rp. '.number_format($cek->diskon) ?></td>
                  <td><?php echo 'Rp. '.number_format($subtotal)  ?></td>
                  <td> <a href="<?php echo site_url('C_Penjualan/hapus/'.$cek->id_detailsementara.'/'.$cek->kode_transaksi); ?>" onclick="return confirm('Yakin Dihapus ?') "><button type="button" class="btn btn-danger" data-placement="bottom" title="Hapus!"><i class="fa fa-fw fa-trash-o"></i></button></a></td>
                </tr>
  
                <?php } } else { 
                  $tot = 0;
                } ?>
                
              </table>
            </div>
            
              <div class="alert alert-warning alert-dismissible">
                <h4 id="totalrp"><i class="icon fa fa-money" ></i> Total : Rp. <?php echo number_format($tot); ?> </h4>
              </div>
              <input type="hidden" class="form-control" id="total" name="total" value="<?php echo $tot ?>">
              <button class="btn btn-success pull-right" type="submit" value="simpantotal" name="simpantotal">Simpan</button>
              <button class="btn btn-primary" type="submit" value="simpanprint" name="simpanprint">Simpan & Print</button>

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