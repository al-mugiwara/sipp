<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
  <div class="breadcrumb-title pe-3">Form Balita</div>
  <div class="ps-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Tambah / Edit Data Balita</li>
      </ol>
    </nav>
  </div>
</div>
<!--end breadcrumb-->

<div class="card">
  <div class="card-body">
    <div class="p-4 border rounded">
      <form class="row g-3" action="<?= $this->uri->segment(4) == 'add' ? base_url('kader/Balita/simpan/add') : base_url('kader/Balita/simpan/edit/')?><?= $this->uri->segment(5)?>" method="post">
        <div class="col-md-4">
          <label for="validationDefault01" class="form-label">Nama</label>
          <input type="text" class="form-control" id="validationDefault01" required name="nama" value="<?=!empty($data) ? $data->nama : ""?>" placeholder="Masukan Nama Lengkap">
        </div>
        <div class="col-md-4">
          <label for="validationDefault02" class="form-label">Username</label>
          <input type="text" class="form-control" id="validationDefault02" required name="username" value="<?=!empty($data) ? $data->username : ""?>" placeholder="Masukan Username">
        </div>
        <div class="col-md-4">
          <label for="validationDefaultUsername" class="form-label">Password</label>
          <input type="password" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required name="password" value="<?=!empty($data) ? $data->password : ""?>" placeholder="Masukan Password">
        </div>
        <div class="col-md-3">
        <label for="validationDefault04" class="form-label">Jenis Kelamin</label>
        <br>
          <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="jeniskelamin" id="inlineRadio1" value="l" <?=!empty($data) ? ($data->jenis_kelamin == 'l' ? 'checked' : '') : ""?>>
                  <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="jeniskelamin" id="inlineRadio2" value="p" <?=!empty($data) ? ($data->jenis_kelamin == 'p' ? 'checked' : '') : ""?>>
                  <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                </div>
              </div>
        <div class="col-md-3">
          <label for="validationDefault04" class="form-label">No Hp</label>
          <input type="text" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required name="noHp" value="<?=!empty($data) ? $data->no_hp : ""?>" placeholder="Masukan No Hp">
        </div>
        <div class="col-md-3">
          <label for="validationDefault05" class="form-label">Tanggal Lahir</label>
          <input type="date" class="form-control" id="validationDefault05" required name="tanggalLahir" value="<?=!empty($data) ? $data->tgl_lahir : ""?>">
        </div>
        <div class="col-md-6">
          <label for="validationDefault03" class="form-label">Alamat</label>
          <textarea class="form-control" name="alamat"><?=!empty($data) ? $data->alamat: ""?></textarea>
        </div>
        <div class="col-md-4">
          <label for="validationDefault01" class="form-label">Nama Ayah</label>
          <input type="text" class="form-control" id="validationDefault01" required name="namaAyah" value="<?=!empty($data) ? $data->nama_ayah : ""?>" placeholder="Masukan Nama Lengkap">
        </div>
        <div class="col-md-4">
          <label for="validationDefault01" class="form-label">Nama Ibu</label>
          <input type="text" class="form-control" id="validationDefault01" required name="namaIbu" value="<?=!empty($data) ? $data->nama_ibu : ""?>" placeholder="Masukan Nama Lengkap">
        </div>
        <div class="col-md-4">
          <label for="validationDefault01" class="form-label">Tempat Lahir</label>
          <input type="text" class="form-control" id="validationDefault01" required name="tempatLahir" value="<?=!empty($data) ? $data->tempat_lahir : ""?>" placeholder="Masukan Tempat Lahir">
        </div>  
        <div class="col-md-4">
          <label for="validationDefault01" class="form-label">Berat Lahir</label>
          <input type="text" class="form-control" id="validationDefault01" required name="beratLahir" value="<?=!empty($data) ? $data->berat_lahir : ""?>" placeholder="Masukan Berat Lahir">
        </div>        
        <div class="col-md-3">
        <label for="validationDefault04" class="form-label">Anak Ke</label>
      <input type="text" class="form-control" id="validationDefault01" required name="anakKe" value="<?=!empty($data) ? $data->anak_ke : ""?>" placeholder="Masukan Anak Ke">
        </div>
        <div class="col-md-3">
        <label for="validationDefault04" class="form-label">Status KIA</label>
        <br>
          <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="statusKia" id="ada" value="ADA" <?=!empty($data) ? ($data->status_kia == 'ADA' ? 'checked' : '') : ""?>>
                  <label class="form-check-label" for="ada">Ada</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="statusKia" id="tidakAda" value="TIDAK ADA" <?=!empty($data) ? ($data->status_kia == 'TIDAK ADA' ? 'checked' : '') : ""?>>
                  <label class="form-check-label" for="tidakAda">Tidak Ada</label>
                </div>
        </div>
        <div class="col-12">
          <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
      </form>
    </div>
  </div>
</div>
