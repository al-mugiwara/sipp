 <!--breadcrumb-->
 <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
  <div class="breadcrumb-title pe-3">Master</div>
  <div class="ps-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Data Ibu Hamil</li>
      </ol>
    </nav>
  </div>
  <div class="ms-auto">
    <div class="btn-group">
      <a href="<?=base_url('kader/Bumil/form/add');?>" class="btn btn-primary px-5"><i class="bi bi-person-circle"></i>&nbsp;Tambah Data</a>
    </div>
  </div>
</div>
<!--end breadcrumb-->

<div class="card">
 <div class="card-body">
   <div class="d-flex align-items-center">
    <h5 class="mb-0">Data Ibu Hamil</h5>
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
        <th>Nama Lengkap</th>
        <th>Nama Suami</th>
        <th>Tanggal Lahir</th>
        <th>Goldar</th>
        <th>Alamat</th>
        <th>No Hp</th>
        <th>Status KIA</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach($bumil->result() as $b): ?>
      <tr>
        <td><?=$no++;?></td>
        <td><?=$b->nama;?></td>
        <td><?=$b->nama_suami;?></td>
        <td><?=tgl_indo($b->tgl_lahir);?></td>
        <td> 
          <?php 
          if($b->goldar == 'A'){
            $warna = "bg-danger";
          }else if($b->goldar == 'B'){
            $warna = "bg-primary";
          }else if($b->goldar == "AB"){
            $warna = "bg-success";
          }else if($b->goldar == "O"){
            $warna ="bg-dark";
          }
          ?>
          <div class="icon-badge position-relative <?=$warna;?> ">
            <span class="text-white"><b><?=$b->goldar;?></b></span>
          </div>
        </td>
        <td><?=$b->alamat;?></td>
        <td><?=$b->no_hp;?></td>
        <td>
          <?php if($b->status_kia == "Ada"): ?>  
            <button type="button" class="btn btn-primary btn-sm position-relative me-sm-5"><i class="lni lni-book"></i> Ada</button>
          <?php endif; ?>
          <?php if($b->status_kia == "Tidak Ada"): ?>  
            <button type="button" class="btn btn-danger btn-sm position-relative me-sm-5"><i class="lni lni-cross-circle"></i> Tidak Ada</button>
          <?php endif; ?>
        </td>
        <td>
         <div class="table-actions d-flex align-items-center gap-3 fs-6">
          <a href="javascript:;" onclick="hamil('<?=$b->id_user?>')" class="text-primary"  data-bs-placement="bottom" title="Views" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="lni lni-agenda"></i></a>
          <a href="<?=base_url('kader/Bumil/form/edit/');?><?=$b->id_user;?>" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="bi bi-pencil-fill"></i></a>
          <a href="javascript:;" onclick="hapus('<?=$b->id_user;?>')" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="bi bi-trash-fill"></i></a>
        </div>
      </td>
    </tr>
  <?php endforeach; ?>
</tbody>
</table>
</div>
</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hamil Ke</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="row g-3" action="<?=base_url('kader/Bumil/simpanhamil');?>" method="post">
        <div class="modal-body">
          <div class="col-md-12">
            <label for="validationDefault02" class="form-label">Hamil Ke</label>
            <input type="text" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required name="hamilke"  placeholder="Masukan Hamil Ke-" >
            <input type="hidden" name="idUser" id="idUser">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  function hapus(idUser){
    swal({
      title:'Apakah Data Akan Dihapus ?',
      text:'Data Ibu Hamil Akan Dihapus',
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
          url:"<?=base_url('kader/Bumil/hapus/');?>"+idUser,
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

  function hamil(idUser)
  {
    $("#idUser").val(idUser);
  }
</script>
