  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?= base_url() ?>" class="brand-link">
      <img src="<?= base_url('assets/') ?>img/logo.png" alt="Logo POLTEKKES KEMENKES MALUKU" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PEM</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= $user_image ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?= base_url('profile') ?>" class="d-block"><?= $name ?></a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <?php if( $this->session->userdata('role_name') == 'admin' ): ?>
          <li class="nav-item">
            <a href="<?= base_url('admin/dashboard') ?>" class="nav-link" id="dashboard_index">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/kriteria') ?>" class="nav-link" id="kriteria_index">
              <i class="nav-icon fas fa-info-circle"></i>
              <p>
                Data Kriteria
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/subkriteria') ?>" class="nav-link" id="subkriteria_index">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Data Subkriteria
              </p>
            </a>
          </li>
          <?php endif; ?>
          <li class="nav-item">
            <a href="<?= base_url('admin/pasien') ?>" class="nav-link" id="pasien_index">
              <i class="nav-icon fas fa-flask"></i>
              <p>
                Data Pasien
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/penilaian') ?>" class="nav-link" id="penilaian_index">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Data Penilaian
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/perhitungan') ?>" class="nav-link" id="perhitungan_index">
              <i class="nav-icon fas fa-image"></i>
              <p>
                Data Perhitungan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/hasil') ?>" class="nav-link" id="hasil_index">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Data Hasil
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>