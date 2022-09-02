  <div class="deznav">
    <div class="deznav-scroll">
      <ul class="metismenu" id="menu">
        <li>
          <a href="<?= base_url('admin/dashboard') ?>" class="ai-icon" aria-expanded="false" id="dashboard_index">
            <i class="flaticon-381-blueprint"></i>
            <span class="nav-text">Beranda</span>
          </a>
        </li>
        <li>
          <a href="<?= base_url('admin/gizi') ?>" class="ai-icon" aria-expanded="false" id="gizi_index">
            <i class="flaticon-381-heart"></i>
            <span class="nav-text">Informasi Gizi</span>
          </a>
        </li>
        <li>
          <a href="<?= base_url('admin/gizi/foto') ?>" class="ai-icon" aria-expanded="false" id="foto_gizi_index">
            <i class="flaticon-381-heart"></i>
            <span class="nav-text">Foto Gizi Buruk</span>
          </a>
        </li>
        <?php if( $this->session->userdata('role_name') == 'admin' ): ?>
        <li>
          <a href="<?= base_url('admin/kriteria') ?>" class="ai-icon" aria-expanded="false" id="kriteria_index">
            <i class="flaticon-381-reading"></i>
            <span class="nav-text">Data Kriteria</span>
          </a>
        </li>
        <li>
          <a href="<?= base_url('admin/subkriteria') ?>" class="ai-icon" aria-expanded="false" id="subkriteria_index">
            <i class="flaticon-381-pad"></i>
            <span class="nav-text">Data Subkriteria</span>
          </a>
        </li>
        <li>
          <a href="<?= base_url('admin/pasien') ?>" class="ai-icon" aria-expanded="false" id="pasien_index">
            <i class="flaticon-381-user-8"></i>
            <span class="nav-text">Data Pasien</span>
          </a>
        </li>
        <li>
          <a href="<?= base_url('admin/penilaian') ?>" class="ai-icon" aria-expanded="false" id="penilaian_index">
            <i class="flaticon-381-list-1"></i>
            <span class="nav-text">Data Penilaian</span>
          </a>
        </li>
        <?php endif; ?>
        <li>
          <a href="<?= base_url('admin/perhitungan') ?>" class="ai-icon" aria-expanded="false" id="perhitungan_index">
            <i class="flaticon-381-notepad"></i>
            <span class="nav-text">Data Perhitungan</span>
          </a>
        </li>
        <li>
          <a href="<?= base_url('admin/hasil') ?>" class="ai-icon" aria-expanded="false" id="hasil_index">
            <i class="flaticon-381-resume"></i>
            <span class="nav-text">Data Hasil</span>
          </a>
        </li>
      </ul>
    </div>
  </div>