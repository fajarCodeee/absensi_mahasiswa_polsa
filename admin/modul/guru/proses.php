<?php 

if (isset($_POST['saveGuru'])) {
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pass = sha1($nip);

    // Validasi duplikat NIP
    $query_check = mysqli_query($con, "SELECT * FROM tb_guru WHERE nip = '$nip'");
    if (mysqli_num_rows($query_check) > 0) {
        // NIP sudah ada di database
        echo "
       <script type='text/javascript'>
    alert('NIP sudah terdaftar! Mohon masukkan NIP yang berbeda.');
    window.location.replace('?page=guru&act=add');
</script>";
    } else {
        // Proses upload foto dan simpan data jika NIP tidak duplikat
        $sumber = @$_FILES['foto']['tmp_name'];
        $target = '../assets/img/user/';
        $nama_gambar = @$_FILES['foto']['name'];
        $pindah = move_uploaded_file($sumber, $target.$nama_gambar);
        if ($pindah) {
            $save = mysqli_query($con, "INSERT INTO tb_guru VALUES(NULL,'$nip','$nama','$email','$pass','$nama_gambar','Y')");
            if ($save) {
                echo "
                <script type='text/javascript'>
				alert('Data berhasil disimpan!', 'Dosen ($nama) berhasil ditambahkan.');
    window.location.replace('?page=guru');
               
                </script>";
            }
        }
    }




  }elseif (isset($_POST['editGuru'])) {

  	 $pass= sha1($_POST['email']);
		$gambar = @$_FILES['foto']['name'];
		if (!empty($gambar)) {
		move_uploaded_file($_FILES['foto']['tmp_name'],"../assets/img/user/$gambar");
		$ganti = mysqli_query($con,"UPDATE tb_guru SET foto='$gambar' WHERE id_guru='$_POST[id]' ");
		}
		$editGuru= mysqli_query($con,"UPDATE tb_guru SET nama_guru='$_POST[nama]',email='$_POST[email]' WHERE id_guru='$_POST[id]' ");

		if ($editGuru) {
			echo "
				<script type='text/javascript'>
				setTimeout(function () { 

				swal('($_POST[nama]) ', 'Berhasil diubah', {
				icon : 'success',
				buttons: {        			
				confirm: {
				className : 'btn btn-success'
				}
				},
				});    
				},10);  
				window.setTimeout(function(){ 
				window.location.replace('?page=guru');
				} ,3000);   
				</script>";
		}


  }
 ?>