<div class="content-body">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h5><?= $page ?></h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-responsive-md" style="min-width: 845px">
            <thead>
              <tr>
                <th>No.</th>
                <th>Kriteria</th>
                <th>Nilai</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($datas as $data) { ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td><?= $data->nama; ?></td>
                  <td><?= $data->nilai; ?></td>
                  <td><?= $data->keterangan; ?></td>
                </tr>
              <?php $no++; } ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer">
        <button class="btn btn-xs btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal-ubah-penilaian">Ubah</button>
        <div class="modal fade" id="modal-ubah-penilaian">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form action="<?= base_url('admin/penilaian/ubah_penilaian') ?>" method="post">
                <div class="modal-header">
                  <h4 class="modal-title">Ubah</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal">
                  </button>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="pasien_id" id="pasien_id" value="<?= $pasien_id ?>">
                  <?php foreach ($datas as $kri) { ?>
                    <div class="form-group">
                      <label for=""><?= $kri->nama ?></label>
                      <div class="row">
                        <div class="col">
                          <select name="kriteria_id[]" id="kriteria_id[]" class="form-control" required>
                          <?php foreach ($kri->subdatas as $subkriteria) { ?>
                            <option value="<?= $kri->id . ':' . $subkriteria->id ?>" <?php if( $subkriteria->id == $kri->subkriteria_id ) echo 'selected'; ?>><?= $subkriteria->nilai ?></option>
                          <?php } ?>
                          </select>
                        </div>
                        <?php if( $kri->tipe == 2 ): ?>
                          <div class="col">
                            <input type="text" class="form-control" name="manual_value[<?= $kri->id ?>]" id="manual_value[<?= $kri->id ?>]" value="<?php if( $kri->nilai != '-' ) echo $kri->nilai ?>" required>
                          </div>
                        <?php endif;?>
                      </div>
                    </div>
                  <?php } ?>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-sm btn-default" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>