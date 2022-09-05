<div class="content-body">
  <div class="container-fluid">
    <div class="form-head d-flex align-items-start flex-wrap justify-content-between">
      <div class="me-auto d-lg-block">
        <h3 class="text-primary font-w600">Selamat Datang</h3>
      </div>
    </div>
    <div class="row">
      <?php if( in_array($this->session->userdata('role_name'), ['admin', 'uadmin']) ): ?>
      <div class="col-xl-6 col-xxl-6">
        <div class="row">
          <div class="col-xl-6 col-lg-3 col-sm-6">
            <div class="app-stat card bg-danger">
              <div class="card-body  p-4">
                <div class="media flex-wrap">
                  <span class="me-3">
                    <i class="flaticon-381-reading"></i>
                  </span>
                  <div class="media-body text-white text-end">
                    <p class="mb-1">Data Kriteria</p>
                    <h3 class="text-white"><?= $kriteria ?></h3>
                  </div>
                </div>
              </div>
            </div>
          </div>	
          <div class="col-xl-6 col-lg-3 col-sm-6">
            <div class="app-stat card bg-success">
              <div class="card-body p-4">
                <div class="media flex-wrap">
                  <span class="me-3">
                    <i class="flaticon-381-user-8"></i>
                  </span>
                  <div class="media-body text-white text-end">
                    <p class="mb-1 text-nowrap">Data Pasien</p>
                    <h3 class="text-white"><?= $pasien ?></h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-3 col-sm-6">
            <div class="app-stat card bg-info">
              <div class="card-body p-4">
                <div class="media flex-wrap">
                  <span class="me-3">
                    <i class="flaticon-381-list-1"></i>
                  </span>
                  <div class="media-body text-white text-end">
                    <p class="mb-1 text-nowrap">Data Penilaian</p>
                    <h3 class="text-white"><?= $penilaian ?></h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-3 col-sm-6">
            <div class="app-stat card bg-primary">
              <div class="card-body p-4">
                <div class="media flex-wrap">
                  <span class="me-3">
                    <i class="flaticon-381-pad"></i>
                  </span>
                  <div class="media-body text-white text-end">
                    <p class="mb-1">Data Subkriteria</p>
                    <h3 class="text-white"><?= $subkriteria ?></h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endif; ?>
      <div class="col-xl-6 col-xxl-6">
        <div class="card">
          <div class="card-header">
            <h3>Hitung Indek Massa Tubuh (IMT)</h3>
          </div>
          <div class="card-body" id="card-imt">
            <div class="form-group">
              <label for="">Berat Badan (kg)</label>
              <input type="number" name="bb" id="bb" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Tinggi Badan (cm)</label>
              <input type="number" name="tb" id="tb" class="form-control" required>
            </div>
            <div class="form-group">
              <button class="btn btn-sm btn-primary" id="btn-hitung-imt">Hitung IMT</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>