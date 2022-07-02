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
                  <h5>Pesan Pengunjung</h5>
                </div>
                <div class="card-body">
                  <table class="table table-striped table-bordered table-hover table-data">
                    <thead>
                      <th>No</th>
                      <th>Pengunjung</th>
                      <th>Subjek</th>
                      <th>Pesan</th>
                      <th>Aksi</th>
                    </thead>
                    <tbody>
                      <?php $number = 1; foreach($datas as $data) { ?>
                        <tr>
                          <td><?= $number ?></td>
                          <td>
                            <p>Pengunjung: <?= $data->name ?></p>
                            <span class="badge badge-info">Email: <?= $data->email ?></span>
                            <span class="badge badge-secondary">Telepon: <?= $data->phone ?></span>
                          </td>
                          <td><?= $data->subject ?></td>
                          <td><?= $data->message ?></td>
                          <td><?= date( "d M Y", strtotime( $data->date ) ) ?></td>
                          <td>
                            <a href="https://mail.google.com/mail/u/0/?fs=1&to=<?= $data->email ?>&tf=cm" class="btn btn-sm btn-outline-info" target="_blank">Kirim Balasan Email</a>
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