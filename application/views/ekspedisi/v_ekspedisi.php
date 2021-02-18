<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ekspedisi
        <small>Tambah</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Ekspedisi</a></li>
        <li class="active">Tambah Ekspedisi</li>
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
              <h3 class="box-title">Tambah Ekspedisi</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open("C_Ekspedisi/tambah", array('enctype'=>'multipart/form-data', 'class'=>'form-horizontal') ); ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Ekspedisi</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="ekspedisi" name="ekspedisi" placeholder="Nama Ekspedisi">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info">Tambah</button>
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
              <h3 class="box-title">Data ekspedisi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Ekspedisi</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($ekspedisi as $ekspedisi) { ?>
                    <tr>
                      <td><?php echo $ekspedisi->ekspedisi ?></td>
                      <td>
                        <div class="btn-group">
                          <?php if($aksesedit == 'aktif'){?>
                            <a href="<?php echo site_url('ekspedisi-edit/'.$ekspedisi->id_ekspedisi); ?>"><button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="View Edit!"><i class="fa fa-fw fa-pencil-square-o"></i></button></a>
                          <?php } ?>
                          <?php if($akseshapus == 'aktif'){?>
                            <a href="<?php echo site_url('C_Ekspedisi/hapus/'.$ekspedisi->id_ekspedisi); ?>" onclick="return confirm('Yakin Dihapus ?') "><button type="button" class="btn btn-danger" data-placement="bottom" title="Hapus!"><i class="fa fa-fw fa-trash-o"></i></button></a>
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