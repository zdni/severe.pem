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
                  <h5>Daftar Fasilitas</h5>
                  <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#modal-create-facility">Tambah</button>
                
                  <div class="modal fade" id="modal-create-facility">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form action="<?= base_url('admin/facilities/create') ?>" method="post" enctype="multipart/form-data">
                          <div class="modal-header">
                            <h4 class="modal-title">Tambah Fasilitas</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="">Fasilitas</label>
                              <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <label for="">Foto Fasilitas</label>
                              <input type="file" name="image" id="image" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <label for="">Jumlah Fasilitas</label>
                              <input type="number" name="total" id="total" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <label for="">Deskripsi</label>
                              <textarea name="description" id="description" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                              <label for="">Status</label>
                              <textarea name="state" id="state" class="form-control"></textarea>
                            </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-sm btn-primary">Tambah Fasilitas</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-striped table-hover table-bordered table-data">
                    <thead>
                      <th>No</th>
                      <th>Fasilitas</th>
                      <th>Foto</th>
                      <th>Aksi</th>
                    </thead>
                    <tbody>
                      <?php $number = 1; foreach( $datas as $data ) { ?>
                        <tr>
                          <td><?= $number ?></td>
                          <td><?= $data->name ?></td>
                          <td><img src="<?= base_url('uploads/facilities/') . $data->image  ?>" alt="<?= 'Foto ' . $data->name ?>" height="120px"></td>
                          <td>
                            <button class="btn btn-sm btn-outline-secondary" type="button" data-toggle="modal" data-target="#modal-edit-facility-<?= $data->id ?>">Edit</button>
                            <div class="modal fade" id="modal-edit-facility-<?= $data->id ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="<?= base_url('admin/facilities/update') ?>" method="post" enctype="multipart/form-data">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Edit Data Fasilitas</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" name="id" id="id" class="form-control" required value="<?= $data->id ?>">
                                      <div class="form-group">
                                        <label for="">Fasilitas</label>
                                        <input type="text" name="name" id="name" class="form-control" required value="<?= $data->name ?>">
                                      </div>
                                      <div class="form-group">
                                        <img src="<?= base_url('uploads/facilities/') . $data->image ?>" alt="Foto Fasilitas <?= $data->name ?>" width="50%" class="mb-3">
                                        <br>
                                        <label for="">Foto Fasilitas</label>
                                        <input type="file" name="image" id="image" class="form-control">
                                      </div>
                                      <div class="form-group">
                                        <label for="">Jumlah Fasilitas</label>
                                        <input type="number" name="total" id="total" class="form-control" required value="<?= $data->total ?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="">Deskripsi</label>
                                        <textarea name="description" id="description" class="form-control"><?= $data->description ?></textarea>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Status</label>
                                        <textarea name="state" id="state" class="form-control"><?= $data->state ?></textarea>
                                      </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-sm btn-primary">Edit Data Fasilitas</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <button class="btn btn-sm btn-outline-danger" type="button" data-toggle="modal" data-target="#modal-delete-facility-<?= $data->id ?>">Hapus</button>
                            <div class="modal fade" id="modal-delete-facility-<?= $data->id ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="<?= base_url('admin/facilities/delete') ?>" method="post">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Hapus Fasilitas</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" name="id" id="id" class="form-control" required value="<?= $data->id ?>">
                                      <p>Yakin ingin menghapus data fasilitas <?= $data->name ?></p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-sm btn-danger">Hapus Fasilitas</button>
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