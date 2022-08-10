<div class="content-body">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h5>Daftar <?= $page ?></h5>
        <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal-tambah-pasien">Tambah <?= $page ?></button>
        <div class="modal fade" id="modal-tambah-pasien">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form action="<?= base_url('admin/pasien/tambah') ?>" method="post">
                <div class="modal-header">
                  <h4 class="modal-title">Tambah <?= $page ?></h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal">
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-sm btn-default" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-sm btn-primary">Tambah <?= $page ?></button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="display example" style="min-width: 845px">
            <thead>
              <tr>
                <th>No.</th>
                <th>Pasien</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $number = 1; foreach ($datas as $data) {  ?>
                <tr>
                  <td><?= $number ?></td>
                  <td><?= $data->nama ?></td>
                  <td>
                    <button class="btn btn-xs btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal-ubah-pasien-<?= $data->id ?>">Ubah</button>
                    <div class="modal fade" id="modal-ubah-pasien-<?= $data->id ?>">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <form action="<?= base_url('admin/pasien/ubah') ?>" method="post">
                            <div class="modal-header">
                              <h4 class="modal-title">Ubah <?= $page ?></h4>
                              <button type="button" class="btn-close" data-bs-dismiss="modal">
                              </button>
                            </div>
                            <div class="modal-body">
                              <input type="hidden" name="id" id="id" class="form-control" required value="<?= $data->id ?>">
                              <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" value="<?= $data->nama ?>">
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-sm btn-default" data-bs-dismiss="modal">Batal</button>
                              <button type="submit" class="btn btn-sm btn-primary">Ubah <?= $page ?></button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <button class="btn btn-xs btn-outline-danger" type="button" data-bs-toggle="modal" data-bs-target="#modal-hapus-pasien-<?= $data->id ?>">Hapus</button>
                    <div class="modal fade" id="modal-hapus-pasien-<?= $data->id ?>">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <form action="<?= base_url('admin/pasien/hapus') ?>" method="post">
                            <div class="modal-header">
                              <h4 class="modal-title">Hapus <?= $page ?></h4>
                              <button type="button" class="btn-close" data-bs-dismiss="modal">
                              </button>
                            </div>
                            <div class="modal-body">
                              <input type="hidden" name="id" id="id" class="form-control" required value="<?= $data->id ?>">
                              <p>Yakin ingin menghapus pasien <?= $data->nama ?></p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-sm btn-default" data-bs-dismiss="modal">Batal</button>
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
  </div>
</div>