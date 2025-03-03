<div class="col-12">
  <div class="card recent-sales overflow-auto">
    <div class="card-body"> 
      <h5 class="card-title">Tambah Data Guru </h5>

      <!-- Horizontal Form -->
      <form class="form-horizontal" action="./index.php?aksi=Master&xaksi=guru&yaksi=3" method="post" enctype="multipart/form-data"> 
        <div class="row mb-3">
          <label for="nama_guru" class="col-sm-2 col-form-label">Nama Guru</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_guru" id="nama_guru">
          </div>
        </div> 

        <div class="row mb-3">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="email" id="email"> 
          </div>
        </div> 

        <div class="row mb-3">
          <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
          <div class="col-sm-10">
            <textarea class="form-control" name="alamat" id="alamat"> </textarea>
          </div>
        </div>  

        <div class="row mb-3">
          <label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="telepon" id="telepon"> 
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