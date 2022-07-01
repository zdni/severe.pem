<div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?= $page ?></h1>
              <button class="btn btn-sm btn-secondary" onclick="history.back()">Kembali</button>
            </div>
          </div>
        </div>
      </div>
      
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <form action="<?= base_url('admin/laboratories/update') ?>" method="post">
                  <div class="card-header">
                    <h5><?= $data->name ?></h5>
                  </div>
                  <div class="card-body">
                    <input type="hidden" name="id" id="id" class="form-control" value="<?= $data->id ?>">
                    <input type="hidden" name="file" id="file" class="form-control" value="<?= $data->file ?>">
                    <input type="hidden" name="slug" id="slug" class="form-control" value="<?= $data->slug ?>">
                    <div class="form-group">
                      <label for="">Nama</label>
                      <input type="text"name="name" id="name" class="form-control" value="<?= $data->name ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Konten</label>
                      <textarea class="summernote_form" name="content" id="content"><?= $data->file_content ?></textarea>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-outline-primary" >Ubah Detail</button>
                  </div>
                </form>
              </div>
              <div class="card mt-5">
                <div class="card-header">
                  <h5>Daftar Bahan Ajar</h5>
                  <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#modal-create-moduls">Tambah</button>

                  <div class="modal fade" id="modal-create-moduls">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form action="<?= base_url('admin/moduls/create') ?>" method="post" enctype="multipart/form-data">
                          <input type="hidden" name="laboratory_id" id="laboratory_id" class="form-control" value="<?= $data->id ?>">
                          <div class="modal-header">
                            <h4 class="modal-title">Tambah Bahan Ajar</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="">Judul Bahan Ajar</label>
                              <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <label for="">File</label>
                              <input type="file" name="file" id="file" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <label for="">Tampilkan Bahan Ajar</label>
                              <select name="is_show" id="is_show" class="form-control">
                                <option value="1">Tampilkan</option>
                                <option value="0">Sembunyikan</option>
                              </select>
                            </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-sm btn-primary">Tambah Bahan Ajar</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-hover table-striped table-bordered">
                    <thead>
                      <th>No</th>
                      <th>Bahan Ajar</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </thead>
                    <tbody>
                      <?php $status = ['Sembunyikan', 'Tampilkan'];  $number = 1; foreach ($moduls as $modul) { ?>
                        <tr>
                          <td><?= $number ?></td>
                          <td><?= $modul->title ?></td>
                          <td><?= $status[ $modul->is_show ] ?></td>
                          <td>
                            <button class="btn btn-sm btn-outline-primary" type="button" data-toggle="modal" data-target="#modal-edit-modul-<?= $modul->id ?>">Edit</button>
                            <div class="modal fade" id="modal-edit-modul-<?= $modul->id ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="<?= base_url('admin/moduls/update') ?>" method="post" enctype="multipart/form-data">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Edit Bahan Ajar</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" name="laboratory_id" id="laboratory_id" class="form-control" value="<?= $data->id ?>">
                                      <input type="hidden" name="id" id="id" class="form-control" required value="<?= $modul->id ?>">
                                      <div class="form-group">
                                        <label for="">Judul Bahan Ajar</label>
                                        <input type="text" name="title" id="title" class="form-control" required value="<?= $modul->title ?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="">File</label>
                                        <span style="font-size: 12px; display: block; font-weight: bold; margin-top: -12px; margin-bottom: 7px;" class="text-info"><?= $modul->file ?></span>
                                        <input type="file" name="file" id="file" class="form-control">
                                      </div>
                                      <div class="form-group">
                                        <label for="">Tampilkan Bahan Ajar</label>
                                        <select name="is_show" id="is_show" class="form-control">
                                          <option <?= ($modul->is_show == 1) ? 'selected' : '' ?> value="1">Tampilkan</option>
                                          <option <?= ($modul->is_show == 0) ? 'selected' : '' ?> value="0">Sembunyikan</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-sm btn-primary">Edit Bahan Ajar</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>

                            <button class="btn btn-sm btn-outline-danger" type="button" data-toggle="modal" data-target="#modal-delete-modul-<?= $modul->id ?>">Hapus</button>
                            <div class="modal fade" id="modal-delete-modul-<?= $modul->id ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="<?= base_url('admin/moduls/delete') ?>" method="post">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Hapus Bahan Ajar</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" name="laboratory_id" id="laboratory_id" class="form-control" value="<?= $data->id ?>">
                                      <input type="hidden" name="id" id="id" class="form-control" required value="<?= $modul->id ?>">
                                      <p>Yakin ingin menghapus bahan ajar <?= $modul->title ?></p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-sm btn-danger">Hapus Bahan Ajar</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                      <?php $number++; } ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card">
                <div class="card-header">
                  <h5>Daftar Video Bahan Ajar</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>