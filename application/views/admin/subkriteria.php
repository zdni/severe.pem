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
            <?php foreach ($datas as $data) { ?>
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">
                      <h5><?= $data->nama ?></h5>
                    </div>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                  </div>
                  <div class="card-body">
                    <button class="btn btn-sm btn-primary mb-3" type="button" data-toggle="modal" data-target="#modal-tambah-subkriteria-<?= $data->id ?>">Tambah <?= $page ?></button>
                    <div class="modal fade" id="modal-tambah-subkriteria-<?= $data->id ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <form action="<?= base_url('admin/subkriteria/tambah') ?>" method="post">
                            <div class="modal-header">
                              <h4 class="modal-title">Tambah <?= $page ?></h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <input type="hidden" name="kriteria_id" id="kriteria_id" class="form-control" required value="<?= $data->id ?>">
                              <div class="form-group">
                                <label for=""><?= $data->nama ?></label>
                                <input type="text" class="form-control" name="nilai" id="nilai">
                              </div>
                              <div class="form-group">
                                <label for="">Keterangan</label>
                                <input type="text" class="form-control" name="keterangan" id="keterangan">
                              </div>
                              <div class="form-group">
                                <label for="">Bobot</label>
                                <input type="number" class="form-control" name="bobot" id="bobot">
                              </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                              <button type="submit" class="btn btn-sm btn-primary">Tambah <?= $page ?></button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <table class="table table-bordered table-striped table-hover">
                      <thead>
                        <th>No.</th>
                        <th><?= $data->nama ?></th>
                        <th>Keterangan</th>
                        <th>Bobot</th>
                        <th>Aksi</th>
                      </thead>
                      <tbody>
                        <?php $number = 1; foreach ($data->subdatas as $subdata) {  ?>
                          <tr>
                            <td><?= $number ?></td>
                            <td><?= $subdata->nilai ?></td>
                            <td><?= $subdata->keterangan ?></td>
                            <td><?= $subdata->bobot ?></td>
                            <td>
                              <button class="btn btn-sm btn-outline-primary" type="button" data-toggle="modal" data-target="#modal-ubah-subkriteria-<?= $subdata->id ?>">Ubah</button>
                              <div class="modal fade" id="modal-ubah-subkriteria-<?= $subdata->id ?>">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <form action="<?= base_url('admin/subkriteria/ubah') ?>" method="post">
                                      <div class="modal-header">
                                        <h4 class="modal-title">Ubah <?= $page ?></h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <input type="hidden" name="id" id="id" class="form-control" required value="<?= $subdata->id ?>">
                                        <div class="form-group">
                                          <label for=""><?= $data->nama ?></label>
                                          <input type="text" class="form-control" name="nilai" id="nilai" value="<?= $subdata->nilai ?>">
                                        </div>
                                        <div class="form-group">
                                          <label for="">Keterangan</label>
                                          <input type="text" class="form-control" name="keterangan" id="keterangan" value="<?= $subdata->keterangan ?>">
                                        </div>
                                        <div class="form-group">
                                          <label for="">Bobot</label>
                                          <input type="number" class="form-control" name="bobot" id="bobot" value="<?= $subdata->bobot ?>">
                                        </div>
                                      </div>
                                      <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                              <button class="btn btn-sm btn-outline-danger" type="button" data-toggle="modal" data-target="#modal-hapus-subkriteria-<?= $subdata->id ?>">Hapus</button>
                              <div class="modal fade" id="modal-hapus-subkriteria-<?= $subdata->id ?>">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <form action="<?= base_url('admin/subkriteria/hapus') ?>" method="post">
                                      <div class="modal-header">
                                        <h4 class="modal-title">Hapus <?= $page ?></h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <input type="hidden" name="id" id="id" class="form-control" required value="<?= $subdata->id ?>">
                                        <p>Yakin ingin menghapus <?= $page . ' ' . $data->nama . ', ' . $subdata->nilai ?></p>
                                      </div>
                                      <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus <?= $page ?></button>
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
            <?php } ?>
          </div>
        </div>
      </div>
    </div>