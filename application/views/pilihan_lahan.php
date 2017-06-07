<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css') ?>">
</head>
<body>

	<h2><strong><p align="center">Data Alternatif Lahan</p></strong></h2>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<a href="<?php echo base_url('index.php/promethee/tambah_lahan')?>"><button class="btn btn-primary bold">Tambah Lahan</button></a>
				<br><br>

				<table class="table table-striped table-bordered">
					<thead class=" danger">
						<th width="30px;">No.</th>
						<th>Kecamatan</th>
						<th>kelurahan</th>
						<th>Luas</th>
						<th>Ketinggian (mdpl)</th>
						<th>Harga</th>
						<th>Suhu (<pre>o</pre>C)</th>
						<th>Akses jalan</th>
					</thead>

					<tbody>

						<?php
						$i=1;
						 foreach($alternatif as $u){ ?>
						<tr>
							<td><?php echo $i++ ?> </td>
							<td><?php echo $u->kecamatan ?></td>
							<td><?php echo $u->desa ?></td>
							<td><?php echo $u->luas ?></td>
							<td><?php echo $u->ketinggian ?></td>
							<td><?php echo $u->harga ?></td>
							<td><?php echo $u->suhu ?></td>
							<td><?php echo $u->akses_jalan ?></td>
						</tr>
						<?php } ?>

					</tbody>
				</table>
			</div>
		</div>
		</br>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<br><br>

				<table class="table table-striped table-bordered">
					<thead class=" danger">
						<th width="30px;">No.</th>
						<th>kriteria</th>
						<th>p</th>
						<th>q</th>
						<th>tipe preferensi</th>
					</thead>

					<tbody>

						<?php
						$i=1;
						 foreach($kriteria as $k){ ?>
						<tr>
							<td><?php echo $i++ ?> </td>
							<td><?php echo $k->kriteria ?></td>
							<td><?php echo $k->p ?></td>
							<td><?php echo $k->q ?></td>
							<td><?php echo $k->tipe_preferensi ?></td>
						</tr>
						<?php } ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>

</body>
</html>