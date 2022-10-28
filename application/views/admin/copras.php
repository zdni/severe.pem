<div class="content-body">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h5>Matriks Nilai</h5>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Pasien</th>
                    <?php foreach ($kriteria as $kri) { ?>
                      <th style="white-space: normal"><?= $kri->nama ?></th>
                    <?php } ?>
                  </tr>
                </thead>
                <tbody>
                  <?php $number = 1; foreach ($pasien as $data) {  ?>
                    <tr>
                      <td><?= $number ?></td>
                      <td><?= $data->nama ?></td>
                      <?php foreach ($kriteria as $kri) { ?>
                        <td><?= $data->penilaian[$kri->id] ?></td>
                      <?php } ?>
                    </tr>                        
                  <?php $number++; } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h5>Normalisasi Matriks</h5>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Pasien</th>
                    <?php foreach ($kriteria as $kri) { ?>
                      <th style="white-space: normal"><?= $kri->nama ?></th>
                    <?php } ?>
                  </tr>
                </thead>
                <tbody>
                  <?php $number = 1; foreach ($normalisasi_matriks as $pas => $data) { ?>
                    <tr>
                      <td><?= $number ?></td>
                      <td><?= $pas ?></td>
                      <?php foreach ($kriteria as $kri) { ?>
                        <td><?= $data[$kri->id] ?></td>
                      <?php } ?>
                    </tr>                        
                  <?php $number++; } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h5>Matriks D<sub>ij</sub></h5>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped table-hover">
                <thead>
                  <th>No.</th>
                  <th>Pasien</th>
                  <?php foreach ($kriteria as $kri) { ?>
                    <th style="white-space: normal"><?= $kri->nama ?></th>
                  <?php } ?>
                </thead>
                <tbody>
                  <?php $number = 1; foreach ($matriks_dij as $pas => $data) { ?>
                    <tr>
                      <td><?= $number ?></td>
                      <td><?= $pas ?></td>
                      <?php foreach ($kriteria as $kri) { ?>
                        <td><?= round($data[$kri->id], 2) ?></td>
                      <?php } ?>
                    </tr>                        
                  <?php $number++; } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h5>Maksimal dan Minimal Index</h5>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped table-hover">
                <thead>
                  <th>No.</th>
                  <th>Pasien</th>
                  <th>S+i</th>
                  <th>S-i</th>
                </thead>
                <tbody>
                  <?php $number = 1; foreach ($pasien as $data) { ?>
                    <tr>
                      <td><?= $number ?></td>
                      <td><?= $data->nama ?></td>
                      <td><?= $s_plus_i_array[$data->nama] ?></td>
                      <td><?= $s_min_i_array[$data->nama] ?></td>
                    </tr>                        
                  <?php $number++; } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h5>Matriks Bobot Relatif</h5>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped table-hover">
                <thead>
                  <th>No.</th>
                  <th>Pasien</th>
                  <th>Q<sub>i</sub></th>
                </thead>
                <tbody>
                  <?php $number = 1; foreach ($q_i as $pas => $data) { ?>
                    <tr>
                      <td><?= $number ?></td>
                      <td><?= $pas ?></td>
                      <td><?= $data ?></td>
                    </tr>                        
                  <?php $number++; } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="2">Max Q<sub>i</sub></td>
                    <td><?= $max_q ?></td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h5>Hasil</h5>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped table-hover">
                <thead>
                  <th>No.</th>
                  <th>Pasien</th>
                  <th>Hasil</th>
                  <th>Ranking</th>
                  <th>Status</th>
                </thead>
                <tbody>
                  <?php $number = 1; foreach ($datas as $pasien => $data) {  ?>
                    <tr>
                      <td><?= $number ?></td>
                      <td><?= $pasien ?></td>
                      <td><?= $data['hasil'] ?></td>
                      <td><?= $data['rank'] ?></td>
                      <td><?= $status[ ceil($data['hasil']/0.25)-1 ] ?></td>
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