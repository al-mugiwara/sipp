<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
  <div class="breadcrumb-title pe-3">Form Pemeriksaan Ibu Hamil</div>
  <div class="ps-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Form Pemeriksaan Ibu Hamil</li>
      </ol>
    </nav>
  </div>
</div>
<!--end breadcrumb-->
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="card-header"><h5>Form Pemeriksaan Ibu Hamil</h5></div>
        <div class="p-4 border rounded">
          <form class="row g-3" action="<?=base_url('kader/PemBalita/simpan');?>" method="post">
            <div class="col-md-6">
              <label for="validationDefault01" class="form-label">Pilih Ibu Hamil</label>
              <select class="single-select" name="bumil" id="bumil">
                <option value="">Pilih Ibu Hamil</option>
                <?php foreach($bumil->result() as $b): ?>
                  <option value="<?=$b->id_user;?>"><?=$b->nama;?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-6">
              <label for="validationDefault02" class="form-label">Panjang Badan</label>
              <input type="text" class="form-control" id="validationDefault02" required name="panjangBadan"  placeholder="Masukan Panjanga Badan">
            </div>
            <div class="col-md-6">
              <label for="validationDefault02" class="form-label">Lingkar Kepala</label>
              <input type="text" class="form-control" id="validationDefault02" required name="lingkarKepala"  placeholder="Masukan Lingkar Kepala">
            </div>
            <div class="col-md-6">
              <label for="validationDefault02" class="form-label">Berat Badan</label>
              <input type="text" class="form-control" id="validationDefault02" required name="beratBadan"  placeholder="Masukan Berat Badan">
            </div>
              <input type="hidden" name="umur" id="inumur">
            <div class="col-md-6">
              <label for="validationDefaultUsername" class="form-label">Tanggal Pemeriksaan</label>
              <input type="date" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required name="tglPemeriksaan"  placeholder="Masukan Password" value="<?=date('Y-m-d');?>">
            </div>
            <div class="col-md-6">
              <label for="validationDefault04" class="form-label">Keterangan</label>
              <br>
              <textarea name="keterangan" id="" class="form-control"></textarea>
            </div>
            <div class="col-md-6">
              <label for="validationDefault02" class="form-label">Status Penimbangan</label>
              <input type="text" class="form-control" id="validationDefault02" required name="statusPenimbangan"  placeholder="Masukan Status Penimbangan">
            </div>

            <div class="col-12">
              <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="card-header"><h5>Data Ibu Hamil</h5></div>
        <div class="p-4 border rounded">
         <div class="card border shadow-none radius-10">
          <div class="card-body">
            <div class="d-flex align-items-center gap-3">
              <div class="icon-box bg-light-success border-0">
                <i class="bi bi-truck text-success"></i>
              </div>
              <div class="info">
               <h6 class="mb-2">Info Ibu Hamil</h6>
               <p class="mb-1"><strong>Nama Ibu Hamil</strong> : <span id="nama"></span></p>
               <p class="mb-1"><strong>Alamat</strong> : <span id="alamat"></span></p>
               <p class="mb-1"><strong>Tanggal Lahir</strong> : <span id="tglLahir"></span></p>
               <p class="mb-1"><strong>Nama Suami</strong> : <span id="namaSuami"></span></p>
               <p class="mb-1"><strong>Pendidikan</strong> : <span id="pendidikan"></span></p>
               <p class="mb-1"><strong>Agama</strong> : <span id="agama"></span></p>
               <p class="mb-1"><strong>Golongan Darah</strong> : <span id="goldar"></span></p>
               <p class="mb-1"><strong>Pekerjaan</strong> : <span id="pekerjaan"></span></p>
               <p class="mb-1"><strong>Status KIA</strong> : <span id="statusKia"></span></p>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>
</div>
<script>
  $(document).on('change','#bumil',function(){
    var bumil = $(this).val();
    $.ajax({
      url: "<?=base_url('kader/PemBumil/cekBumil/');?>"+bumil,
      type : "GET",
      dataType: "JSON",
      success: function(data){
        $("#nama").text(data['bumil'].nama);
        $("#tglLahir").text(data['bumil'].tgl_lahir);
        $("#namaSuami").text(data['bumil'].nama_suami);
        $("#alamat").text(data['bumil'].alamat);
        $("#pendidikan").text(data['bumil'].pendidikan);
        $("#agama").text(data['bumil'].agama);
        $("#goldar").text(data['bumil'].goldar);
        $("#pekerjaan").text(data['bumil'].pekerjaan);
        $("#statusKia").text(data['bumil'].status_kia);
      }, error: function(jqXHR,textStatus, error){
        alert("Not Found");
      }      
    });
  })
</script>

