<div class="content-body">
  <div class="container-fluid">
    <div class="d-flex align-items-start flex-wrap justify-content-between mb-3">
      <div class="me-auto d-lg-block">
        <h3 class="text-primary font-w600">Daftar <?= $page ?></h3>
      </div>
    </div>
    <div class="row">
      <?php $number = 1; foreach ($datas as $data) {  ?>
      <div class="card">
        <div class="card-body">
          <button class="btn btn-xs btn-primary mb-3" type="button" data-bs-toggle="modal" data-bs-target="#modal-tambah-subkriteria-<?= $data->id ?>">Tambah <?= $page ?></button>
          <div class="modal fade" id="modal-tambah-subkriteria-<?= $data->id ?>">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form action="<?= base_url('admin/subkriteria/tambah') ?>" method="post">
                  <div class="modal-header">
                    <h4 class="modal-title">Tambah <?= $page ?></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
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
                    <button type="button" class="btn btn-sm btn-default" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-sm btn-primary">Tambah <?= $page ?></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="accordion accordion-primary" id="accordion-kriteria-<?= $data->id ?>">
            <div class="accordion-item">
              <div class="accordion-header collapsed rounded-lg" id="<?= $data->nama ?>" data-bs-toggle="collapse" data-bs-target="#tabel-kriteria-<?= $data->id ?>" aria-controls="tabel-kriteria-<?= $data->id ?>" aria-expanded="true" role="button">
                <span class="accordion-header-text"><?= $data->nama ?></span>
                <span class="accordion-header-indicator"></span>
              </div>
              <div id="tabel-kriteria-<?= $data->id ?>" class="collapse" aria-labelledby="<?= $data->nama ?>" data-bs-parent="#accordion-one">
                <div class="accordion-body-text">
                  <div class="table-responsive">
                    <table class="example display" style="min-width: 845px">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th><?= $data->nama ?></th>
                          <th>Keterangan</th>
                          <th>Bobot</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $number = 1; foreach ($data->subdatas as $subdata) {  ?>
                          <tr>
                            <td><?= $number ?></td>
                            <td><?= $subdata->nilai ?></td>
                            <td><?= $subdata->keterangan ?></td>
                            <td><?= $subdata->bobot ?></td>
                            <td>
                              <button class="btn btn-xs btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal-ubah-subkriteria-<?= $subdata->id ?>">Ubah</button>
                              <div class="modal fade" id="modal-ubah-subkriteria-<?= $subdata->id ?>">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <form action="<?= base_url('admin/subkriteria/ubah') ?>" method="post">
                                      <div class="modal-header">
                                        <h4 class="modal-title">Ubah <?= $page ?></h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
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
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-xs btn-danger light" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-xs btn-primary">Ubah</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                              <button class="btn btn-xs btn-outline-danger" type="button" data-bs-toggle="modal" data-bs-target="#modal-hapus-subkriteria-<?= $subdata->id ?>">Hapus</button>
                              <div class="modal fade" id="modal-hapus-subkriteria-<?= $subdata->id ?>">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <form action="<?= base_url('admin/subkriteria/hapus') ?>" method="post">
                                      <div class="modal-header">
                                        <h4 class="modal-title">Hapus <?= $page ?></h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <input type="hidden" name="id" id="id" class="form-control" required value="<?= $subdata->id ?>">
                                        <p>Yakin ingin menghapus <?= $page . ' ' . $data->nama . ', ' . $subdata->nilai ?></p>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-xs btn-primary light" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-xs btn-danger">Hapus <?= $page ?></button>
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
    <?php $number++; } ?>
    </div>
  </div>
</div>