<?php 

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1" width="100%">
<thead>
<tr>
	<th colspan="6"> Data Laporan Kas</th>
</tr>
<tr>
  <th>NO</th>
  <th>Tanggal Kas</th>
  <th>Keterangan</th>
  <th>Kode Transaksi</th>
  <th>Debet</th>
  <th>Kredit</th>
 </tr>
</thead>
<tbody>
  <?php 
  $no=1;
   foreach ($excel as $Kas) { ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo date('d-m-Y', strtotime($Kas->tgl_update)) ?></td>
      <td><?php echo $Kas->keterangan ?></td>
      <td><?php echo $Kas->kode ?></td>
      <td><?php if($Kas->jeniskas == "masuk"){ echo 'Rp. '.number_format($Kas->nominal); } else { echo 'Rp. 0'; } ?></td>
      <td><?php if($Kas->jeniskas == "keluar"){ echo 'Rp. '.number_format($Kas->nominal); } else { echo 'Rp. 0'; } ?></td>
    </tr>  
  <?php } ?>
</tbody>
</table>