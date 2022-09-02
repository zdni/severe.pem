<div class="content-body">
  <div class="container-fluid">
    <div class="form-head d-flex align-items-start flex-wrap justify-content-between">
      <div class="me-auto d-lg-block">
        <h3 class="text-primary font-w600"><?= $page ?></h3>
      </div>
    </div>
    <div class="row mt-3">
      <div class="card">
        <div class="card-body">
          <?= $artikel ?>
        </div>
        <?php if( $this->session->userdata('role_name') == 'admin' ): ?>
        <div class="card-footer">
          <a href="<?= base_url('admin/gizi/edit_artikel') ?>" class="btn btn-xs btn-secondary">Edit</a>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>