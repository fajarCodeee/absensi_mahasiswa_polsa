<?php 
 $id = $_GET['id'];
if ($_GET['status']==0) {
$non = mysqli_query($con,"UPDATE wakadir SET status=0 WHERE id_wakadir='$id' ");

echo " <script>
window.location='?page=wakadir';
</script>";
}else{
$aktifkan = mysqli_query($con,"UPDATE wakadir SET status=1 WHERE id_wakadir='$id' ");
echo " <script>
window.location='?page=wakadir';
</script>";  
}
  ?>