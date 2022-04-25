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
          <th>Nama Ibu Hamil</th>
          <th>Keluhan</th>
          <th>Tekanan Darah</th>
          <th>Berat Badan</th>
          <th>Umur Kehamilan</th>
          <th>Tinggi Fundus</th>
          <th>Letak Janin</th>
          <th>Denyut Jantung</th>
          <th>Kaki Bengkak</th>
          <th>Hasil Pemeriksaan</th>
          <th>Tindakan</th>
          <th>Nasihat</th>
          <th>Keterangan</th>
          <th>Jadwal Kembali</th>
	</tr> 
	<?php 
	$no=1; 
	foreach($pem as $p):
		?>
		<tr>
			  <td><?=$no++;?></td>
            <td><?=tgl_indo($p->tgl_pemeriksaan);?></td>
            <td><?=$p->nama;?></td>
            <td><?=$p->keluhan;?></td>
            <td><?=$p->tekanan_darah;?></td>
            <td><?=$p->bb;?></td>
            <td><?=$p->umur_kehamilan;?></td>
            <td><?=$p->tinggi_fundus;?></td>
            <td><?=$p->letak_janin;?></td>
            <td><?=$p->denyut_jantung;?></td>
            <td><?=$p->kaki_bengkak;?></td>
            <td><?=$p->hasil_pemeriksan;?></td>
            <td><?=$p->tindakan;?></td>
            <td><?=$p->nasihat;?></td>
            <td><?=$p->keterangan;?></td>
            <td><?=$p->jadwal_kembali;?></td>
		</tr>
	<?php endforeach;?>
	
</table>
