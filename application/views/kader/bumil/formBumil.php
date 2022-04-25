 <!--breadcrumb-->
 <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
  <div class="breadcrumb-title pe-3">Form Ibu Hamil</div>
  <div class="ps-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Tambah / Edit Data Ibu Hamil</li>
      </ol>
    </nav>
  </div>
</div>
<!--end breadcrumb-->
<div class="card">
  <div class="card-body">
    <div class="p-4 border rounded">
      <form class="row g-3" action="<?= $this->uri->segment(4) == 'add' ?  base_url('kader/Bumil/simpan/add') : base_url('kader/Bumil/simpan/edit/');?><?=$this->uri->segment(5)?>" method="POST">
        <div class="col-md-4">
          <label for="validationDefault01" class="form-label">Nama</label>
          <input type="text" class="form-control" id="validationDefault01"  required name="nama" value="<?=!empty($data) ? $data->nama : ""?>" placeholder="Masukkan Nama Lengkap">
        </div>
        <div class="col-md-4">
          <label for="validationDefault02" class="form-label">Username</label>
          <input type="text" class="form-control" id="validationDefault02" required name="username" value="<?=!empty($data) ? $data->username : ""?>" placeholder="Masukkan Username">
        </div>
        <div class="col-md-4">
          <label for="validationDefaultUsername" class="form-label">Password</label>
          <input type="password" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required name="password" value="<?=!empty($data) ? $data->password : ""?>" placeholder="Masukkan Password">
        </div>
        <div class="col-md-3">
          <label for="validationDefault04" class="form-label">No Hp</label>
          <input type="text" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required name="noHp" value="<?=!empty($data) ? $data->no_hp : ""?>" placeholder="Masukkan No Hp">
        </div>
        <div class="col-md-3">
          <label for="validationDefault05" class="form-label">Tanggal Lahir</label>
          <input type="date" class="form-control" id="validationDefault05" required name="tglLahir" value="<?=!empty($data) ? $data->tgl_lahir : ""?>">
        </div>
        <div class="col-md-6">
          <label for="validationDefault03" class="form-label">Alamat</label>
          <textarea name="alamat" id=""  class="form-control"><?=!empty($data) ? $data->alamat : ""?></textarea>
        </div>
        <div class="col-md-4">
          <label for="validationDefault01" class="form-label">Nama Suami</label>
          <input type="text" class="form-control" id="validationDefault01"  required name="namaSuami" value="<?=!empty($data) ? $data->nama_suami : ""?>" placeholder="Masukkan Nama Suami">
        </div>
        <div class="col-md-4">
          <label for="validationDefault02" class="form-label">Pendidikan</label>
          <select class="single-select" name="pendidikan">
            <option value="Tidak Atau Belum Sekolah" <?=!empty($data) ? ($data->pendidikan == 'Tidak Atau Belum Sekolah' ? 'selected' : '') : ""?>>Tidak Atau Belum Sekolah</option>
            <option value="Tamat SD/sederajat" <?=!empty($data) ? ($data->pendidikan == 'Tamat SD/sederajat' ? 'selected' : '') : ""?>>Tamat SD/sederajat</option>
            <option value="Tamat SMP/sederajat" <?=!empty($data) ? ($data->pendidikan == 'Tamat SMP/sederajat' ? 'selected' : '') : ""?>>Tamat SMP/sederajat</option>
            <option value="Tamat SMA/sederajat"<?=!empty($data) ? ($data->pendidikan == 'Tamat SMA/sederajat' ? 'selected' : '') : ""?>>Tamat SMA/sederajat</option>
            <option value="Tamat D1/D2/D3" <?=!empty($data) ? ($data->pendidikan == 'Tamat D1/D2/D3' ? 'selected' : '') : ""?>>Tamat D1/D2/D3</option>
            <option value="Tamat S1/S2/S3" <?=!empty($data) ? ($data->pendidikan == 'Tamat S1/S2/S3' ? 'selected' : '') : ""?>>Tamat S1/S2/S3</option>
          </select>
        </div>
        <div class="col-md-4">
          <label for="validationDefaultUsername" class="form-label">Agama</label>
          <select class="single-select" name="agama">
            <option value="Islam" <?=!empty($data) ? ($data->agama == 'Islam' ? 'selected' : '') : ""?>>Islam</option>
            <option value="Kristen" <?=!empty($data) ? ($data->agama == 'Kristen' ? 'selected' : '') : ""?>>Kristen</option>
            <option value="Hindu" <?=!empty($data) ? ($data->agama == 'Hindu' ? 'selected' : '') : ""?>>Hindu</option>
            <option value="Budha" <?=!empty($data) ? ($data->agama == 'Budha' ? 'selected' : '') : ""?>>Budha</option>
            <option value="Katolik" <?=!empty($data) ? ($data->agama == 'Katolik' ? 'selected' : '') : ""?>>Katolik</option>
          </select>
        </div>
        <div class="col-md-4">
          <label for="validationDefault01" class="form-label">Golongan Darah</label>
         <br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="goldar" id="a" value="A" <?=!empty($data) ? ($data->goldar == 'A' ? 'checked' : '') : ""?>>
            <label class="form-check-label" for="a">A</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="goldar" id="b" value="B" <?=!empty($data) ? ($data->goldar == 'B' ? 'checked' : '') : ""?>>
            <label class="form-check-label" for="b">B</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="goldar" id="ab" value="AB" <?=!empty($data) ? ($data->goldar == 'AB' ? 'checked' : '') : ""?>>
            <label class="form-check-label" for="ab">AB</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="goldar" id="o" value="O" <?=!empty($data) ? ($data->goldar == 'O' ? 'checked' : '') : ""?>>
            <label class="form-check-label" for="o">O</label>
          </div>
        </div>
        <div class="col-md-4">
          <label for="validationDefault02" class="form-label">Pekerjaan</label>
          <select class="single-select" name="pekerjaan">
            <option value="PNS" <?=!empty($data) ? ($data->pekerjaan == 'PNS' ? 'selected' : '') : ""?>>PNS</option>
            <option value="Pedagang" <?=!empty($data) ? ($data->pekerjaan == 'Pedagang' ? 'selected' : '') : ""?>>Pedagang</option>
            <option value="Petani" <?=!empty($data) ? ($data->pekerjaan == 'Petani' ? 'selected' : '') : ""?>>Petani</option>
            <option value="Wiraswasta" <?=!empty($data) ? ($data->pekerjaan == 'Wiraswasta' ? 'selected' : '') : ""?>>Wiraswasta</option>
            <option value="Tidak Bekerja / Ibu Rumah Tangga" <?=!empty($data) ? ($data->pekerjaan == 'Tidak Bekerja / Ibu Rumah Tangga' ? 'selected' : '') : ""?>>Tidak Bekerja / Ibu Rumah Tangga</option>
            <option value="Lainnya" <?=!empty($data) ? ($data->pekerjaan == 'Lainnya' ? 'selected' : '') : ""?>>Lainnya</option>
          </select>
        </div>
        <div class="col-md-4">
          <label for="validationDefaultUsername" class="form-label">Status KIA</label>
           <br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="statusKia" id="ada" value="Ada" <?=!empty($data) ? ($data->status_kia == 'Ada' ? 'checked' : '') : ""?>>
            <label class="form-check-label" for="ada">Ada</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="statusKia" id="tidak" value="Tidak Ada" <?=!empty($data) ? ($data->status_kia == 'Tidak Ada' ? 'checked' : '') : ""?>>
            <label class="form-check-label" for="tidak">Tidak Ada</label>
          </div>
        </div>
        <div class="col-12">

          <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  $('.single-select').select2();
</script>



