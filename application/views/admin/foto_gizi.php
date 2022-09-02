<div class="content-body">
    <div class="container-fluid">
        <?php if( $this->session->userdata('role_name') == 'admin' ): ?>
        <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal-tambah-foto-gizi-buruk">Tambah <?= $page ?></button>
        <div class="modal fade" id="modal-tambah-foto-gizi-buruk">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?= base_url('admin/gizi/tambah') ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah <?= $page ?></h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Judul</label>
                                <input type="text" class="form-control" name="title" id="title">
                            </div>
                            <div class="form-group">
                                <label for="">Foto Gizi Buruk</label>
                                <input type="file" name="foto" id="foto" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-default" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-sm btn-primary">Tambah <?= $page ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="row mt-5">
            <?php foreach ($datas as $data) { ?>
                <div class="col-lg-12 col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row m-b-30">
                                <div class="col-md-5 col-xxl-12">
                                    <div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0">
                                        <div class="new-arrivals-img-contnent">
                                            <img class="img-fluid" src="<?= base_url('uploads/gizi/foto/') . $data->foto ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7 col-xxl-12">
                                    <div class="new-arrival-content position-relative">
                                        <h4><?= $data->title ?></h4>
                                        <?php if( $this->session->userdata('role_name') == 'admin' ): ?>
                                        <div class="comment-review star-rating">
                                            <span class="review-text"></span><a class="product-review" href=""  data-bs-toggle="modal" data-bs-target="#modal-hapus-foto-gizi-buruk-<?= $data->id ?>">Hapus Foto?</a>
                                        </div>
                                        <?php endif; ?>
                                        <p class="text-content"><?= $data->keterangan ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modal-hapus-foto-gizi-buruk-<?= $data->id ?>">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="<?= base_url('admin/gizi/hapus') ?>" method="post">
                                <div class="modal-header">
                                    <h5 class="modal-title">Hapus</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="id" id="id" value="<?= $data->id ?>">
                                    <p>Yakin ingin menghapus foto <?= $data->title ?>?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-default" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>