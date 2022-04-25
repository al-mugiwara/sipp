<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
  <div class="breadcrumb-title pe-3">Form Pemeriksaan Balita</div>
  <div class="ps-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Form Pemeriksaan Balita</li>
      </ol>
    </nav>
  </div>
</div>
<!--end breadcrumb-->
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="card-header"><h5>Form Pemberian Vitamin</h5></div>
        <div class="p-4 border rounded">
          <form class="row g-3" action="<?=base_url('kader/PemBalita/simpan');?>" method="post">
            <div class="col-md-6">
              <label for="validationDefault01" class="form-label">Pilih Balita</label>
              <select class="single-select" name="balita" id="balita">
                <option value="">Pilih Nama Balita</option>
                <?php foreach($balita->result() as $b): ?>
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
        <div class="card-header"><h5>Data Balita</h5></div>
        <div class="p-4 border rounded">
         <div class="card border shadow-none radius-10">
          <div class="card-body">
            <div class="d-flex align-items-center gap-3">
              <div class="icon-box bg-light-success border-0">
                <i class="bi bi-truck text-success"></i>
              </div>
              <div class="info">
               <h6 class="mb-2">Info Balita</h6>
               <p class="mb-1"><strong>Nama Balita</strong> : <span id="nama"></span></p>
               <p class="mb-1"><strong>Jenis Kelamin</strong> : <span id="jenisKelamin"></span></p>
               <p class="mb-1"><strong>Alamat</strong> : <span id="alamat"></span></p>
               <p class="mb-1"><strong>Tanggal Lahir</strong> : <span id="tglLahir"></span></p>
               <p class="mb-1"><strong>Usia</strong> : <span id="usia"></span></p>
               <p class="mb-1"><strong>Nama Ayah</strong> : <span id="namaAyah"></span></p>
               <p class="mb-1"><strong>Nama Ibu</strong> : <span id="namaIbu"></span></p>
               <p class="mb-1"><strong>Tempat Lahir</strong> : <span id="tempatLahir"></span></p>
               <p class="mb-1"><strong>Berat Lahir</strong> : <span id="beratLahir"></span></p>
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
  $(document).on('change','#balita',function(){
    var balita = $(this).val();
    $.ajax({
      url: "<?=base_url('kader/Vitamin/cekBalita/');?>"+balita,
      type : "GET",
      dataType: "JSON",
      success: function(data){
        $("#nama").text(data['balita'].nama);
        $("#tglLahir").text(data['balita'].tgl_lahir);
        $("#namaAyah").text(data['balita'].nama_ayah);
        $("#alamat").text(data['balita'].alamat);
        if(data['balita'].jenis_kelamin == 'p'){
          $("#jenisKelamin").text("Perempuan");
        }else{
          $("#jenisKelamin").text("Laki - Laki");
        }
        $("#namaIbu").text(data['balita'].nama_ibu);
        $("#tempatLahir").text(data['balita'].tempat_lahir);
        $("#beratLahir").text(data['balita'].berat_lahir);
        $("#anakKe").text(data['balita'].anak_ke);
        $("#statusKia").text(data['balita'].status_kia);
        $("#usia").text(data['usia']);
        $("#inumur").val(data['usia']);
      }, error: function(jqXHR,textStatus, error){
        alert("Not Found");
      }      
    });
  })
</script>

