 <!--breadcrumb-->
 <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
  <div class="breadcrumb-title pe-3">Master</div>
  <div class="ps-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Data Bidan</li>
      </ol>
    </nav>
  </div>
  <div class="ms-auto">

  </div>
</div>
<!--end breadcrumb-->

<div class="card">
 <div class="card-body">
  <center><h5>REKAPITULASI HASIL KEGIATAN POSYANDU</h5></center>
  <br>
  <div class="row">
    <div class="col-md-6">
      <div class="ms-auto">
        <div class="btn-group">
          <a href="<?=base_url('kader/Laporan/cetak/kegiatan');?>" target="_blank" class="btn btn-primary px-5"><i class="lni lni-printer"></i>&nbsp;Cetak</a>
        </div>   
      </div>
    </div>
    <div class="col-md-6">
      <form action="<?=base_url('kader/laporan/cetak/kegiatanfilter');?>" method="POST" target="_blank" >
        <div class="row">
          <div class="col-md-6">
            <input type="date" name="tgl" class="form-control" placeholder="tgl" required="">     
          </div>
          <div class="col-md-6">
           <button type="submit" class="btn btn-info text-white"><i class="lni lni-printer"></i>&nbsp;Cetak Filter</button>

         </div>
       </div>
       
     </form>
   </div>
 </div>

 <br>
 <table>
   <tr>
     <td>TANGGAL PENGIMBANGAN</td>
     <td>&nbsp;:</td>
     <td><?=tgl_indo(date('Y-m-d'))?></td>
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
  $perempuan = $this->db->query("SELECT COUNT(id_pemeriksaan) as total FROM pem_balita,tabel_user WHERE pem_balita.id_balita=tabel_user.id_user AND tabel_user.jenis_kelamin='p' AND pem_balita.tgl_pemeriksaan='".date('Y-m-d')."'")->row();

  $laki = $this->db->query("SELECT COUNT(id_pemeriksaan) as total FROM pem_balita,tabel_user WHERE pem_balita.id_balita=tabel_user.id_user AND tabel_user.jenis_kelamin='l' AND pem_balita.tgl_pemeriksaan='".date('Y-m-d')."'")->row();

  $jmlp = $this->db->query("SELECT COUNT('id_user') as total FROM tabel_user,tb_balita WHERE tabel_user.id_user = tb_balita.id_user AND tabel_user.jenis_kelamin='p'")->row();

  $jmll = $this->db->query("SELECT COUNT('id_user') as total FROM tabel_user,tb_balita WHERE tabel_user.id_user = tb_balita.id_user AND tabel_user.jenis_kelamin='l'")->row();

  $jmlpk = $this->db->query("SELECT COUNT('id_user') as total FROM tabel_user,tb_balita WHERE tabel_user.id_user = tb_balita.id_user AND tabel_user.jenis_kelamin='p' AND tb_balita.status_kia='ADA'")->row();

  $jmllk = $this->db->query("SELECT COUNT('id_user') as total FROM tabel_user,tb_balita WHERE tabel_user.id_user = tb_balita.id_user AND tabel_user.jenis_kelamin='l' AND tb_balita.status_kia='ADA'")->row();
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

</div>
</div>
<script>
  function hapus(idUser){
    swal({
      title:'Apakah Data Akan Dihapus ?',
      text:'Data Bidan Akan Dihapus',
      type:'warning',
      showCancelButton:true,
      confirmButtonColor:'#3085d6',
      cancelButtonColor:'#d33',
      confirmButtonText:'Ya, Hapus',
      cancelButtonText:'Tidak',
      confirmButtonClass:'btn btn-primary',
      cancelButtonClass:'btn btn-danger',
      buttonsStyling:true,
      reverseButtons:true,
    }).then((result) =>{
      if(result.value){
        $.ajax({
          url:"<?=base_url('kader/Bidan/hapus/');?>"+idUser,
          type:"POST",
          dataType:"JSON",
          cache:false,
          success:function(a){
            setTimeout(function(){
              location.reload();
            },900,swal('Informasi !','Data Berhasil Dihapus','success'))
          }
        })
      }else if(result.dismiss === 'cancel'){
        swal('Batal','Silahkan Lanjutkan .....:)','error')
      }
    })
  }
</script>
