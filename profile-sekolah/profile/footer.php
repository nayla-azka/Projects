<button onclick="topFunction()" id="goTopBtn" title="Go to Top">
    <i class="bi bi-arrow-up"></i>
</button>

<footer class="bg-primary text-white py-4 mt-3">
    <div class="container">
        <div class="row text-center text-md-start">
            <div class="col-12 col-md-4 mb-3">
                <h5>Call</h5>
                <ul class="list-unstyled">
                    <li><i class="bi bi-telephone"></i> <?php echo $sekolah['telepon']; ?></li>
                    <li><i class="bi bi-envelope"></i> <?php echo $sekolah['email']; ?></li>
                    <li><i class="bi bi-whatsapp"></i> <?php echo $sekolah['wa']; ?></li>
                    <li><i class="bi bi-house"></i> Alamat : <?php echo $sekolah['alamat']; ?></li>
                </ul>
            </div>

            <div class="col-12 col-md-4 mb-3">
                <h5>Link</h5>
                <ul class="list-unstyled">
                    <li><a href="./index.php" class="text-white">Beranda</a></li>
                    <li><a href="./index.php?aksi=profil" class="text-white">Profil</a></li>
                    <li><a href="./index.php?aksi=fasilitas" class="text-white">Fasilitas</a></li>
                    <li><a href="./index.php?aksi=guru" class="text-white">Staf & Guru</a></li>
                    <li><a href="./index.php?aksi=artikel" class="text-white">Artikel</a></li>
                    <li><a href="./index.php?aksi=kontak" class="text-white">Call me</a></li>
                </ul>
            </div>

            <div class="col-12 col-md-4 mb-3 text-md-center d-none d-md-block">
                <h5>Telusuri Kami</h5>
                <a href="<?php echo $sekolah['facebook']; ?>" class="text-white me-2">
                    <i class="bi bi-facebook fa-2x"></i>
                </a>
                <a href="<?php echo $sekolah['instagram']; ?>" class="text-white me-2">
                    <i class="bi bi-instagram fa-2x"></i>
                </a>
                <a href="<?php echo $sekolah['twitter']; ?>" class="text-white me-2">
                    <i class="bi bi-twitter fa-2x"></i>
                </a>
                <a href="<?php echo $sekolah['youtube']; ?>" class="text-white me-2">
                    <i class="bi bi-youtube fa-2x"></i>
                </a>
            </div>
        </div>
        <hr class="my-3 border-white">
        <div class="text-center">
            <p>&copy; 2024, All Rights Reserved.</p>
        </div>
    </div>

 
    <!-- Footer Social Media Section (hanya terlihat di mobile) -->
    <div class="footer-info d-block d-lg-none d-xl-none fixed-bottom" style="padding-top: 10px; text-align: center;">
        <h6 style="color: blue;">Telusuri Kami 
        <a href="<?php echo $sekolah['facebook']; ?>" class="social-icon">
            <i class="bi bi-facebook"></i>
        </a>
        <a href="<?php echo $sekolah['instagram']; ?>" class="social-icon">
            <i class="bi bi-instagram"></i>
        </a>
        <a href="<?php echo $sekolah['twitter']; ?>" class="social-icon">
            <i class="bi bi-twitter"></i>
        </a>
        <a href="<?php echo $sekolah['youtube']; ?>" class="social-icon">
            <i class="bi bi-youtube"></i>
        </a>
    </div>
</footer>

<!-- Script untuk tombol Go to Top -->
<script>
    let goTopBtn = document.getElementById("goTopBtn");
    let liveChatBtn = document.getElementById("liveChatBtn");

    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            goTopBtn.style.display = "block";
            liveChatBtn.style.display = "block"; // Menampilkan tombol Live Chat
        } else {
            goTopBtn.style.display = "none";
            liveChatBtn.style.display = "none"; // Menyembunyikan tombol Live Chat
        }
    }

    function topFunction() {
        document.body.scrollTop = 0; // Untuk Safari
        document.documentElement.scrollTop = 0; // Untuk Chrome, Firefox, IE, dan Opera
    }
</script>

