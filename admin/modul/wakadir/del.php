<?php
$del = mysqli_query($con, "DELETE FROM wakadir WHERE id_wakadir=$_GET[id]");
if ($del) {
	echo " <script>
		alert('Data telah dihapus !');
		window.location='?page=wakadir';
		</script>";
}
