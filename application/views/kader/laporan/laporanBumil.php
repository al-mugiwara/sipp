<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
  <div class="breadcrumb-title pe-3">Master</div>
  <div class="ps-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Data Balita</li>
      </ol>
    </nav>
  </div>
</div>
<!--end breadcrumb-->

<div class="card">
 <div class="card-body">
   <div class="d-flex align-items-center">
    <h5 class="mb-0">Balita Details</h5>
  </div>
  <br>
  <div class="row">

    <form action="<?=base_url('kader/laporan/cetakbumil/');?>" method="POST" target="_blank" >
      <div class="row">
        <div class="col-md-3">
          <input type="date" name="tglawal" class="form-control" placeholder="Tanggal Awal" required="">     
        </div>
        <div class="col-md-1"><h6 style="margin-bottom: -80px!important"><center>s.d</center></h6></div>
        <div class="col-md-3">
          <input type="date" name="tglakhir" class="form-control" placeholder="tgl" required="">     
        </div>
        <div class="col-md-5">
         <button type="submit" class="btn btn-info text-white"><i class="lni lni-printer"></i>&nbsp;Cetak Filter</button>
       </div>
     </div>
   </form>
 </div>
</div>
    <div class="table-responsive mt-3">
     <table class="table align-middle">
       <thead class="table-secondary">
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
      </thead>
      <tbody>
        <?php
        $no=1; 
        $pem = $this->db->select('*')->from('pem_bumil')->join('tabel_user','pem_bumil.id_bumil=tabel_user.id_user')->get();
        foreach($pem->result() as $p): ?>
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
        <?php endforeach; ?>

      </tbody>
    </table>
  </div>
  <!-- batas tabel -->


</div>
</div>
<script type="">
  function hapus(id_user) {
    swal({
      title:'Apakah Data Akan Dihapus?',
      text:'Data Balita Akan Dihapus',
      type:'warning',
      showCancelButton:true,
      confirmButtonColor:'#30385d6',
      cancelButtonColor:'#d33',
      confirmButtonText:'Ya, Hapus',
      cancelButtonText:'Tidak',
      confirmButtonClass:'btn btn-primary',
      cancelButtonClass:'btn btn-danger',
      buttonStyling:true,
      reverseButtons:true,
    }).then((result) =>{
      if(result.value){
        $.ajax({
          url:"<?=base_url('kader/Balita/hapus/');?>"+id_user,
          type:"POST",
          dataType:'JSON',
          cache:false,
          success:function(a){
            setTimeout(function(){
              location.reload();
            },900,swal('Informasi ! ','Data Berhasil Dihapus','success'))
          }
        })
      } else if(result.dismiss === 'cancel'){
        swal('Batal', 'Silahkan Lanjutkan .....:','error')
      }
    })
  }
</script>