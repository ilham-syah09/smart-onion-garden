<!-- VIEW UNTUK MENAMPILKAN DATA DARI TABEL TB_BAWANG -->

    <div class="flash-success" data-flashdata="<?= $this->session->flashdata('flash-success'); ?>"></div>
    <div class="flash-error" data-flashdata="<?= $this->session->flashdata('flash-error'); ?>"></div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">Data pH Tanah</h4>
              </div>
              <div class="card-body">
                <a href="<?= base_url('data/pdf');?>" class="btn btn-warning float-right mb-2"><i class="tim-icons icon-paper"></i> Cetak</a>
                <div class="table-responsive">
                  <table class="table tablesorter display" id="example">
                    <thead class="text-primary">
                      <tr>
                        <th>No</th>
                        <th>Value pH</th>
                        <th>Keterangan</th>
                        <th>Waktu</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1;
                        foreach ($data as $dt) : ?>
                      <tr>
                        <th><?= $i++ ?></th>
                        <td><?= $dt['value_ph']; ?></td>
                        <td><?= $dt['keterangan']; ?></td>
                        <td><?= $dt['waktu']; ?></td>
                        <td>
                          <a href="<?= base_url() ?>Dashboard/delete/<?= $dt['id']; ?>" class="badge badge-danger delete-people tombol-hapus"><i class="fa fa-trash"></i> Hapus</a>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>