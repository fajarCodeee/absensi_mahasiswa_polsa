<?php
$del = mysqli_query($con, "DELETE FROM tb_ruangan WHERE id_ruangan=$_GET[id]");
if ($del) {
	echo " <script>
		alert('Data telah dihapus !');
		window.location='?page=master&act=ruangan';
		</script>";
}
