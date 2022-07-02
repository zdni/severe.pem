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
                <div class="card-header">
                  <h5><?= ( isset( $menu ) ) ? $menu->header : $page; ?></h5>
                  <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#modal-create-document">Tambah</button>
                  <div class="modal fade" id="modal-create-document">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form action="<?= base_url('admin/documents/create') ?>" method="post" enctype="multipart/form-data">
                          <div class="modal-header">
                            <h4 class="modal-title">Tambah Dokumen</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <input type="hidden" name="download_id" id="download_id" class="form-control" required value="<?= $download_id ?>">
                            <div class="form-group">
                              <label for="">Judul Dokumen</label>
                              <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <label for="">File</label>
                              <input type="file" name="file" id="file" class="form-control" required>
                            </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-sm btn-primary">Tambah Dokumen</button>
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
                      <th>Judul</th>
                      <th>Aksi</th>
                    </thead>
                    <tbody>
                      <?php $number = 1; foreach ($datas as $data) { ?>
                        <tr>
                          <td><?= $number ?></td>
                          <td><?= $data->title ?></td>
                          <td>
                            <a href="<?= base_url('uploads/documents/') . $data->file ?>" target="_blank" class="btn btn-sm btn-outline-primary">Lihat Dokumen</a>
                            <button class="btn btn-sm btn-outline-secondary" type="button" data-toggle="modal" data-target="#modal-edit-document-<?= $data->id ?>">Edit</button>
                            <div class="modal fade" id="modal-edit-document-<?= $data->id ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="<?= base_url('admin/documents/update') ?>" method="post" enctype="multipart/form-data">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Edit</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" name="id" id="id" class="form-control" required value="<?= $data->id ?>">
                                      <input type="hidden" name="download_id" id="download_id" class="form-control" required value="<?= $download_id ?>">
                                      <input type="hidden" name="slug" id="slug" class="form-control" required value="<?= $data->slug ?>">
                                      <div class="form-group">
                                        <label for="">Judul Dokumen</label>
                                        <input type="text" name="title" id="title" class="form-control" required value="<?= $data->title ?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="">File</label>
                                        <span class="badge badge-info"><?= $data->file ?></span>
                                        <input type="file" name="file" id="file" class="form-control">
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

                            <button class="btn btn-sm btn-outline-danger" type="button" data-toggle="modal" data-target="#modal-delete-document-<?= $data->id ?>">Hapus</button>
                            <div class="modal fade" id="modal-delete-document-<?= $data->id ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="<?= base_url('admin/documents/delete') ?>" method="post">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Hapus</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" name="download_id" id="download_id" class="form-control" required value="<?= $data->download_id ?>">
                                      <input type="hidden" name="id" id="id" class="form-control" required value="<?= $data->id ?>">
                                      <p>Yakin ingin menghapus dokumen <?= $data->title ?></p>
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