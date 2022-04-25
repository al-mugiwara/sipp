<center><h3>LAPORAN PEMERIKSAAN BALITA</h3></center>
<table>
	<tr>
		<td>TANGGAL PEMERIKSAAN</td>
		<td>&nbsp;:</td>
		<td><?=tgl_indo($tglawal)."-".tgl_indo($tglakhir)?></td>
	</tr>
	<tr>
		<td>NAMA POSYANDU</td>
		<td>&nbsp;:</td>
		<td>BINTANG KEJORA</td>
	</tr>
</table>
<br>
<style>
table {
	font-family: arial, sans-serif;
	border-collapse: collapse;
	width: 100%;
}

td, th {
	border: 1px solid black;
	text-align: left;
	padding: 8px;
}

tr:nth-child(even) {
	background-color: #dddddd;

}
</style>
<table >
	<tr>
		<th>No</th>
		<th>Tanggal Pemeriksaan</th>
		<th>Nama Balita</th>
		<th>Panjang Badan</th>
		<th>Lingkar Kepala</th>
		<th>Berat Badan</th>
		<th>Keterangan</th>
		<th>Umur</th>
		<th>Status Penimbangan</th>
	</tr> 
	<?php 
	$no=1; 
	foreach($pem as $p):
		?>
		<tr>
			<td><?=$no++;?></td>
			<td><?=tgl_indo($p->tgl_pemeriksaan);?></td>
			<td><?=$p->nama;?></td>
			<td><?=$p->panjang_badan;?></td>
			<td><?=$p->lingkar_kepala;?></td>
			<td><?=$p->berat_badan;?></td>
			<td><?=$p->keterangan;?></td>
			<td><?=$p->umur;?></td>
			<td><?=$p->status_penimbangan;?></td>
		</tr>
	<?php endforeach;?>
	
</table>
