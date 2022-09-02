<div class="content-body">
  <div class="container-fluid">
    <div class="d-flex align-items-start flex-wrap justify-content-between mb-3">
      <div class="me-auto d-lg-block">
        <h3 class="text-primary font-w600">Daftar <?= $page ?></h3>
        <button class="btn btn-xs btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal-tambah-kriteria">Tambah <?= $page ?></button>
        <div class="modal fade" id="modal-tambah-kriteria">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form action="<?= base_url('admin/kriteria/tambah') ?>" method="post">
                <div class="modal-header">
                  <h4 class="modal-title">Tambah <?= $page ?></h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal">
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="">Kode</label>
                    <input type="text" class="form-control" name="kode" id="kode" required>
                  </div>
                  <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" required>
                  </div>
                  <div class="form-group">
                    <label for="">Bobot</label>
                    <input type="number" class="form-control" name="bobot" id="bobot" required>
                  </div>
                  <div class="form-group">
                    <label for="">Jenis</label>
                    <select name="jenis" id="jenis" class="form-control">
                      <option value="benefit"><i>Benefit</i></option>
                      <option value="cost"><i>Cost</i></option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Tipe Inputan</label>
                    <select name="tipe" id="tipe" class="form-control">
                      <option value="1"><i>Selection</i></option>
                      <option value="2"><i>Manual</i></option>
                    </select>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-xs btn-danger light" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-xs btn-primary">Tambah <?= $page ?></button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="example display" style="min-width: 845px">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Kode Kriteria</th>
                  <th>Nama Kriteria</th>
                  <th>Bobot</th>
                  <th>Jenis</th>
                  <th>Inputan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $inputan = ['', 'Selection', 'Manual']; $number = 1; foreach ($datas as $data) {  ?>
                  <tr>
                    <td><?= $number ?></td>
                    <td><?= $data->kode ?></td>
                    <td><?= $data->nama ?></td>
                    <td><?= $data->bobot ?></td>
                    <td><i><?= ucwords($data->jenis); ?></i></td>
                    <td><?= $inputan[$data->tipe] ?></td>
                    <td>
                    <button class="btn btn-xs btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal-ubah-kriteria-<?= $data->id ?>">Ubah</button>
                      <div class="modal fade" id="modal-ubah-kriteria-<?= $data->id ?>">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <form action="<?= base_url('admin/kriteria/ubah') ?>" method="post">
                              <div class="modal-header">
                                <h4 class="modal-title">Ubah <?= $page ?></h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                </button>
                              </div>
                              <div class="modal-body">
                                <input type="hidden" name="id" id="id" class="form-control" required value="<?= $data->id ?>">
                                <div class="form-group">
                                  <label for="">Kode</label>
                                  <input type="text" class="form-control" name="kode" id="kode" value="<?= $data->kode ?>">
                                </div>
                                <div class="form-group">
                                  <label for="">Nama</label>
                                  <input type="text" class="form-control" name="nama" id="nama" value="<?= $data->nama ?>">
                                </div>
                                <div class="form-group">
                                  <label for="">Bobot</label>
                                  <input type="number" class="form-control" name="bobot" id="bobot" value="<?= $data->bobot ?>">
                                </div>
                                <div class="form-group">
                                  <label for="">Jenis</label>
                                  <select name="jenis" id="jenis" class="form-control">
                                    <option <?php if( $data->jenis == 'benefit' ) echo 'selected'; ?> value="benefit">Benefit</option>
                                    <option <?php if( $data->jenis == 'cost' ) echo 'selected'; ?> value="cost">Cost</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="">Tipe Inputan</label>
                                  <select name="tipe" id="tipe" class="form-control">
                                    <option <?php if( $data->tipe == 1 ) echo 'selected'; ?> value="1"><i>Selection</i></option>
                                    <option <?php if( $data->tipe == 2 ) echo 'selected'; ?> value="2"><i>Manual</i></option>
                                  </select>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-danger light" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-sm btn-primary">Ubah <?= $page ?></button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <button class="btn btn-xs btn-outline-danger" type="button" data-bs-toggle="modal" data-bs-target="#modal-hapus-kriteria-<?= $data->id ?>">Hapus</button>
                      <div class="modal fade" id="modal-hapus-kriteria-<?= $data->id ?>">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <form action="<?= base_url('admin/kriteria/hapus') ?>" method="post">
                              <div class="modal-header">
                                <h4 class="modal-title">Hapus <?= $page ?></h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                </button>
                              </div>
                              <div class="modal-body">
                                <input type="hidden" name="id" id="id" class="form-control" required value="<?= $data->id ?>">
                                <p>Yakin ingin menghapus kriteria <?= $data->nama ?></p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-primary light" data-bs-dismiss="modal">Batal</button>
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
</div>