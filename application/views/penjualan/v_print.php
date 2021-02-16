<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Apple Second Stuff</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row --><?php foreach($setting as $setting){ ?>
    <div class="row">
      <div class="col-xs-12" align="center">
          <img src="<?php echo base_url() ?>assets/images/<?php echo $setting->logo ?>" class="img-circle" alt="User Image" width='50px' height='50px'><br>
        <h2 class="page-header" style="text-align: center;">
          <?php echo $setting->nama_toko ?><br>
          <small class="pull-center" style="text-align: center;"><?php echo $setting->alamat ?></small>
          <small class="pull-center" style="text-align: center;"><?php echo $setting->telp.' / '.$setting->hp ?></small>
        </h2>
      </div>
      <?php } ?>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <?php foreach($transaksi as $cek){ 
    $user = $cek->id_user; ?>
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        <table>
          <tr>
            <td> Ref No </td>
            <td> : </td>
            <td> <?php $cek->kode_transaksi ?></td>
          </tr>
          <tr>
            <td> Date </td>
            <td> : </td>
            <td> <?php date('d-m-Y', strtotime($cek->tgl_update)); ?></td>
          </tr>
          <tr>
            <td> Warranty Due </td>
            <td> : </td>
            <td> <?php date('d-m-Y', strtotime($cek->garansi)); ?></td>
          </tr>
        </table>
        <!-- From
        <address>
          <strong>Ref No</strong><br>
          795 Folsom Ave, Suite 600<br>
          San Francisco, CA 94107<br>
          Phone: (804) 123-5432<br>
          Email: info@almasaeedstudio.com
        </address> -->
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        Customer : 
        <address>
          <strong><?php $cek->namac ?></strong><br>
          <!-- 795 Folsom Ave, Suite 600<br>
          San Francisco, CA 94107<br>
          Phone: (555) 539-1037<br>
          Email: john.doe@example.com -->
        </address>
      </div>
      <!-- /.col -->
    </div>
    <?php } ?>
    <br>
    <br>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Product Code / Imei </th>
            <th>Description</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            $total = 0;
            foreach($viewdetail as $key){ 
            $subtotal = ($key->qtt * $key->harga)-$key->diskon; 
            if($key->id_imei != 0){
              $query = $this->db->get_where('tb_imei', ['id_imei' => $key->id_imei])->result();
              foreach ($query as $query) {
                $imei = $query->imei;
              }
            } else {
              $imei = '-';
            }
            $total = $total+ $subtotal;

            ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $key->part_number.' / '.$imei ?></td>
            <td><?php echo $key->nama_barang ?></td>
            <td><?php echo $key->qtt ?></td>
            <td><?php echo 'Rp. '.number_format($key->harga) ?></td>
            <td><?php echo 'Rp. '.number_format($subtotal) ?></td>
          </tr>
          <?php } ?>
          </tbody>
          <thead>
            <tr>
              <th colspan="5">GRAND TOTAL</th>
              <th><?php echo 'Rp. '.number_format($total) ?></th>
            </tr>
          </thead>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
        <p class="lead">Cashier </p>
        <?php $userq = $this->db->get_where('tb_user', ['id_user' => $user])->result();
              foreach ($userq as $userq) { ?>
        <br><br><br>
        <p class="lead"><?php echo $userq->nama ?> </p>
        <?php } ?>
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
        <p class="lead">Customer </p>
        <br><br><br>
        <p class="lead"><?php echo $cek->namac ?> </p>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
