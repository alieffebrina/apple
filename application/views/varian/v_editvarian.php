<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Varian
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Varian</a></li>
        <li class="active">Edit Varian</li>
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
              <h3 class="box-title">Edit Varian</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open("C_Varian/tambah", array('enctype'=>'multipart/form-data', 'class'=>'form-horizontal') ); ?>
            <?php foreach ($variane as $variane) { ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Varian</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="varian" name="varian" value="<?php echo $variane->varian ?>">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $variane->id_varian ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Brand</label>
                  <div class="col-sm-10">
                    <select class="js-states form-control" id="js-states" name="brand">
                        <option value="">Pilih Brand</option>
                        <?php foreach ($brand as $brand) : ?>
                            <option value="<?= $brand->id_brand ?>" <?php if($variane->id_brand == $brand->id_brand){ echo "selected"; } ?> ><?= $brand->brand ?></option>
                        <?php endforeach; ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>
                  <div class="col-sm-10">
                    <select class="js-states form-control" id="js-states" name="kategori">
                        <option value="">Pilih Kategori</option>
                        <?php foreach ($kategori as $kategori) : ?>
                            <option value="<?= $kategori->id_kategori ?>" <?php if($variane->id_kategori == $kategori->id_kategori){ echo "selected"; } ?>><?= $kategori->kategori ?></option>
                        <?php endforeach; ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Deskripsi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?php echo $variane->deskripsi ?>" >
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
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Varian</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Varian</th>
                  <th>Brand</th>
                  <th>Kategori</th>
                  <th>Deskripsi</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($varian as $varian) { ?>
                    <tr>
                      <td><?php echo $varian->varian ?></td>
                      <td><?php echo $varian->brand ?></td>
                      <td><?php echo $varian->kategori ?></td>
                      <td><?php echo $varian->deskripsi ?></td>
                      <td>
                        <div class="btn-group">
                          <?php if($aksesedit == 'aktif'){?>
                            <a href="<?php echo site_url('varian-edit/'.$varian->id_varian); ?>"><button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="View Edit!"><i class="fa fa-fw fa-pencil-square-o"></i></button></a>
                          <?php } ?>
                          <?php if($akseshapus == 'aktif'){?>
                            <a href="<?php echo site_url('C_Varian/hapus/'.$varian->id_varian); ?>" onclick="return confirm('Yakin Dihapus ?') "><button type="button" class="btn btn-danger" data-placement="bottom" title="Hapus!"><i class="fa fa-fw fa-trash-o"></i></button></a>
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