<div class="content-body">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h5>Daftar <?= $page ?></h5>
        <button class="btn btn-xs btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal-tambah-penilaian">Tambah <?= $page ?></button>
        <div class="modal fade" id="modal-tambah-penilaian">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form action="<?= base_url('admin/penilaian/tambah') ?>" method="post">
                <div class="modal-header">
                  <h4 class="modal-title">Tambah <?= $page ?></h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal">
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="">Pasien</label>
                    <select name="pasien_id" id="pasien_id" class="form-control">
                      <?php foreach ($pasien as $pas) { ?>
                        <option value="<?= $pas->id ?>"><?= $pas->nama ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <?php foreach ($kriteria as $kri) { ?>
                    <div class="form-group">
                      <label for=""><?= $kri->nama ?></label>
                      <select name="kriteria_id[]" id="kriteria_id[]" class="form-control" required>
                      <?php foreach ($kri->subdatas as $subkriteria) { ?>
                        <option value="<?= $kri->id . ':' . $subkriteria->id ?>"><?= $subkriteria->nilai ?></option>
                      <?php } ?>
                      </select>
                    </div>
                  <?php } ?>
                </div>
                <div class="modal-footer justify-content-between">
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
          <table class="display example" style="min-width: 845px;">
            <thead>
              <tr>
                <th>No.</th>
                <th>Pasien</th>
                <?php foreach ($kriteria as $kri) { ?>
                  <th><?= $kri->nama ?></th>
                <?php } ?>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $number = 1; foreach ($datas as $data) {  ?>
                <tr>
                  <td><?= $number ?></td>
                  <td><?= $data->nama ?></td>
                  <?php foreach ($kriteria as $kri) { ?>
                    <td><?= $data->penilaian[$kri->id] ?></td>
                  <?php } ?>
                  <td>
                    <button class="btn btn-xs btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal-ubah-penilaian-<?= $data->id ?>">Ubah</button>
                    <div class="modal fade" id="modal-ubah-penilaian-<?= $data->id ?>">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <form action="<?= base_url('admin/penilaian/ubah') ?>" method="post">
                            <div class="modal-header">
                              <h4 class="modal-title">Ubah <?= $page ?></h4>
                              <button type="button" class="btn-close" data-bs-dismiss="modal">
                              </button>
                            </div>
                            <div class="modal-body">
                              <input type="hidden" name="pasien_id" id="pasien_id" class="form-control" required value="<?= $data->id ?>">
                              <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" value="<?= $data->nama ?>" disabled>
                              </div>
                              <?php foreach ($kriteria as $kri) { ?>
                                <div class="form-group">
                                  <label for=""><?= $kri->nama ?></label>
                                  <select name="kriteria_id[]" id="kriteria_id[]" class="form-control" required>
                                  <?php foreach ($kri->subdatas as $subkriteria) { ?>
                                    <option <?php if($subkriteria->nilai == $data->penilaian[$kri->id]) echo 'selected'; ?>  value="<?= $kri->id . ':' . $subkriteria->id ?>"><?= $subkriteria->nilai ?></option>
                                  <?php } ?>
                                  </select>
                                </div>
                              <?php } ?>
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-sm btn-default" data-bs-dismiss="modal">Batal</button>
                              <button type="submit" class="btn btn-sm btn-primary">Ubah <?= $page ?></button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <button class="btn btn-xs btn-outline-danger" type="button" data-bs-toggle="modal" data-bs-target="#modal-hapus-penilaian-<?= $data->id ?>">Hapus</button>
                    <div class="modal fade" id="modal-hapus-penilaian-<?= $data->id ?>">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <form action="<?= base_url('admin/penilaian/hapus') ?>" method="post">
                            <div class="modal-header">
                              <h4 class="modal-title">Hapus <?= $page ?></h4>
                              <button type="button" class="btn-close" data-bs-dismiss="modal">
                              </button>
                            </div>
                            <div class="modal-body">
                              <input type="hidden" name="id" id="id" class="form-control" required value="<?= $data->id ?>">
                              <p>Yakin ingin menghapus penilaian <?= $data->nama ?></p>
                            </div>
                            <div class="modal-footer justify-content-between">
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