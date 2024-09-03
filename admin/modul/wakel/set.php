<?php 
 $id = $_GET['id'];
if ($_GET['status']==0) {
$non = mysqli_query($con,"UPDATE tb_walikelas SET status=0 WHERE id_walikelas='$id' ");

echo " <script>
window.location='?page=walas';
</script>";
}else{
$aktifkan = mysqli_query($con,"UPDATE tb_walikelas SET status=1 WHERE id_walikelas='$id' ");
echo " <script>
window.location='?page=walas';
</script>";  
}
  ?>