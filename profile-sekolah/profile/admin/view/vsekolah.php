<div class="col-12">
  <div class="card recent-sales overflow-auto">
      <div class="card-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td>
              <h5 class="card-title">Data Sekolah</span></h5>
            </td>
          </tr>
        </table>

        <table class="table table-borderless datatable">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Sekolah</th>
              <th scope="col">Motto</th> 
              <th scope="col">Alamat</th>
              <th scope="col">Telepon</th>
              <th scope="col">Wa</th>
              <th scope="col">Instagram</th>
              <th scope="col">Facebook</th>
              <th scope="col">Twitter</th>
              <th scope="col">Youtube</th>
              <th scope="col">Email</th>
              <th scope="col">Gambar</th>
              <th scope="col">Edit</th>
            </tr>
          </thead>
          <tbody> 
          <?php  
          $no=1;
          foreach($dataku as $row)  {
          ?> 
            <tr>
              <td><?php  echo $no++; ?> </td>
              <td><?php  echo $row['nama_sekolah']; ?></td>  
              <td><?php  echo $row['motto']; ?></a></td>
              <td><?php  echo $row['alamat']; ?></td> 
              <td><?php  echo $row['telepon']; ?></td> 
              <td><?php  echo $row['wa']; ?></td> 
              <td><?php  echo $row['instagram']; ?></td> 
              <td><?php  echo $row['facebook']; ?></td> 
              <td><?php  echo $row['twitter']; ?></td> 
              <td><?php  echo $row['youtube']; ?></td> 
              <td><?php  echo $row['email']; ?></td> 
              <td> 
                <img src="../images/sekolah/<?php echo htmlspecialchars($row['gambar']); ?>" alt="Gambar" style="width:200px; height: auto;">
              </td>
              <td>
                <a href="./index.php?aksi=Master&xaksi=sekolah&yaksi=2&id=<?php echo  $row['id'];?>" class="text-primary"><span id="btnConfirm"  class="bi bi-eyedropper"></span></a>
              </td>  
            </tr>  
          <?php } ?>  
        </tbody>
      </table>
    </div>
  </div>
</div>