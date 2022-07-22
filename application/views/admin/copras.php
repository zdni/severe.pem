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
                  <h5>Matriks Nilai</h5>
                </div>
                <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                      <th>No.</th>
                      <th>Pasien</th>
                      <?php foreach ($kriteria as $kri) { ?>
                        <th><?= $kri->nama ?></th>
                      <?php } ?>
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
        </div>
      </div>
    </div>