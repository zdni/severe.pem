    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?= $page ?></h1>
            </div>
          </div>
        </div>
      </div>
      
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h5><?= $page ?></h5>
                  <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#modal-create-download">Tambah</button>
                  <div class="modal fade" id="modal-create-download">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form action="<?= base_url('admin/downloads/create') ?>" method="post">
                          <div class="modal-header">
                            <h4 class="modal-title">Tambah</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="">Menu</label>
                              <span style="display: block; font-size: 12px; font-weight: bold;" class="text-info">Inputan ini akan menjadi link menu pada halaman awal</span>
                              <input type="text" name="menu" id="menu" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <label for="">Header</label>
                              <span style="display: block; font-size: 12px; font-weight: bold;" class="text-info">Inputan ini akan menjadi nama halaman dari menu</span>
                              <input type="text" name="header" id="header" class="form-control" required>
                            </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-bordered table-hover table-striped table-data">
                    <thead>
                      <th>No</th>
                      <th>Menu</th>
                      <th>Header</th>
                      <th>Aksi</th>
                    </thead>
                    <tbody>
                      <?php $number = 1; foreach ($datas as $data) { ?>
                        <tr>
                          <td><?= $number ?></td>
                          <td><?= $data->menu ?></td>
                          <td><?= $data->header ?></td>
                          <td>
                            <a href="<?= base_url('admin/documents/detail/') . $data->id ?>" class="btn btn-sm btn-outline-primary">Upload Dokumen</a>
                            <button class="btn btn-sm btn-outline-secondary" type="button" data-toggle="modal" data-target="#modal-edit-download-<?= $data->id ?>">Edit</button>
                            <div class="modal fade" id="modal-edit-download-<?= $data->id ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="<?= base_url('admin/downloads/update') ?>" method="post">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Edit</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" name="id" id="id" class="form-control" required value="<?= $data->id ?>">
                                      <div class="form-group">
                                        <label for="">Menu</label>
                                        <span style="display: block; font-size: 12px; font-weight: bold;" class="text-info">Inputan ini akan menjadi link menu pada halaman awal</span>
                                        <input type="text" name="menu" id="menu" class="form-control" required value="<?= $data->menu ?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="">Header</label>
                                        <span style="display: block; font-size: 12px; font-weight: bold;" class="text-info">Inputan ini akan menjadi nama halaman dari menu</span>
                                        <input type="text" name="header" id="header" class="form-control" required value="<?= $data->header ?>">
                                      </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-sm btn-primary">Edit</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>

                            <button class="btn btn-sm btn-outline-danger" type="button" data-toggle="modal" data-target="#modal-delete-download-<?= $data->id ?>">Hapus</button>
                            <div class="modal fade" id="modal-delete-download-<?= $data->id ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="<?= base_url('admin/downloads/delete') ?>" method="post">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Hapus</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" name="id" id="id" class="form-control" required value="<?= $data->id ?>">
                                      <p>Yakin ingin menghapus menu <?= $data->menu ?></p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
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
            </div>
          </div>
        </div>
      </div>
    </div>