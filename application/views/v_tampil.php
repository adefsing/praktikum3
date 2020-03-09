<!-- ini adalah halaman view atau tampilan tabel user yang ditangkap dari tabel user pada database -->
<!DOCTYPE html>
<html>

<head>
	<title>Membuat CRUD dengan CodeIgniter | MalasNgoding.com</title>
</head>

<body>
	<center>
		<h1>Membuat CRUD dengan CodeIgniter | MalasNgoding.com</h1>
	</center>
	<center><?php echo anchor('crud/tambah', 'Tambah Data'); ?></center>
	<table style="margin:20px auto;" border="1">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Pekerjaan</th>
			<th>Action</th>
		</tr>
		<?php
		$no = 1;
		// ini adalah looping atau perulangan yang menampilkan tabel user sebanyak baris pada tabel
		foreach ($user as $u) {
		?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $u->nama ?></td>
				<td><?php echo $u->alamat ?></td>
				<td><?php echo $u->pekerjaan ?></td>
				<!-- ini adalah baris kode isi tabel yang mengandung link aksi -->
				<td>
					<!-- ini adalah baris kode anchor link atau aksi yabg berfungsi untuk edit dan hapus, dibuat menggunakan helper acnhor -->
					<?php echo anchor('crud/edit/' . $u->id, 'Edit'); ?>
					<?php echo anchor('crud/hapus/' . $u->id, 'Hapus'); ?>
				</td>
			</tr>
		<?php } ?>
	</table>
</body>

</html>