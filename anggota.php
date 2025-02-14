<?php
    //PROSES DELETE DATA
    if(isset($_GET['delete'])){
        $id= $_GET['id'];
        $query_delete = mysqli_query();
        if ($query_delete ){
            ?>
            <div class="alert alert-success">
            DATA BERHASIL DIHAPUS!!!
            </div>
            <?php
        }
    }
    
     //PROSES INSERT TAMBAH DATA
       if(isset($_POST['Save']))
       { 
        $nis                =$_POST['nis'];
        $nama               =$_POST['nama'];
        $kelas              =$_POST['kelas'];
        $jurusan            =$_POST['jurusan'];
        $tanggal_lahir      =$_POST['tanggal_lahir'];
        $no_telp            =$_POST['no_telp'];
        $alamat             =$_POST['alamat'];
        $jk                 =$_POST['jk'];

        $query_insert = mysqli_query($konek,"INSERT INTO anggota VALUES ('','$nis','$nama','$kelas','$jurusan','$tanggal_lahir','$no_telp','$alamat','$jk')");
       

//Membuat notifikasi jika berhasil/tidak disimpan datanya
if($query_insert){
    ?>
    <div class="alert alert-success">
        DATA BERHASIL DISIMPAN !!!
    </div>
    <?php
    header('Refresh:2; URL:http://localhost/23_mywebsite_12rpl2/admin.php?page=anggota');
}else{
    ?>
    <div class="alert alert-danger">
        DATA GAGAL DISIMPAN!!!
    </div>
<?php
}
}

?>
<center><h1 class="mt-5 mb-4">Data Anggota</h1></center>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Tambah Data
</button>
<table class="table table-striped table-hover">
    <tr class="text-center">
        <th>No</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>Tanggal Lahir</th>
        <th>no_telp</td>
        <th>Alamat</th>
        <th>jenis kelamin</th>
        <th>--Action--</th>
    </tr>
    <?php
        $query = mysqli_query($konek,"SELECT * FROM anggota");
        $no = 1;
        foreach ($query as $row) {
    ?>
    <tr>
        <td align="center" valign="middle"><?php echo $no; ?></td>
        <td valign="middle"><?php echo $row['nis']; ?></td>
        <td valign="middle"><?php echo $row['nama']; ?></td>
        <td valign="middle"><?php echo $row['kelas']; ?></td>
        <td valign="middle"><?php echo $row['jurusan']; ?></td>
        <td valign="middle"><?php echo $row['tanggal_lahir']; ?></td>
        <td valign="middle"><?php echo $row['no_telp']; ?></td>
        <td valign="middle"><?php echo $row['alamat']; ?></td>
        <td align="center" valign="middle"><?php echo $row['jk']; ?></td>
        <td valign="middle">
            <a href="?page=anggota&delete&id=<?php echo $row['id_anggota'];?>">
            <button class="btn btn-danger"><i class="fas fa-trash-alt">HAPUS</i></button>
            <button class="btn btn-warning"><i class="fas fa-edit">UPDATE</i></button>
        </td>
    </tr>
    <?php
    $no++;
    }
    ?>
</table>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action=""method="post"> 
       <div class="form-group">
                <input type="text" class="form-control" name="nis" placeholder="Nis" require>
            </div>
            <div class="form-group mt-3">
                <input type="text" class="form-control" name="nama" placeholder="Nama Siswa" require>
            </div>
            <div class="form-group mt-3">
                <SELECT class="form-control" name="kelas">
                    <option value="">---PILIH KELAS---</option>
                    <option value="XIIRPL1">XIIRPL1</option>
                    <option value="XIIRPL2">XIIRPL2</option>
                    <option value="XIIRPL3">XIIRPL3</option>
                </SELECT>
            </div>
            <div class="form-group mt-3">
                <SELECT class="form-control" name="jurusan">
                    <option value="">---PILIH JURUSAN---</option>
                    <option value="AOV">AOV</option>
                    <option value="RPL">RPL</option>
                    <option value="TKR">TKR</option>
                </SELECT>
            </div>
            <div class="form-group mt-3">
                <div class="input-group">
                <span class="input-group-text" >Tanggal Lahir</span>
                <input type="date" class="form-control" name="tanggal_lahir">
            </div>
            <div class="form-group mt-3">
                <input type="text" class="form-control" name="no_telp" placeholder="No_Telpon" require>
            </div>
            <div class="form-group mt-3">
                <input class="form-control" name="alamat" placeholder="Alamat Lengkap" require>
            </div>
            <div class="form-group mt-3">
                <SELECT class="form-control" name="jk">
                    <option value="">---JENIS KELAMIN---</option>
                    <option value="L">L</option>
                    <option value="P">p</option>
                </SELECT>
            </div>
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name='Save'>Save</button>
        </form>
      </div>
    </div>
  </div>
</div> 