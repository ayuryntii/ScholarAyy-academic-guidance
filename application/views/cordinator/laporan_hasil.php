<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
     <div class="container-fluid dashboard-content">
          <!-- ============================================================== -->
          <!-- pageheader -->
          <!-- ============================================================== -->
          <div class="row">
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                         <h2 class="pageheader-title">Laporan Proyek</h2>
                         <hr>
                    </div>
               </div>
          </div>
          <!-- ============================================================== -->
          <!-- end pageheader -->
          <?php

        $mhs2 = "SELECT * FROM user JOIN user_data 
         ON user.data_id = user_data.data_id
         WHERE user.role_id = 3";

        $num = "SELECT * FROM user JOIN user_data 
         ON user.data_id = user_data.data_id
         WHERE user.role_id = 3 AND user_data.status_laporan_id = 2";

        $jadimhs = $this->db->query($mhs2)->result_Array();
        $nummhs = $this->db->query($num)->num_rows();

        // Perbaikan: Cek apakah user_data ada dan tidak null
        $tanggal_pengumpulan = '';
        if (isset($user_data) && !empty($user_data) && isset($user_data['tanggal_pengumpulan_laporan'])) {
            $tanggal_pengumpulan = $user_data['tanggal_pengumpulan_laporan'];
        }

        // echo '<pre>';
        // var_dump($jadimhs);
        // echo '</pre>';
        // die;
        // $role_id = $this->db->get('status_laporan_id')->result_Array();
        // $status = $this->db->get_where('status', ['id' => $role_id])->row_array();

        ?>

          <!-- ============================================================== -->
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
               <div class="card">
                    <div class="card-body">
                         <button type="button" class="btn btn-primary text-white float-right" data-toggle="modal"
                              data-target="#tambahModal"><i class="fa fa-plus"></i> Tentukan Batas Waktu
                              Pengumpulan</button>
                         <h5 class="mb-0">Data Pengumpulan Laporan Proyek</h5>
                         <br>
                         <?= $this->session->flashdata('message_cor_laporan'); ?>
                         <br>
                         <table id="example2" class="table table-striped table-bordered" style="width:100%">
                              <tbody>
                                   <tr>
                                        <td width="200px">Batas Waktu</td>
                                        <td><?= $tanggal_pengumpulan; ?></td>
                                   </tr>
                                   <tr>
                                        <td>Jumlah Pengumpul</td>
                                        <td><?= $nummhs; ?></td>
                                   </tr>
                              </tbody>
                         </table>
                         <div class="card-body">
                              <table class="table table-bordered">
                                   <thead>
                                        <tr class="text-center">
                                             <th scope="col" width="50">No</th>
                                             <th scope="col">Nama Mahasiswa</th>
                                             <th scope="col">NPM</th>
                                             <th scope="col">Kelas</th>
                                             <th scope="col" width="200">Status Pengumpulan</th>
                                             <th scope="col">Aksi</th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        <?php $no = 1; ?>
                                        <?php if (!empty($jadimhs)) : ?>
                                        <?php foreach ($jadimhs as $mhs2) : ?>
                                        <?php 
                                                  $setatus = $this->db->get_where('status', ['id' => $mhs2['status_laporan_id']])->row_array();
                                                  $status_text = (!empty($setatus) && isset($setatus['status'])) ? $setatus['status'] : 'Belum Diatur';
                                                  ?>
                                        <tr class="text-center">
                                             <th rowspan="2"><?= $no++  ?></th>
                                             <td><?= isset($mhs2['name_mhs_1']) ? $mhs2['name_mhs_1'] : '-'; ?></td>
                                             <td><?= isset($mhs2['npm_mhs_1']) ? $mhs2['npm_mhs_1'] : '-'; ?></td>
                                             <td><?= isset($mhs2['kelas_mhs_1']) ? $mhs2['kelas_mhs_1'] : '-'; ?></td>
                                             <td rowspan="2"><?= $status_text; ?></td>
                                             <td width="100" rowspan="2">
                                                  <a href="<?= base_url('cordinator/detaillaporan/') . $mhs2['user_id'] ?>"
                                                       class="btn btn-primary btn-xs">Lihat Detail</a>
                                             </td>
                                        </tr>
                                        <tr class="text-center">
                                             <td><?= isset($mhs2['name_mhs_2']) ? $mhs2['name_mhs_2'] : '-'; ?></td>
                                             <td><?= isset($mhs2['npm_mhs_2']) ? $mhs2['npm_mhs_2'] : '-'; ?></td>
                                             <td><?= isset($mhs2['kelas_mhs_2']) ? $mhs2['kelas_mhs_2'] : '-'; ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php else : ?>
                                        <tr>
                                             <td colspan="6" class="text-center">Belum ada data mahasiswa</td>
                                        </tr>
                                        <?php endif; ?>
                                   </tbody>
                              </table>
                         </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                         <div class="modal-dialog">
                              <div class="modal-content">
                                   <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Pengumpulan Laporan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                        </button>
                                   </div>
                                   <form class="user" method="post"
                                        action="<?= base_url('cordinator/tambah_laporan') ?>">
                                        <div class="modal-body">
                                             <div class="form-group">
                                                  <label for="tanggal_pengumpulan_laporan" class="col-form-label">Batas
                                                       Waktu</label>
                                                  <input type="date" name="tanggal_pengumpulan_laporan"
                                                       class="form-control" id="tanggal_pengumpulan_laporan" required>
                                             </div>
                                        </div>
                                        <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary"
                                                  data-dismiss="modal">Tutup</button>
                                             <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                   </form>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <!-- ============================================================== -->
     <!-- end main wrapper -->
</div>