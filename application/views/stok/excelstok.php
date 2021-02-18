<?php 

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1" width="100%">
<thead>
<tr>
	<th colspan="9"> Data Laporan Stok</th>
</tr>
<tr>
  <th>NO</th>
  <th>Tanggal Transaksi</th>
  <th>Kode Transaksi</th>
  <th>Keterangan</th>
  <th>Nama Barang</th>
  <th>Imei Number</th>
  <th>Stok Berubah</th>
  <th>Stok Saat Ini</th>
  <th>User</th>
 </tr>
</thead>
<tbody>
  <?php 
  $no=1;
  foreach ($excel as $key) { ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo date('d-m-Y', strtotime($key->tgl_update)) ?></td>
      <td><?php echo $key->kodetransaksi ?></td>
      <td><?php echo $key->keterangan ?></td>
      <td><?php echo $key->nama_barang.'-'.$key->varian ?></td>
      <td><?php echo $key->part_number ?></td>
      <td><?php echo $key->stokberubah ?></td>
      <td><?php echo $key->stoksisa ?></td>
      <td><?php echo $key->namauser ?></td>
    </tr>
  <?php } ?>
</tbody>
</table>