<div class="col-12">
  <div class="card recent-sales overflow-auto">
    <div class="card-body">
      <h5 class="card-title">Ubah data Pengguna</h5>

      <!-- Horizontal Form -->
      <form class="form-horizontal" action="./index.php?aksi=Master&xaksi=pengguna&yaksi=6" method="post" enctype="multipart/form-data">
        <?php foreach($dataku as $row) { ?> 
            <input type="text" class="form-control" readonly="true" value="<?php echo $row['id_user']; ?>" name="id_user" id="id_user" hidden> 

        <div class="row mb-3">
          <label for="judul" class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" value="<?php echo $row['username']; ?>" id="username" name="username">
          </div>
        </div>

        <div class="row mb-3">
          <label for="isi_pengguna" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
             <input type="password" class="form-control" value="<?php echo $row['passw']; ?>" id="passw" name="passw">
          </div>
        </div>
         
        <div class="row mb-3">
          <label for="isi_pengguna" class="col-sm-2 col-form-label">Nama  pengguna</label>
          <div class="col-sm-10">
             <input type="text" class="form-control" value="<?php echo $row['nama_user']; ?>" id="nama_user" name="nama_user">
          </div>
        </div>


        <div class="row mb-3">
          <label for="level" class="col-sm-2 col-form-label">Level akses</label>
          <div class="col-sm-10">
              <select class="form-control" name="level" id="level">
                  <option value="<?php echo $row['level']; ?>"><?php echo $row['level']; ?></option>
                    <option value="Admin">Admin</option>
                  <option value="Operator">Operator</option> 
              </select>
          </div>
        </div>

        <div class="row mb-3">
          <label for="gambar_lama" class="col-sm-2 col-form-label">Gambar Saat Ini</label>
          <div class="col-sm-10">
            <img src="../images/pengguna/<?php echo $row['gambar']; ?>" alt="Slide Image" width="200">
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