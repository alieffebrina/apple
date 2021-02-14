<?php 

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1" width="100%">
<thead>
<tr>
	<th colspan="8"> Data Laporan Penjualan</th>
</tr>
<tr>
  <th>NO</th>
  <th>Tanggal Transaksi</th>
  <th>Kode Transaksi</th>
  <th>Nama Customer</th>
  <th>Jenis Transaksi</th>
  <th>Ekspedisi</th>
  <th>Garansi</th>
  <th>Total</th>
 </tr>
</thead>
<tbody>
  <?php 
  $no=1;
  foreach ($excel as $key) { ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo date('d-m-Y', strtotime($key->tgl_update)) ?></td>
      <td><?php echo $key->kode_transaksi ?></td>
      <td><?php echo $key->namac ?></td>
      <td><?php echo $key->jenistransaksi ?></td>
      <td><?php echo $key->ekspedisi ?></td>
      <td><?php echo date('d-m-Y', strtotime($key->garansi)) ?></td>
      <td><?php echo 'Rp. '.number_format($key->hargatotal) ?></td>
    </tr>
  <?php } ?>
</tbody>
</table>