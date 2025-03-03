<div class="col-12">
  <div class="card recent-sales overflow-auto">
    <div class="card-body">
      <h5 class="card-title">Ubah data guru</h5>

      <!-- Horizontal Form -->
      <form class="form-horizontal" action="./index.php?aksi=Master&xaksi=guru&yaksi=6" method="post" enctype="multipart/form-data">
        <?php foreach($dataku as $row) { ?> 
            <input type="text" class="form-control" readonly="true" value="<?php echo $row['id']; ?>" name="id" id="id" hidden> 

        <div class="row mb-3">
          <label for="nama_guru" class="col-sm-2 col-form-label">Nama Guru</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" value="<?php echo $row['nama_guru']; ?>" id="nama_guru" name="nama_guru">
          </div>
        </div>

        <div class="row mb-3">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
             <input type="text" class="form-control" value="<?php echo $row['email']; ?>" id="email" name="email">
          </div>
        </div>

        <div class="row mb-3">
          <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
          <div class="col-sm-10">
             <textarea class="form-control" value="<?php echo $row['alamat']; ?>" id="alamat" name="alamat"></textarea>
          </div>
        </div>
        
        <div class="row mb-3">
          <label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
          <div class="col-sm-10">
             <input type="text" class="form-control" value="<?php echo $row['telepon']; ?>" id="telepon" name="telepon">
          </div>
        </div>

        <div class="row mb-3">
          <label for="gambar_lama" class="col-sm-2 col-form-label">Gambar Saat Ini</label>
          <div class="col-sm-10">
            <img src="../images/guru/<?php echo $row['gambar']; ?>" alt="Image" width="200">
            <input type="hidden" name="gambar_lama" value="<?php echo $row['gambar']; ?>">
          </div>
        </div>

        <div class="row mb-3">
          <label for="gambar" class="col-sm-2 col-form-label">Upload Gambar Baru</label>
          <div class="col-sm-10">
            <input type="file" class="form-control" name="gambar" id="gambar" accept="image/*">
          </div>
        </div>

        <?php } ?>
        <div class="text-center">
          <button type="submit" id="update" name="update" class="btn btn-primary">Update</button>
          <button type="reset" class="btn btn-secondary">Clear</button>
        </div>
      </form>
    </div>
  </div>
</div>