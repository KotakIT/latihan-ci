		<a href="mahasiswa/tambah" class="btn btn-primary mb-4">Tambah</a>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>NIM</th>
					<th>Nama Lengkap</th>
					<th>Kota</th>
					<th>TTL</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($query->result() as $row)
				{?>
					<tr>
						<td><?= $row->nim ?></td>
						<td><?= $row->nama_lengkap ?></td>
						<td><?= $row->kota ?></td>
						<td><?= $row->ttl ?></td>
						<td>
							<a class="badge badge-warning" href="mahasiswa/ubah/<?= $row->nim ?>">Ubah</a>
							<a class="badge badge-danger" href="mahasiswa/hapus/<?= $row->nim ?>">Hapus</a>
						</td>
					</tr>
				
				<?php }?>
			</tbody>
		</table>
