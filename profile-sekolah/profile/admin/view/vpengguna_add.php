<div class="col-12">
  <div class="card recent-sales overflow-auto">
    <div class="card-body"> 
      <h5 class="card-title">Tambah Data Pengguna </h5>

      <!-- Horizontal Form -->
      <form class="form-horizontal" action="./index.php?aksi=Master&xaksi=pengguna&yaksi=3" method="post" enctype="multipart/form-data"> 
        <div class="row mb-3">
          <label for="username" class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="username" id="username">
          </div>
        </div> 

        <div class="row mb-3">
          <label for="passw" class="col-sm-2 col-form-label">password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="passw" id="passw"> 
          </div>
        </div>

        <div class="row mb-3">
          <label for="nama_user" class="col-sm-2 col-form-label">Nama Pengguna</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_user" id="nama_user">
          </div>
        </div> 

        <div class="row mb-3">
          <label for="level" class="col-sm-2 col-form-label">Level Akses</label>
          <div class="col-sm-10">
            <select class="form-control" name="level" id="level"> 
              <option value="Admin">Admin</option>
              <option value="Operator">Operator</option> 
            </select>
          </div>
        </div>

        <div class="row mb-3">
          <label for="gambar" class="col-sm-2 col-form-label">Upload Gambar</label>
          <div class="col-sm-10">
            <input type="file" class="form-control" name="gambar" id="gambar" accept="image/*">
          </div>
        </div>

        <div class="text-center">
          <button type="submit" id="simpan" name="simpan" class="btn btn-primary">Simpan</button>
          <button type="reset" class="btn btn-secondary">Clear</button>
        </div>
      </form> 
    </div>
  </div>       
</div>