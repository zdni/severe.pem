<div class="content-body">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">

          </div>
          <div class="card-body">
            <table class="example display" style="min-width: 845px">
              <thead>
                <th>No.</th>
                <th>Pasien</th>
                <th>Hasil</th>
                <th>Ranking</th>
              </thead>
              <tbody>
                <?php $number = 1; foreach ($datas as $data) {  ?>
                  <tr>
                    <td><?= $number ?></td>
                    <td><?= $data->nama ?></td>
                    <td><?= $data->ui ?></td>
                    <td><?= $data->ranking ?></td>
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