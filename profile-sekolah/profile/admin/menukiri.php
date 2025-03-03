<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
      <a class="nav-link " href="index.php">
        <i class="bi bi-grid"></i>
        <span>Beranda</span>
      </a>
    </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="./index.php?aksi=Master&xaksi=profil&yaksi=1">
              <i class="bi bi-circle"></i><span>Profil</span>
            </a>
          </li>
          <li>
            <a href="./index.php?aksi=Master&xaksi=sekolah&yaksi=1">
              <i class="bi bi-circle"></i><span>Data Sekolah</span>
            </a>
          </li>
          <li>
            <a href="./index.php?aksi=Master&xaksi=slide&yaksi=1">
              <i class="bi bi-circle"></i><span>Data Slide show</span>
            </a>
          </li>
          <li>
            <a href="./index.php?aksi=Master&xaksi=fasilitas&yaksi=1">
              <i class="bi bi-circle"></i><span>Data Fasilitas</span>
            </a>
          </li>
          <li>
            <a href="./index.php?aksi=Master&xaksi=guru&yaksi=1">
              <i class="bi bi-circle"></i><span>Data Guru</span>
            </a>
          </li>
          <li>
            <a href="./index.php?aksi=Master&xaksi=artikel&yaksi=1">
              <i class="bi bi-circle"></i><span>Data Artikel</span>
            </a>
          </li>
        </ul>
      </li>
<!-- End Components Nav -->

<?php
if ($_SESSION['level'] == 'admin'){
?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-card-list"></i><span>Manajemen Akun</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="./index.php?aksi=Master&xaksi=pengguna&yaksi=1">
              <i class="bi bi-circle"></i><span>Data Pengguna</span>
            </a>
          </li>
          <!-- <li>
            <a href="charts-apexcharts.html">
              <i class="bi bi-circle"></i><span>Ubah Password</span>
            </a>
          </li> -->
        </ul>
      </li>
      <!-- End Charts Nav -->
<?php } ?>
  </ul>
</aside>