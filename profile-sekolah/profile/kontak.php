<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    echo "Form submitted!<br>";

    $result = $function_all->input_data_contact($name, $email, $message);
    if ($result) {
        echo '<div class="alert alert-success">Thank you for contacting us!</div>';
    } else {
        echo '<div class="alert alert-danger">We are sorry, the submission failed.</div>';
    }

    echo '<meta http-equiv="refresh" content="1;url=?aksi=kontak">';
    exit();
}
?>


<section id="kontenutama" class="kontenutama">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mb-8">
                <div class="p-3 bg-light border shadow-sm rounded konten-container">
                    <h4 class="konten-title">Hubungi Kami</h4>
                    <div class="col-md-12">
                        <form class="contact-form" action="?aksi=kontak" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="3"required></textarea>
                            </div>
                            <button type="submit" name="submit" class="btn btn-submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="p-3 bg-light border shadow-sm rounded konten-container">
                    <h4 class="konten-title">Artikel lain</h4>
                    <?php
                    $artikel = $function_all->tampil_data_artikel();  
                    foreach($artikel as $row) {  
                        $id=$row['id'];
                    ?> 
                        <div class="artikel-lainnya">
                            <div class="artikel-lainnya-item d-flex align-items-start mb-3">
                                <div class="text-black me-2">
                                    <i class="bi bi-arrow-right-circle"></i>
                                </div> 
                                <a href="./index.php?aksi=artikeldet&id=<?php echo $id; ?>" class="artikel-link"><?php echo $row['judul']; ?></a>
                            </div>
                    <?php } ?>
                        </div>
                </div>
            </div>                
        </div>
    </div>
</section>