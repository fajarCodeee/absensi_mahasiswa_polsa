<?php
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Simulasi penambahan semester untuk siswa yang dipilih
// if (isset($_POST['editSs'])) {
//     $students = $_POST['id_siswa'];
//     foreach ($students as $student) {
// Di sini, Anda bisa menambahkan logika untuk menambah semester di database
// Misalnya:
//             $query = "UPDATE tb_siswa SET id_semester = id_semester + 1 WHERE id_siswa = $student";
//             mysqli_query($con, $query);
//             echo "
//             <script type='text/javascript'>
//             setTimeout(function () { 

//             swal(' 'Berhasil di Ubah', {
//             icon : 'success',
//             buttons: {        			
//             confirm: {
//             className : 'btn btn-success'
//             }
//             },
//             });    
//             },10);  
//             window.setTimeout(function(){ 
//             window.location.replace('?page=siswa');
//             } ,3000);   
//             </script>";
//         }
//     } else {
//         echo "Tidak ada siswa yang dipilih.";
//     }
// }
// if (isset($_POST['editSs'])) {
//     $students = $_POST['siswa'];
//     $save = mysqli_query($con, "UPDATE tb_siswa SET id_semester = id_semester + 1 WHERE id_siswa = $students ");
//     if ($save) {
//         echo "<script>
//         alert('Data diubah !');
//         window.location='?page=siswa';
//         </script>";
//     }
// }
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     //     // Mendapatkan semester baru dari form
//     $studentsArray = isset($_POST['siswa']) ? $_POST['siswa'] : [];

//     // Mengonversi array menjadi integer (jumlah elemen dalam array)
//     $studentsCount = count($studentsArray);

//     // Memastikan ada siswa yang dipilih dan semester baru tidak kosong
if (isset($_POST['editSs'])) {
    $students = $_POST['siswa'];
    foreach ($students as $student) {
        // Simulasi pembaruan semester di database
        // Contoh query:
        $query = "UPDATE tb_siswa SET id_semester = id_semester + 1 WHERE id_siswa = $student";
        mysqli_query($con, $query);
        if ($query) {
            echo "<script>
                        alert('Data diubah !');
                        window.location='?page=siswa&kelas=<?= $_GET[kelas] ?>';
                        </script>";
        }
    }
}
// }
