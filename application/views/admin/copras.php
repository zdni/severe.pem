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
                      <th><?= $kri->nama ?></th>
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
                      <th><?= $kri->nama ?></th>
                    <?php } ?>
                  </tr>
                </thead>
                <tbody>
                  <?php $number = 1; foreach ($normalisasi_matriks as $pasien => $data) { ?>
                    <tr>
                      <td><?= $number ?></td>
                      <td><?= $pasien ?></td>
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
                    <th><?= $kri->nama ?></th>
                  <?php } ?>
                </thead>
                <tbody>
                  <?php $number = 1; foreach ($matriks_dij as $pasien => $data) { ?>
                    <tr>
                      <td><?= $number ?></td>
                      <td><?= $pasien ?></td>
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
                </thead>
                <tbody>
                  <?php $number = 1; foreach ($datas as $pasien => $data) {  ?>
                    <tr>
                      <td><?= $number ?></td>
                      <td><?= $pasien ?></td>
                      <td><?= $data['hasil'] ?></td>
                      <td><?= $data['rank'] ?></td>
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