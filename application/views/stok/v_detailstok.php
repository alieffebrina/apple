<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Stok Opname
        <small>barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Stok Opname</a></li>
        <li class="active">Barang</li>
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
              <h3 class="box-title">Barang</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open("C_Stok/barang", array('enctype'=>'multipart/form-data', 'class'=>'form-horizontal') ); ?>

                  <?php foreach ($barang as $barange) { ?>
              <div class="box-body">
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Barang</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="barang" readonly name="barang" value="<?php echo $barange->nama_barang ?>">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $barange->id_barang ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Varian</label>
                  <div class="col-sm-10">
                    <select class="js-states form-control" id="js-states" name="varian" readonly>
                        <option value="">Pilih Varian</option>
                        <?php foreach ($varian as $varian) : ?>
                            <option value="<?= $varian->id_varian ?>" <?php if($barange->id_varian == $varian->id_varian){ echo "selected"; } ?> ><?= $varian->varian.' - '.$varian->brand.' - '.$varian->kategori ?></option>
                        <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Imei Number</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="part" name="part" readonly value="<?php echo $barange->part_number ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Harga Jual</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="hargajual" name="hargajual" readonly value="<?php echo 'Rp. '.number_format($barange->hargajual) ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Harga Pokok</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="hargapokok" name="hargapokok" readonly value="<?php echo 'Rp. '.number_format($barange->hargapokok) ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Stok Awal</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="awal" name="awal" readonly value="<?php echo $barange->stokawal ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Stok Sisa</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="sisa" name="sisa" readonly value="<?php echo $barange->stoksisa ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Stok Saat ini</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="saatini" name="saatini" value="<?php echo $barange->stoksisa ?>">
                  </div>
                </div>
              </div>
            <?php } ?>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo site_url('stok'); ?>"><button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="View!">Kembali</button></a>
                <button type="submit" class="btn btn-info">Simpan</button>
              </div>
              <!-- /.box-footer -->
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