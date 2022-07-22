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
                  <h5>Daftar <?= $page ?></h5>
                  <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#modal-tambah-kriteria">Tambah <?= $page ?></button>
                  <div class="modal fade" id="modal-tambah-kriteria">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form action="<?= base_url('admin/kriteria/tambah') ?>" method="post">
                          <div class="modal-header">
                            <h4 class="modal-title">Tambah <?= $page ?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="">Kode</label>
                              <input type="text" class="form-control" name="kode" id="kode">
                            </div>
                            <div class="form-group">
                              <label for="">Nama</label>
                              <input type="text" class="form-control" name="nama" id="nama">
                            </div>
                            <div class="form-group">
                              <label for="">Bobot</label>
                              <input type="number" class="form-control" name="bobot" id="bobot">
                            </div>
                            <div class="form-group">
                              <label for="">Jenis</label>
                              <select name="jenis" id="jenis" class="form-control">
                                <option value="benefit"><i>Benefit</i></option>
                                <option value="cost"><i>Cost</i></option>
                              </select>
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
                </div>
                <div class="card-body">
                  <table class="table table-bordered table-striped table-hover table-data">
                    <thead>
                      <th>No.</th>
                      <th>Kode Kriteria</th>
                      <th>Nama Kriteria</th>
                      <th>Bobot</th>
                      <th>Jenis</th>
                      <th>Aksi</th>
                    </thead>
                    <tbody>
                      <?php $number = 1; foreach ($datas as $data) {  ?>
                        <tr>
                          <td><?= $number ?></td>
                          <td><?= $data->kode ?></td>
                          <td><?= $data->nama ?></td>
                          <td><?= $data->bobot ?></td>
                          <td><i><?= ucwords($data->jenis); ?></i></td>
                          <td>
                            <button class="btn btn-sm btn-outline-primary" type="button" data-toggle="modal" data-target="#modal-ubah-kriteria-<?= $data->id ?>">Ubah</button>
                            <div class="modal fade" id="modal-ubah-kriteria-<?= $data->id ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="<?= base_url('admin/kriteria/ubah') ?>" method="post">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Ubah <?= $page ?></h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
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
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-sm btn-primary">Ubah <?= $page ?></button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <button class="btn btn-sm btn-outline-danger" type="button" data-toggle="modal" data-target="#modal-hapus-kriteria-<?= $data->id ?>">Hapus</button>
                            <div class="modal fade" id="modal-hapus-kriteria-<?= $data->id ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="<?= base_url('admin/kriteria/hapus') ?>" method="post">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Hapus <?= $page ?></h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" name="id" id="id" class="form-control" required value="<?= $data->id ?>">
                                      <p>Yakin ingin menghapus kriteria <?= $data->nama ?></p>
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
          </div>
        </div>
      </div>
    </div>