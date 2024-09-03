<?php
$del = mysqli_query($con, "DELETE FROM tb_prodi WHERE id_prodi=$_GET[id]");
if ($del) {
	echo " <script>
		alert('Data telah dihapus !');
		window.location='?page=master&act=prodi';
		</script>";
}
