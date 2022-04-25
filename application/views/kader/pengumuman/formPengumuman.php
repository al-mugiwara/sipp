<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
  <div class="breadcrumb-title pe-3">Pengumuman</div>
  <div class="ps-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Tambah / Edit Data Pengumuman</li>
      </ol>
    </nav>
  </div>
</div>
<!--end breadcrumb-->

<div class="card">
  <div class="card-body">
    <div class="p-4 border rounded">
      <form class="row g-3" action="<?= $this->uri->segment(4) == 'add' ? base_url('kader/Pengumuman/simpan/add') : base_url('kader/Pengumuman/simpan/edit/')?><?= $this->uri->segment(5)?>" method="post" enctype="multipart/form-data">
        <div class="col-md-4">
          <label for="validationDefault01" class="form-label">Tanggal Pengumuman</label>
          <input type="date" class="form-control" id="validationDefault01" required name="tgl_pengumuman">
        </div>
        <div class="col-md-8">
          <label for="validationDefault02" class="form-label">Isi_pengumuman</label>
          <textarea name="isi_pengumuman" class="form-control"></textarea>
        </div>
        <div class="col-md-4">
          <label for="validationDefaultUsername" class="form-label">Gambar</label>
          <input type="file" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required name="Gambar">
        </div>
        <div class="col-md-8">
          <label for="validationDefault04" class="form-label">Status</label>
          <br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status" id="aktif" value="aktif" <?=!empty($data) ? ($data->status_kia == 'Ada' ? 'checked' : '') : ""?>>
            <label class="form-check-label" for="ada">Aktif</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status" id="tidak" value="tidak aktif" <?=!empty($data) ? ($data->status_kia == 'tidak aktif' ? 'checked' : '') : ""?>>
            <label class="form-check-label" for="tidak">Tidak Aktif</label>
          </div>
        </div>
        <div class="col-12">
          <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
