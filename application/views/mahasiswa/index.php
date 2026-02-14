<!-- ============================================================== -->
<!-- ============================================================== -->
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
                         <h2 class="pageheader-title">Dashboard</h2>
                         <hr>
                    </div>
               </div>
          </div>
          <!-- ============================================================== -->
          <!-- end pageheader -->
          <!-- ============================================================== -->

          <div class="col-md-12">
               <div class="card">
                    <div class="card-body">
                         <center>
                              <h3>
                                   Selamat datang Mahasiswa di Sistem Informasi Bimbingan Proposal/Skripsi/Proyek
                              </h3>
                         </center>
                    </div>
               </div>
          </div>


          <div class="row">
               <div class="col-md-12">
                    <div class="card">
                         <center>
                              <h5 class="card-header">Judul Proposal</h5>
                         </center>
                         <div class="card-body">
                              <center>
                                   <h3>
                                        <?= isset($user_data['judul_proyek']) ? $user_data['judul_proyek'] : 'Belum ada data'; ?>
                                   </h3>
                              </center>
                         </div>
                    </div>
               </div>
          </div>

          <div class="row">
               <div class="col-md-6">
                    <div class="card">
                         <center>
                              <h5 class="card-header">Batas Pengumpulan Proposal</h5>
                         </center>
                         <div class="card-body">
                              <center>
                                   <h3>
                                        <?= isset($mhs['tanggal_pengumpulan_proposal']) ? $mhs['tanggal_pengumpulan_proposal'] : '-'; ?>
                                   </h3>
                              </center>
                         </div>
                    </div>
               </div>
               <div class="col-md-6">
                    <div class="card">
                         <center>
                              <h5 class="card-header">Batas Pengumpulan Laporan</h5>
                         </center>
                         <div class="card-body">
                              <center>
                                   <h3>
                                        <?= isset($mhs['tanggal_pengumpulan_laporan']) ? $mhs['tanggal_pengumpulan_laporan'] : '-'; ?>
                                   </h3>
                              </center>
                         </div>
                    </div>
               </div>
               <div class="col-md-6">
                    <div class="card">
                         <center>
                              <h5 class="card-header">Batas Tanggal Bimbingan</h5>
                         </center>
                         <div class="card-body">
                              <center>
                                   <h3>
                                        <?= isset($mhs['batas_tanggal_bimbingan']) ? $mhs['batas_tanggal_bimbingan'] : '-'; ?>
                                   </h3>
                              </center>
                         </div>
                    </div>
               </div>
               <div class="col-md-6">
                    <div class="card">
                         <center>
                              <h5 class="card-header">Total Bimbingan</h5>
                         </center>
                         <div class="card-body">
                              <center>
                                   <h3>
                                        <!-- Jika ingin ditampilkan, isi di sini -->
                                   </h3>
                              </center>
                         </div>
                    </div>
               </div>
          </div>


          <div class="row">
               <div class="col-md-6">
                    <div class="card">
                         <center>
                              <h5 class="card-header">Dosen Pembimbing</h5>
                         </center>
                         <div class="card-body">
                              <center>
                                   <h3>
                                        <?= isset($tes['name']) ? $tes['name'] : '-'; ?>
                                   </h3>
                              </center>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
<!-- ============================================================== -->
<!-- end main wrapper -->
<!-- ============================================================== -->