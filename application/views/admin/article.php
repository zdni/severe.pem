<div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?= $page ?></h1>
              <button class="btn btn-sm btn-secondary" onclick="history.back()">Kembali</button>
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
                  <h5><?= $data->title ?></h5>
                  <span class="badge badge-info">Dibuat Oleh <?= $data->username ?></span>
                  <span class="badge badge-secondary">Dibuat Pada Tanggal <?= date('d M Y', strtotime( $data->create_date )) ?></span>
                  <span class="badge badge-primary">Dipost Pada Tanggal <?= date('d M Y', strtotime( $data->post_date )) ?></span>
                </div>
                <div class="card-body">
                  <img src="<?= base_url('uploads/articles/thumbnails/') . $data->thumbnail ?>" alt="Thumbnail Berita" class="img-fluid">
                  <p><?= $data->description ?></p>
                  <p><?= $data->file_content ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>