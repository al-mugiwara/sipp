<center><h3>REKAPITULASI HASIL KEGIATAN POSYANDU</h3></center>
<table>
	<tr>
		<td>TANGGAL PENGIMBANGAN</td>
		<td>&nbsp;:</td>
		<td><?=tgl_indo($tgl)?></td>
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
		<th rowspan="2">No</th>
		<th rowspan="2">Jenis Data</th>
		<th colspan="2">Jenis Kelamin</th>

	</tr> 
	<tr >
		<th>P</th>
		<th>L</th>

	</tr>
	<?php
	
	?>
	<tr>
		<td>1</td>
		<td>Jumlah Bayi /Balita</td>
		<td><?=$jmlp->total;?></td>
		<td><?=$jmll->total;?></td>
	</tr>
	<tr>
		<td>2</td>
		<td>Jumlah Bayi /Balita Yang Punya KMS</td>
		<td><?=$jmlpk->total;?></td>
		<td><?=$jmllk->total;?></td>
	</tr>
	<tr>
		<td>3</td>
		<td>Jumlah Bayi /Balita Ditimbang</td>
		<td><?=$perempuan->total;?></td>
		<td><?=$laki->total;?></td>
	</tr>
</table>
