 <!--breadcrumb-->
 <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
  <div class="breadcrumb-title pe-3">Data Bidan</div>
  <div class="ps-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Tambah / Edit Data Bidan</li>
      </ol>
    </nav>
  </div>
</div>
<!--end breadcrumb-->
<div class="card">
  <div class="card-body">
    <div class="p-4 border rounded">
      <form class="row g-3" action="<?= $this->uri->segment(4) == 'add' ?  base_url('kader/Bidan/simpan/add') : base_url('kader/Bidan/simpan/edit/');?><?=$this->uri->segment(5)?>" method="POST">
        <div class="col-md-4">
          <label for="validationDefault01" class="form-label">Nama</label>
          <input type="text" class="form-control" id="validationDefault01"  required name="nama" value="<?=!empty($data) ? $data->nama : ""?>">
        </div>
        <div class="col-md-4">
          <label for="validationDefault02" class="form-label">Username</label>
          <input type="text" class="form-control" id="validationDefault02" required name="username" value="<?=!empty($data) ? $data->username : ""?>">
        </div>
        <div class="col-md-4">
          <label for="validationDefaultUsername" class="form-label">Password</label>
          <input type="password" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required name="password" value="<?=!empty($data) ? $data->password : ""?>">
        </div>
        <div class="col-md-3">
          <label for="validationDefault04" class="form-label">Jenis Kelamin</label><br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jenisKelamin" id="inlineRadio1" value="l" <?=!empty($data) ? ($data->jenis_kelamin == 'l' ? 'checked' : '') : ""?>>
            <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jenisKelamin" id="inlineRadio2" value="p" <?=!empty($data) ? ($data->jenis_kelamin == 'p' ? 'checked' : '') : ""?>>
            <label class="form-check-label" for="inlineRadio2">Perempuan</label>
          </div>
        </div>
        <div class="col-md-3">
          <label for="validationDefault04" class="form-label">Instansi</label>
          <input type="text" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required name="instansi" value="<?=!empty($data) ? $data->instansi : ""?>">
        </div>
        <div class="col-md-3">
          <label for="validationDefault04" class="form-label">No Hp</label>
          <input type="text" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required name="noHp" value="<?=!empty($data) ? $data->no_hp : ""?>">
        </div>
        <div class="col-md-3">
          <label for="validationDefault05" class="form-label">Tanggal Lahir</label>
          <input type="date" class="form-control" id="validationDefault05" required name="tglLahir" value="<?=!empty($data) ? $data->tgl_lahir : ""?>">
        </div>
        <div class="col-md-6">
          <label for="validationDefault03" class="form-label">Alamat</label>
          <textarea name="alamat" id=""  class="form-control"><?=!empty($data) ? $data->alamat : ""?></textarea>
        </div>
        <div class="col-12">
          
          <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
      </form>
    </div>
  </div>
</div>



