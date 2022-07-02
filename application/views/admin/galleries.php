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
                  <h5>Daftar Galeri</h5>
                  <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#modal-create-gallery">Tambah</button>
                
                  <div class="modal fade" id="modal-create-gallery">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form action="<?= base_url('admin/galleries/create') ?>" method="post" enctype="multipart/form-data">
                          <div class="modal-header">
                            <h4 class="modal-title">Tambah Galeri</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="">Judul</label>
                              <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <label for="">Foto Galeri</label>
                              <input type="file" name="image" id="image" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <label for="">Tanggal Post</label>
                              <input type="date" name="post_date" id="post_date" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <label for="">Deskripsi</label>
                              <textarea name="description" id="description" class="form-control"></textarea>
                            </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-sm btn-primary">Tambah Galeri</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-striped table-hover table-bordered">
                    <thead>
                      <th>No</th>
                      <th>Galeri</th>
                      <th>Foto</th>
                      <th>Aksi</th>
                    </thead>
                    <tbody>
                      <?php $number = 1; foreach( $datas as $data ) { ?>
                        <tr>
                          <td><?= $number ?></td>
                          <td><?= $data->title ?></td>
                          <td><img src="<?= base_url('uploads/galleries/') . $data->image  ?>" alt="<?= 'Foto ' . $data->title ?>" height="120px"></td>
                          <td>
                            <button class="btn btn-sm btn-outline-secondary" type="button" data-toggle="modal" data-target="#modal-edit-gallery-<?= $data->id ?>">Edit</button>
                            <div class="modal fade" id="modal-edit-gallery-<?= $data->id ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="<?= base_url('admin/galleries/update') ?>" method="post" enctype="multipart/form-data">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Edit Data Galeri</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" name="id" id="id" class="form-control" required value="<?= $data->id ?>">
                                      <div class="form-group">
                                        <label for="">Judul</label>
                                        <input type="text" name="title" id="title" class="form-control" required value="<?= $data->title ?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="">Foto Galeri</label>
                                        <input type="file" name="image" id="image" class="form-control" value="<?= $data->image ?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="">Tanggal Post</label>
                                        <input type="date" name="post_date" id="post_date" class="form-control" required value="<?= $data->post_date ?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="">Deskripsi</label>
                                        <textarea name="description" id="description" class="form-control"><?= $data->description ?></textarea>
                                      </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-sm btn-primary">Edit Data Galeri</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <button class="btn btn-sm btn-outline-danger" type="button" data-toggle="modal" data-target="#modal-delete-gallery-<?= $data->id ?>">Hapus</button>
                            <div class="modal fade" id="modal-delete-gallery-<?= $data->id ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="<?= base_url('admin/galleries/delete') ?>" method="post">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Hapus Galeri</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" name="id" id="id" class="form-control" required value="<?= $data->id ?>">
                                      <p>Yakin ingin menghapus data galeri <?= $data->title ?></p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-sm btn-danger">Hapus Galeri</button>
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