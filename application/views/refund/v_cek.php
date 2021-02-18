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
                            <option value="<?= $transaksi->id_transaksi ?>"><?= $transaksi->kode_transaksi ?></option>
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
      
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data barang</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama barang</th>
                  <th>Varian</th>
                  <th>Imei Number</th>
                  <th>Stok Awal</th>
                  <th>Stok Saat Ini</th>
                  <th>Harga Pokok</th>
                  <th>Harga Jual</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($barang as $barang) { ?>
                    <tr>
                      <td><?php echo $barang->nama_barang ?></td>
                      <td><?php echo $barang->varian.'-'.$barang->brand.'-'.$barang->kategori ?></td>
                      <td><?php echo $barang->part_number ?></td>
                      <td><?php echo $barang->stokawal ?></td>
                      <td><?php echo $barang->stoksisa ?></td>
                      <td><?php echo 'Rp. '.number_format($barang->hargapokok) ?></td>
                      <td><?php echo 'Rp. '.number_format($barang->hargajual) ?></td>
                      <td>
                        <div class="btn-group">

                            <a href="<?php echo site_url('barang-detail/'.$barang->id_barang); ?>"><button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="View!"><i class="fa fa-fw fa-search"></i></button></a>
                            <!-- <a href="<?php echo site_url('imei/'.$barang->id_barang); ?>"><button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="View!"><i class="fa fa-fw fa-recycle"></i></button></a> -->
                          <?php if($aksesedit == 'aktif'){?>
                            <a href="<?php echo site_url('barang-edit/'.$barang->id_barang); ?>"><button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="View Edit!"><i class="fa fa-fw fa-pencil-square-o"></i></button></a>
                          <?php } ?>
                          <?php if($akseshapus == 'aktif'){?>
                            <a href="<?php echo site_url('C_barang/hapus/'.$barang->id_barang); ?>" onclick="return confirm('Yakin Dihapus ?') "><button type="button" class="btn btn-danger" data-placement="bottom" title="Hapus!"><i class="fa fa-fw fa-trash-o"></i></button></a>
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