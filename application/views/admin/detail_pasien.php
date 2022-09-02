<div class="content-body">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h5><?= $pasien->nama ?></h5>
        <button onclick="history.back()" class="btn btn-xs btn-secondary">Kembali</button>
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
                  <td><?= $data->kriteria; ?></td>
                  <td><?= $data->tipe_kriteria == 2 ? $data->manual_value : $data->subkriteria; ?></td>
                  <td><?= $data->keterangan ?></td>
                </tr>
              <?php $no++; } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>