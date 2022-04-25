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
    <?php 
      $jenis = $this->input->post('jenislaporan');
    ?>
    <div class="col-md-12">
      <form action="<?=base_url('kader/laporan/balita')?>" method="POST">
        <div class="row">
          <div class="col-md-6">
            <label for="validationDefault01" class="form-label">Jenis Laporan</label>
            <select name="jenislaporan"  class="form-control">
             <option value="">Pilih Jenis Laporan</option>
             <option value="imun">Imunisasi</option>
             <option value="vitamin">Vitamin</option>
             <option value="periksa">Pemeriksaan</option>
           </select>
         </div>
         <div class="col-md-1"></div>
         <div class="col-md-4 mt-4">
          <button type="submit" name="submit" class="btn btn-primary text-white"><i class="lni lni-keyword-research"></i>&nbsp;Filter Jenis Laporan</button>
        </div>
      </div>
    </form>
    <br>
    <form action="<?=base_url('kader/laporan/cetakbalita/');?><?=$jenis?>" method="POST" target="_blank" >
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
<?php 
if(isset($_POST['submit'])):

  if($this->input->post('jenislaporan') == 'periksa'){
    ?>
    <div class="table-responsive mt-3">
     <table class="table align-middle">
       <thead class="table-secondary">
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
      </thead>
      <tbody>
        <?php
        $no=1; 
        $pem = $this->db->select('*')->from('pem_balita')->join('tabel_user','pem_balita.id_balita=tabel_user.id_user')->get();
        foreach($pem->result() as $p): ?>
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
        <?php endforeach; ?>

      </tbody>
    </table>
  </div>
  <!-- batas tabel -->
  <?php 
}else if($this->input->post('jenislaporan') == 'imun'){
  ?>
  <div class="table-responsive mt-3">
   <table class="table align-middle">
     <thead class="table-secondary">
       <tr>
        <th>No</th>
        <th>Nama Balita</th>
        <th>Jenis Imunisasi</th>
        <th>Tanggal Imunisasi</th>
        <th>Pemberi Imunisasi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no=1; 
      $pem = $this->db->select('*')->from('tb_imunisasi')->join('tabel_user','tb_imunisasi.id_balita=tabel_user.id_user')->get();
      foreach($pem->result() as $p): 
        $bidan =$this->db->get_where('tabel_user',['id_user' => $p->id_kader])->row();
        ?>
        <tr>
          <td><?=$no++;?></td>
          <td><?=$p->nama;?></td>
          <td><?=$p->jenis_imunisasi;?></td>
          <td><?=tgl_indo($p->tgl_diberikan);?></td>
          <td><?=$bidan->nama;?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<!-- batas tabel -->
<?php 
}else if($this->input->post('jenislaporan') == 'vitamin'){
  ?>
  <div class="table-responsive mt-3">
   <table class="table align-middle">
     <thead class="table-secondary">
       <tr>
        <th>No</th>
        <th>Nama Balita</th>
        <th>Umur</th>
        <th>Jenis Vitamin</th>
        <th>Tanggal Pemberian</th>
        <th>Pemberi Vitamin</th>
        <th>Keterangan</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no=1; 
      $pem = $this->db->select('*')->from('tb_vitamin')->join('tabel_user','tb_vitamin.id_balita=tabel_user.id_user')->get();
      foreach($pem->result() as $p): 
        $bidan =$this->db->get_where('tabel_user',['id_user' => $p->id_kader])->row();
        ?>
        <tr>
          <td><?=$no++;?></td>
          <td><?=$p->nama;?></td>
          <td><?=$p->umur;?></td>
          <td><?=$p->jenis_vitamin;?></td>
          <td><?=tgl_indo($p->tgl_diberikan);?></td>
          <td><?=$bidan->nama;?></td>
          <td><?=$p->keterangan;?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<!-- batas tabel -->
<?php
}
endif;
?>

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