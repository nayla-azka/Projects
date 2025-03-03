<div class="col-12">
  <div class="card recent-sales overflow-auto">
    <div class="card-body">
      <h5 class="card-title">Ubah data fasilitas</h5>

      <!-- Horizontal Form -->
      <form class="form-horizontal" action="./index.php?aksi=Master&xaksi=fasilitas&yaksi=6" method="post" enctype="multipart/form-data">
        <?php foreach($dataku as $row) { ?> 
            <input type="text" class="form-control" readonly="true" value="<?php echo $row['id']; ?>" name="id" id="id" hidden> 

        <div class="row mb-3">
          <label for="nm_fasilitas" class="col-sm-2 col-form-label">Nama Fasilitas</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" value="<?php echo $row['nm_fasilitas']; ?>" id="nm_fasilitas" name="nm_fasilitas">
          </div>
        </div>

        <div class="row mb-3">
          <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
          <div class="col-sm-10">
             <textarea class="form-control editor" value="<?php echo $row['keterangan']; ?>" id="keterangan" name="keterangan"></textarea>
          </div>
        </div>

        <div class="row mb-3">
          <label for="gambar_lama" class="col-sm-2 col-form-label">Gambar Saat Ini</label>
          <div class="col-sm-10">
            <img src="../images/fasilitas/<?php echo $row['gambar']; ?>" alt="Image" width="200">
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