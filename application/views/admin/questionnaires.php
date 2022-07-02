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
                  <h5>Kuisioner</h5>
                  <span class="text-info" style="display: block; font-size: 12px; font-weight: bold;">Hanya satu link kuisioner yang dapat aktif di satu waktu</span>
                  <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#modal-create-questionnaire">Tambah</button>

                  <div class="modal fade" id="modal-create-questionnaire">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form action="<?= base_url('admin/questionnaires/create') ?>" method="post">
                          <div class="modal-header">
                            <h4 class="modal-title">Tambah Kuisioner</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="">Judul Kuisioner</label>
                              <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <label for="">Link</label>
                              <input type="text" name="link" id="link" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <label for="">Status</label>
                              <span class="text-info" style="display: block; font-size: 12px; font-weight: bold;">pilih "Jadikan Kuisioner" agar kuisioner dapat diakses lewat link kuisioner</span>
                              <select name="is_show" id="is_show" class="form-control">
                                <option value="0">Sembunyikan</option>
                                <option value="1">Jadikan Kuisioner</option>
                              </select>
                            </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-sm btn-primary">Tambah Kuisioner</button>
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
                      <th>Kuisioner</th>
                      <th>Link</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </thead>
                    <tbody>
                      <?php $status = ['Sembunyikan', 'Jadikan Kuisioner']; $number = 1; foreach( $datas as $data ) { ?>
                        <tr>
                          <td><?= $number ?></td>
                          <td>
                            <?= $data->title ?>
                            <br>
                            <span class="badge badge-info"><?= $data->laboratory_name ?></span>
                          </td>
                          <td><a href="<?= $data->link ?>" class="btn btn-sm btn-outline-primary" target="_blank">Buka Kuisioner</a></td>
                          <td><?= $status[$data->is_show] ?></td>
                          <td>
                            <button class="btn btn-sm btn-outline-secondary" type="button" data-toggle="modal" data-target="#modal-edit-questionnaire-<?= $data->id ?>">Edit</button>
                            <div class="modal fade" id="modal-edit-questionnaire-<?= $data->id ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="<?= base_url('admin/questionnaires/update') ?>" method="post">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Edit Kuisioner</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" name="id" id="id" class="form-control" required value="<?= $data->id ?>">
                                      <div class="form-group">
                                        <label for="">Judul Kuisioner</label>
                                        <input type="text" name="title" id="title" class="form-control" required value="<?= $data->title ?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="">Link</label>
                                        <input type="text" name="link" id="link" class="form-control" required value="<?= $data->link ?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="">Status</label>
                                        <span class="text-info" style="display: block; font-size: 12px; font-weight: bold;">pilih "Jadikan Kuisioner" agar kuisioner dapat diakses lewat link kuisioner</span>
                                        <select name="is_show" id="is_show" class="form-control">
                                          <option <?= ($data->is_show == 0) ? 'selected' : '' ?> value="0">Sembunyikan</option>
                                          <option <?= ($data->is_show == 1) ? 'selected' : '' ?> value="1">Jadikan Kuisioner</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-sm btn-primary">Edit Kuisioner</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            
                            <button class="btn btn-sm btn-outline-danger" type="button" data-toggle="modal" data-target="#modal-delete-questionnaire-<?= $data->id ?>">Hapus</button>
                            <div class="modal fade" id="modal-delete-questionnaire-<?= $data->id ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="<?= base_url('admin/questionnaires/delete') ?>" method="post">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Hapus Kuisioner</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" name="id" id="id" class="form-control" required value="<?= $data->id ?>">
                                      <p>Yakin ingin menghapus data kuisioner <?= $data->title ?></p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-sm btn-danger">Hapus Kuisioner</button>
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