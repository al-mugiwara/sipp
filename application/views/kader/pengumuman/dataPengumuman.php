<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
  <div class="breadcrumb-title pe-3">Master</div>
  <div class="ps-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Pengumuman</li>
      </ol>
    </nav>
  </div>
  <div class="ms-auto">
    <div class="btn-group">
      <a href="<?=base_url('kader/Pengumuman/form/add')?>" class="btn btn-primary px-5"><i class="bi bi-person-circle"></i>&nbsp;Tambah Data</a>
    </div>
  </div>
</div>
<!--end breadcrumb-->

<div class="card">
 <div class="card-body">
   <div class="d-flex align-items-center">
    <h5 class="mb-0">Pengumuman Details</h5>
    <form class="ms-auto position-relative">
     <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
     <input class="form-control ps-5" type="text" placeholder="search">
   </form>
 </div>
 <div class="table-responsive mt-3">
   <table class="table align-middle">
     <thead class="table-secondary">
       <tr>
        <th>No</th>
        <th>Tanggal Pengumuman</th>
        <th>Isi Pengumuman</th>
        <th>Gambar</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach ($pengumuman->result() as $p):?>
      <tr>
        <td><?=$no++;?></td>
        <td><?=tgl_indo($p->tgl_pengumuman);?></td>
        <td><?=$p->isi_pengumuman;?></td>
        <td>  
          <div class="product-box">
            <img src="<?=base_url('assets/images/')?><?=$p->gambar;?>" alt="">
          </div>
        </td>
        <td><?=$p->status;?></td>
        <td>
         <div class="table-actions d-flex align-items-center gap-3 fs-6">
           <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Views"><i class="bi bi-eye-fill"></i></a>
           <a href="<?=base_url('kader/Pengumuman/form/edit/')?><?=$p->id_pengumuman;?>" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="bi bi-pencil-fill"></i></a>
           <a href="javascript:;" onclick="hapus('<?=$p->id_pengumuman;?>')" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="bi bi-trash-fill"></i></a>
         </div>
       </div>
     </td>
   </tr>
 <?php endforeach; ?>
</tbody>
</table>
</div>
</div>
</div>
<script type="">
  function hapus(id_user) {
    swal({
      title:'Apakah data akan dihapus?',
      text:'Data ibu hamil akan dihapus',
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
          url:"<?=base_url('kader/Pengumuman/hapus/');?>"+id_user,
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