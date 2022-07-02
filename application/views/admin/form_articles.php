    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?= $page ?></h1>
              <button class="btn btn-sm btn-secondary" onclick="history.back()">Batal</button>
            </div>
          </div>
        </div>
      </div>
      
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <form action="<?= $url ?>" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="">Judul Berita</label>
                      <input type="text" name="title" id="title" class="form-control" value="<?= isset( $data ) ? $data->title : "" ?>">
                    </div>
                    <div class="form-group">
                      <?php if(isset($data)): ?>
                        <input type="hidden" name="id" name="id" value="<?= $data->id ?>" class="form-control">
                        <input type="hidden" name="slug" name="slug" value="<?= $data->slug ?>" class="form-control">
                        <input type="hidden" name="filename" name="filename" value="<?= $data->file ?>" class="form-control">
                        <img src="<?= base_url('uploads/articles/thumbnails/') . $data->thumbnail ?>" width="120px" alt="Thumbnail Berita"><br>
                      <?php endif; ?>
                      <label for="">Thumbnail Berita</label>
                      <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="">Tanggal Posting</label>
                      <input type="date" name="post_date" id="post_date" class="form-control" value="<?= isset( $data ) ? $data->post_date : '' ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Deskripsi</label>
                      <textarea name="description" id="description" class="form-control"><?= (isset($data)) ? $data->description : '' ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="">Konten</label>
                      <textarea name="content" id="content" class="form-control summernote_form"><?= (isset($data)) ? $data->file_content : '' ?></textarea>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-primary">Simpan Berita</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>