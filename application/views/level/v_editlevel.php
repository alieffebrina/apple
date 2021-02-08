<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Level
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Level</a></li>
        <li class="active">Edit Level</li>
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
              <h3 class="box-title">Edit Level</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open("C_Level/ubah", array('enctype'=>'multipart/form-data', 'class'=>'form-horizontal') ); ?>

                  <?php foreach ($levele as $levele) { ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Level</label>

                  <div class="col-sm-10">
                      <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $levele->id_level ?>">
                      <input type="text" class="form-control" id="level" name="level" value="<?php echo $levele->level ?>">
                  </div>
                </div>
              </div>
            <?php } ?>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="reset" class="btn btn-default">Cancel</button>
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
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Level</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Level</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($level as $level) { ?>
                    <tr>
                      <td><?php echo $level->level ?></td>
                      <td>
                        <div class="btn-group">
                          <?php if($aksesedit == 'aktif'){?>
                            <a href="<?php echo site_url('level-edit/'.$level->id_level); ?>"><button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="View Edit!"><i class="fa fa-fw fa-pencil-square-o"></i></button></a>
                          <?php } ?>
                          <?php if($akseshapus == 'aktif'){?>
                            <a href="<?php echo site_url('C_Level/hapus/'.$level->id_level); ?>" onclick="return confirm('Yakin Dihapus ?') "><button type="button" class="btn btn-danger" data-placement="bottom" title="Hapus!"><i class="fa fa-fw fa-trash-o"></i></button></a>
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