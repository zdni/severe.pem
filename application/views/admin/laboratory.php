<div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?= $data->name ?></h1>
              <?php if( $this->session->userdata('role_name') == 'admin' ): ?>
              <button class="btn btn-sm btn-secondary" onclick="history.back()">Kembali</button>
              <?php endif; ?>
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
                  <h5>Admin Laboratorium</h5>  
                  <?php if( $this->session->userdata('role_name') == 'admin' ): ?>
                  <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#modal-create-admin-lab">Tambah</button>

                  <div class="modal fade" id="modal-create-admin-lab">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form action="<?= base_url('admin/users/create') ?>" method="post">
                          <input type="hidden" name="laboratory_id" id="laboratory_id" class="form-control" value="<?= $data->id ?>">
                          <div class="modal-header">
                            <h4 class="modal-title">Tambah Admin</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="">Username</label>
                              <span class="text-info" style="display: block; font-size: 12px; font-weight: bold;">Untuk username, gunakan kata tanpa spasi dan menggunakan huruf kecil. Username akan menjadi password. (contoh: username: user, maka passwordnya user) </span>
                              <input type="text" name="username" id="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <label for="">Nama</label>
                              <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-sm btn-primary">Tambah Admin</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <?php endif; ?>
                </div>
                <div class="card-body">
                  <table class="table table-bordered table-striped table-hover table-data">
                    <thead>
                      <th>No.</th>
                      <th>Username</th>
                      <th>Nama</th>
                      <?php if( $this->session->userdata('role_name') == 'admin' ): ?>
                        <th>Aksi</th>
                      <?php endif; ?>
                    </thead>
                    <tbody>
                      <?php $number = 1; foreach( $users as $user ) { ?>
                        <tr>
                          <td><?= $number ?></td>
                          <td><?= $user->username ?></td>
                          <td><?= $user->name ?></td>
                          <?php if( $this->session->userdata('role_name') == 'admin' ): ?>
                            <td>
                              <button class="btn btn-sm btn-outline-danger" type="button" data-toggle="modal" data-target="#modal-reset-user-<?= $user->id ?>">Reset Password</button>
                              <div class="modal fade" id="modal-reset-user-<?= $user->id ?>">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <form action="<?= base_url('admin/users/reset_password') ?>" method="post">
                                      <div class="modal-header">
                                        <h4 class="modal-title">Reset Password</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <input type="hidden" name="laboratory_id" id="laboratory_id" class="form-control" value="<?= $data->id ?>">
                                        <input type="hidden" name="id" id="id" class="form-control" required value="<?= $user->id ?>">
                                        <input type="hidden" name="username" id="username" class="form-control" required value="<?= $user->username ?>">
                                        <p>Yakin ingin mereset password admin <?= $user->username ?></p>
                                      </div>
                                      <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-sm btn-danger">Reset Password</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>

                              <button class="btn btn-sm btn-outline-danger" type="button" data-toggle="modal" data-target="#modal-delete-user-<?= $user->id ?>">Hapus</button>
                              <div class="modal fade" id="modal-delete-user-<?= $user->id ?>">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <form action="<?= base_url('admin/users/delete') ?>" method="post">
                                      <div class="modal-header">
                                        <h4 class="modal-title">Hapus Admin</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <input type="hidden" name="laboratory_id" id="laboratory_id" class="form-control" value="<?= $data->id ?>">
                                        <input type="hidden" name="id" id="id" class="form-control" required value="<?= $user->id ?>">
                                        <p>Yakin ingin menghapus admin <?= $user->username ?></p>
                                      </div>
                                      <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus Admin</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </td>
                          <?php endif; ?>
                        </tr>
                      <?php $number++; } ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card mt-5">
                <form action="<?= base_url('admin/laboratories/update') ?>" method="post">
                  <div class="card-header">
                    <h5><?= $data->name ?></h5>
                  </div>
                  <div class="card-body">
                    <input type="hidden" name="id" id="id" class="form-control" value="<?= $data->id ?>">
                    <input type="hidden" name="file" id="file" class="form-control" value="<?= $data->file ?>">
                    <input type="hidden" name="slug" id="slug" class="form-control" value="<?= $data->slug ?>">
                    <div class="form-group">
                      <label for="">Nama</label>
                      <input type="text"name="name" id="name" class="form-control" value="<?= $data->name ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Konten</label>
                      <textarea class="summernote_form" name="content" id="content"><?= $data->file_content ?></textarea>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-outline-primary" >Ubah Detail</button>
                  </div>
                </form>
              </div>
              <div class="card mt-5">
                <div class="card-header">
                  <h5>Daftar Bahan Ajar</h5>
                  <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#modal-create-moduls">Tambah</button>

                  <div class="modal fade" id="modal-create-moduls">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form action="<?= base_url('admin/moduls/create') ?>" method="post" enctype="multipart/form-data">
                          <input type="hidden" name="laboratory_id" id="laboratory_id" class="form-control" value="<?= $data->id ?>">
                          <div class="modal-header">
                            <h4 class="modal-title">Tambah Bahan Ajar</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="">Judul Bahan Ajar</label>
                              <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <label for="">File</label>
                              <input type="file" name="file" id="file" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <label for="">Tampilkan Bahan Ajar</label>
                              <select name="is_show" id="is_show" class="form-control">
                                <option value="1">Tampilkan</option>
                                <option value="0">Sembunyikan</option>
                              </select>
                            </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-sm btn-primary">Tambah Bahan Ajar</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-hover table-striped table-bordered table-data">
                    <thead>
                      <th>No</th>
                      <th>Bahan Ajar</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </thead>
                    <tbody>
                      <?php $status = ['Sembunyikan', 'Tampilkan'];  $number = 1; foreach ($moduls as $modul) { ?>
                        <tr>
                          <td><?= $number ?></td>
                          <td><?= $modul->title ?>
                            <br>
                            <span class="badge badge-info"><?= $modul->file ?></span>
                          </td>
                          <td><?= $status[ $modul->is_show ] ?></td>
                          <td>
                            <a href="<?= base_url('uploads/laboratories/moduls/') . $modul->file ?>" target="_blank" class="btn btn-sm btn-outline-primary">Lihat Modul</a>
                            <button class="btn btn-sm btn-outline-primary" type="button" data-toggle="modal" data-target="#modal-edit-modul-<?= $modul->id ?>">Edit</button>
                            <div class="modal fade" id="modal-edit-modul-<?= $modul->id ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="<?= base_url('admin/moduls/update') ?>" method="post" enctype="multipart/form-data">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Edit Bahan Ajar</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" name="laboratory_id" id="laboratory_id" class="form-control" value="<?= $data->id ?>">
                                      <input type="hidden" name="id" id="id" class="form-control" required value="<?= $modul->id ?>">
                                      <div class="form-group">
                                        <label for="">Judul Bahan Ajar</label>
                                        <input type="text" name="title" id="title" class="form-control" required value="<?= $modul->title ?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="">File</label>
                                        <span style="font-size: 12px; display: block; font-weight: bold; margin-top: -12px; margin-bottom: 7px;" class="text-info"><?= $modul->file ?></span>
                                        <input type="file" name="file" id="file" class="form-control">
                                      </div>
                                      <div class="form-group">
                                        <label for="">Tampilkan Bahan Ajar</label>
                                        <select name="is_show" id="is_show" class="form-control">
                                          <option <?= ($modul->is_show == 1) ? 'selected' : '' ?> value="1">Tampilkan</option>
                                          <option <?= ($modul->is_show == 0) ? 'selected' : '' ?> value="0">Sembunyikan</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-sm btn-primary">Edit Bahan Ajar</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>

                            <button class="btn btn-sm btn-outline-danger" type="button" data-toggle="modal" data-target="#modal-delete-modul-<?= $modul->id ?>">Hapus</button>
                            <div class="modal fade" id="modal-delete-modul-<?= $modul->id ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="<?= base_url('admin/moduls/delete') ?>" method="post">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Hapus Bahan Ajar</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" name="laboratory_id" id="laboratory_id" class="form-control" value="<?= $data->id ?>">
                                      <input type="hidden" name="id" id="id" class="form-control" required value="<?= $modul->id ?>">
                                      <p>Yakin ingin menghapus bahan ajar <?= $modul->title ?></p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-sm btn-danger">Hapus Bahan Ajar</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                      <?php $number++; } ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card">
                <div class="card-header">
                  <h5>Daftar Video Bahan Ajar</h5>
                  <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#modal-create-video">Tambah</button>

                  <div class="modal fade" id="modal-create-video">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form action="<?= base_url('admin/videos/create') ?>" method="post">
                          <input type="hidden" name="laboratory_id" id="laboratory_id" class="form-control" value="<?= $data->id ?>">
                          <div class="modal-header">
                            <h4 class="modal-title">Tambah Video Bahan Ajar</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="">Judul Video</label>
                              <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <label for="">Link</label>
                              <input type="text" name="link" id="link" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <label for="">Tampilkan Video Bahan Ajar</label>
                              <select name="is_show" id="is_show" class="form-control">
                                <option value="1">Tampilkan</option>
                                <option value="0">Sembunyikan</option>
                              </select>
                            </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-sm btn-primary">Tambah Video</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-bordered table-striped table-hover table-data">
                    <thead>
                      <th>No</th>
                      <th>Title</th>
                      <th>Video</th>
                      <th>Aksi</th>
                    </thead>
                    <tbody>
                      <?php $number = 1; foreach($videos as $video) { ?>
                        <tr>
                          <td><?= $number ?></td>
                          <td><?= $video->title ?></td>
                          <td>
                            <?php $explode = explode( "v=", $video->link ); $id = $explode[1]; $source = "http://img.youtube.com/vi/" . $id . "/0.jpg" ?>
                            <img src="<?= $source ?>" alt="Thumbnail Video" width="250px">
                            <br><br>
                            <a href="<?= $video->link ?>" class="btn btn-sm btn-outline-secondary" target="_blank">Nonton Video</a>
                          </td>
                          <td>
                            <button class="btn btn-sm btn-outline-primary" type="button" data-toggle="modal" data-target="#modal-edit-video-<?= $video->id ?>">Edit</button>
                            <div class="modal fade" id="modal-edit-video-<?= $video->id ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="<?= base_url('admin/videos/update') ?>" method="post">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Edit Video</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" name="laboratory_id" id="laboratory_id" class="form-control" value="<?= $data->id ?>">
                                      <input type="hidden" name="id" id="id" class="form-control" required value="<?= $video->id ?>">
                                      <div class="form-group">
                                        <label for="">Judul Video</label>
                                        <input type="text" name="title" id="title" class="form-control" required value="<?= $video->title ?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="">Link</label>
                                        <input type="text" name="link" id="link" class="form-control" required value="<?= $video->link ?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="">Tampilkan Video</label>
                                        <select name="is_show" id="is_show" class="form-control">
                                          <option <?= ($video->is_show == 1) ? 'selected' : '' ?> value="1">Tampilkan</option>
                                          <option <?= ($video->is_show == 0) ? 'selected' : '' ?> value="0">Sembunyikan</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-sm btn-primary">Edit Video</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>

                            <button class="btn btn-sm btn-outline-danger" type="button" data-toggle="modal" data-target="#modal-delete-video-<?= $video->id ?>">Hapus</button>
                            <div class="modal fade" id="modal-delete-video-<?= $video->id ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="<?= base_url('admin/videos/delete') ?>" method="post">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Hapus Video</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" name="laboratory_id" id="laboratory_id" class="form-control" value="<?= $data->id ?>">
                                      <input type="hidden" name="id" id="id" class="form-control" required value="<?= $video->id ?>">
                                      <p>Yakin ingin menghapus video <?= $video->title ?></p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-sm btn-danger">Hapus Video</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
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