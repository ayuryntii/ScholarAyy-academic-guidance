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
                         <h2 class="pageheader-title">Surat Izin Sidang</h2>
                         <hr>
                    </div>
               </div>
          </div>
          <!-- ============================================================== -->
          <!-- end pageheader -->
          <?php
        // Validasi data admin sebelum digunakan
        if (!empty($admin) && isset($admin['dos_id']) && !empty($admin['dos_id'])) {
            // Query dengan prepared statement untuk keamanan
            $bimbingan = "SELECT bimbingan.*, user.*, admin.*, user_data.* FROM bimbingan 
                         JOIN user ON bimbingan.mhs_id = user.mhs_id 
                         JOIN admin ON bimbingan.dos_id = admin.dos_id 
                         JOIN user_data ON user.data_id = user_data.data_id 
                         WHERE admin.dos_id = ?";
            
            $tes = $this->db->query($bimbingan, [$admin['dos_id']])->result_array();
            $tes1 = $this->db->query($bimbingan, [$admin['dos_id']])->result_array();
        } else {
            // Jika admin tidak ada atau dos_id kosong
            $tes = array();
            $tes1 = array();
            echo '<div class="alert alert-danger">Error: Data admin tidak ditemukan atau dos_id kosong.</div>';
        }
        ?>
          <!-- ============================================================== -->
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
               <div class="card">
                    <center>
                         <h5 class="card-header">Daftar Mahasiswa Proyek</h5>
                    </center>
                    <div class="card-body">
                         <?php if (!empty($tes)): ?>
                         <table class="table table-bordered">
                              <thead>
                                   <tr class="text-center">
                                        <th scope="col" width="50">No</th>
                                        <th scope="col">Nama Mahasiswa</th>
                                        <th scope="col">NIM</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col" width="200">Status</th>
                                        <th scope="col">Aksi</th>
                                   </tr>
                              </thead>
                              <?php $no = 1; ?>
                              <?php foreach ($tes as $data_tes) : ?>
                              <?php 
                                   // Validasi sebelum query status
                                   if (!empty($data_tes['status_surat_id'])) {
                                        $setatus = $this->db->get_where('status_surat', ['id' => $data_tes['status_surat_id']])->row_array();
                                   } else {
                                        $setatus = ['status' => 'Belum Ada Status'];
                                   }
                              ?>
                              <tbody>
                                   <tr class="text-center">
                                        <th rowspan="2"><?= $no++  ?></th>
                                        <td><?= isset($data_tes['name_mhs_1']) ? $data_tes['name_mhs_1'] : '-'; ?></td>
                                        <td><?= isset($data_tes['npm_mhs_1']) ? $data_tes['npm_mhs_1'] : '-'; ?></td>
                                        <td><?= isset($data_tes['kelas_mhs_1']) ? $data_tes['kelas_mhs_1'] : '-'; ?>
                                        </td>
                                        <td rowspan="2">
                                             <?= isset($setatus['status']) ? $setatus['status'] : 'Tidak Ada Status'; ?>
                                        </td>
                                        <td width="100" rowspan="2">
                                             <?php if (isset($data_tes['user_id'])): ?>
                                             <a type="button" href="" class="btn btn-primary text-white"
                                                  data-toggle="modal"
                                                  data-target="#tambahModal<?= $data_tes['user_id']; ?>">Izinkan
                                                  Sidang</a>
                                             <?php else: ?>
                                             <span class="text-muted">-</span>
                                             <?php endif; ?>
                                        </td>
                                   </tr>
                                   <tr class="text-center">
                                        <td><?= isset($data_tes['name_mhs_2']) ? $data_tes['name_mhs_2'] : '-'; ?></td>
                                        <td><?= isset($data_tes['npm_mhs_2']) ? $data_tes['npm_mhs_2'] : '-'; ?></td>
                                        <td><?= isset($data_tes['kelas_mhs_2']) ? $data_tes['kelas_mhs_2'] : '-'; ?>
                                        </td>
                                   </tr>
                              </tbody>
                              <?php endforeach; ?>
                         </table>
                         <?php else: ?>
                         <div class="alert alert-info">Tidak ada data mahasiswa untuk dosen ini.</div>
                         <?php endif; ?>
                    </div>
               </div>

               <!-- Modal untuk setiap mahasiswa -->
               <?php if (!empty($tes1)): ?>
               <?php foreach ($tes1 as $ts) : ?>
               <?php if (isset($ts['user_id'])): ?>
               <div class="modal fade" id="tambahModal<?= $ts['user_id']; ?>" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                         <div class="modal-content">
                              <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalLabel">Notice!</h5>
                                   <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                   </a>
                              </div>
                              <div class="modal-body">
                                   <form class="user" method="post"
                                        action="<?= base_url('dosen/surat_izin_sidang_tambah/') . $ts['user_id']; ?>">
                                        <p>Masukan Persentase Penyelesaian Proyek Dengan Data Mahasiswa:
                                             <br>
                                             1. <?= isset($ts['name_mhs_1']) ? $ts['name_mhs_1'] : '-'; ?>
                                             (<?= isset($ts['npm_mhs_1']) ? $ts['npm_mhs_1'] : '-'; ?>)
                                             <br>
                                             2. <?= isset($ts['name_mhs_2']) ? $ts['name_mhs_2'] : '-'; ?>
                                             (<?= isset($ts['npm_mhs_2']) ? $ts['npm_mhs_2'] : '-'; ?>)
                                        </p>
                                        <div class="form-group">
                                             <label for="tanggal_pengumpulan_laporan" class="col-form-label">Persentase
                                                  Penyelesaian Laporan</label>
                                             <input class="form-control form-control-lg" type="number"
                                                  name="persentase_laporan" placeholder="%" min="0" max="100" required>
                                        </div>
                                        <div class="form-group">
                                             <label for="tanggal_pengumpulan_laporan" class="col-form-label">Persentasi
                                                  Penyelesaian Aplikasi</label>
                                             <input class="form-control form-control-lg" type="number"
                                                  name="persentase_apliksai" placeholder="%" min="0" max="100" required>
                                        </div>
                                        <div class="form-group">
                                             <label for="tanggal_pengumpulan_laporan" class="col-form-label">Tanggal
                                                  Persetujuan</label>
                                             <input type="date" name="tanggal_pengumpulan_laporan" class="form-control"
                                                  id="tanggal_pengumpulan_laporan" required>
                                        </div>
                              </div>
                              <input type="hidden" name="tanda_tangan"
                                   value="<?= isset($ts['tanda_tangan_digital']) ? $ts['tanda_tangan_digital'] : ''; ?>">
                              <div class="modal-footer">
                                   <button type="submit" href="#" class="btn btn-primary"><i class="fas fa-check"></i>
                                        Setujui</button>
                                   <a href="#" class="btn btn-secondary" data-dismiss="modal"><i
                                             class="fas fa-times"></i> Tidak</a>
                              </div>
                              </form>
                         </div>
                    </div>
               </div>
               <?php endif; ?>
               <?php endforeach; ?>
               <?php endif; ?>
          </div>
     </div>
</div>
<!-- ============================================================== -->
<!-- end main wrapper -->