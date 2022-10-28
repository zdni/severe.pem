<div class="content-body">
  <div class="container-fluid">
    <div class="form-head d-flex align-items-start flex-wrap justify-content-between">
      <div class="me-auto d-lg-block">
        <h3 class="text-primary font-w600"><?= $page ?></h3>
      </div>
    </div>
    <div class="row mt-3">
      <div class="card">
        <form action="<?= base_url('admin/gizi/edit_artikel') ?>" method="post">
        <input type="hidden" name="artikel" value="1">
          <div class="card-header">
            <button type="submit" class="btn btn-xs btn-primary">Simpan</button>
          </div>
          <div class="card-body">
            <textarea id="ckeditor" name="content" cols="30" rows="10"><?= $artikel ?></textarea>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>