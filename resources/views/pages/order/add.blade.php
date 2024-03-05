<?php

require 'konek.php';

$id = $_GET['id'];

$sql1 = "SELECT * FROM spp WHERE id_spp = $id";
$query1 = mysqli_query($conn, $sql1);
$spp = mysqli_fetch_assoc($query1);


if(isset($_POST['kirim'])){

    $id = $_POST['id_spp'];
    $tahun = $_POST['tahun'];
    $nominal = $_POST['nominal'];

    $sql = "UPDATE spp SET tahun='$tahun', nominal='$nominal' WHERE id_spp=$id";
    $query = mysqli_query($conn,$sql);

    if($query){
        header('Location:index.php?link=spp');
    } else{

        echo"<script>
            alert('data gagal diubah');
        </scrupt>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulir Edit Siswa | SMK Coding</title>
</head>

<body>
    <header>
        <h3>Formulir Edit Siswa</h3>
    </header>

    <form action="" method="post">

            <input type="hidden" name="id_spp" value="<?php echo $spp['id_spp']; ?>" />

        <p>
            <label for="tahun">Tahun: </label>
            <input type="text" name="tahun" value="<?php echo $spp['tahun']; ?>" />
        </p>
        <p>
            <label for="nomina">Nominal: </label>
            <input type="text" name="nominal" value="<?php echo $spp['nominal'];?>">
        </p>
        <p>
            <button type="submit" name="kirim">Kirim</button>
        </p>


    </form>

    </body>
</html>

//hapus

<?php

include 'konek.php';

if(isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "DELETE FROM spp WHERE id_spp = $id";
    $query = mysqli_query($conn,$sql);

    if($query){

        header('Location:index.php?link=spp');
    } else{
        echo"<script>
            alert('data gagal di hapus');
        </script>";
    }
}

if(isset($_GET['idsiswa'])) {

    $id = $_GET['idsiswa'];

    $sql = "DELETE FROM siswa WHERE nisn = $id";
    $query = mysqli_query($conn,$sql);

    if($query){

        header('Location:index.php?link=siswa');
    } else{
        echo"<script>
        alert('data gagal di hapus');
    </script>";
    }
}

if(isset($_GET['idpetugas'])) {

    $id = $_GET['idpetugas'];

    $sql = "DELETE FROM petugas WHERE id_petugas = $id";
    $query = mysqli_query($conn,$sql);

    if($query){

        header('Location:index.php?link=petugas');
    } else{
        echo"<script>
        alert('data gagal di hapus');
    </script>";
    }
}

if(isset($_GET['idkelas'])) {

    $id = $_GET['idkelas'];

    $sql = "DELETE FROM kelas WHERE id_kelas = $id";
    $query = mysqli_query($conn,$sql);

    if($query){

        header('Location:index.php?link=kelas');
    } else{
        echo"<script>
        alert('data gagal di hapus');
    </script>";
    }
}

if(isset($_GET['idpembayaran'])) {

    $id = $_GET['idpembayaran'];

    $sql = "DELETE FROM pembayaran WHERE id_pembayaran = $id";
    $query = mysqli_query($conn,$sql);

    if($query){

        header('Location:index.php?link=pembayaran');
    } else{
        echo"<script>
        alert('data gagal di hapus');
    </script>";
    }
}
?>
// input
<?php

require 'konek.php';

if(isset($_POST['kirim'])){

    $nama_kelas = $_POST['nama_kelas'];
    $kompetensi_keahlian = $_POST['kompetensi_keahlian'];

    $sql = "INSERT INTO kelas (nama_kelas,kompetensi_keahlian)VALUES('$nama_kelas', '$kompetensi_keahlian')";
    $query = mysqli_query($conn, $sql);

    if($query){

        header('Location:index.php?link=kelas');
        
    } else{

        header('Location:input.kelas.php');

    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>

<body>
    <header>
        <h3>daftar kelas</h3>
    </header>

    <form action="" method="POST">

        <p>
            <label for="nama_kelas">Nama Kelas: </label>
            <input type="text" name="nama_kelas" id="nama_kelas">
        </p>
        <p>
            <label for="kompetensi_keahlian">Kompetensi Keahlian: </label>
            <input type="text" name="kompetensi_keahlian" id="kompetensi_keahlian">
        </p>        
        <p>
            <button type="submit" name="kirim">Kirim</button>
        </p>

    </form>

    </body>
</html>

//konek.php

<?php

$server = "localhost";
$user = "root";
$password = "";
$nama_database = "db_spp";

$conn = mysqli_connect($server, $user, $password, $nama_database);

if( !$conn ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

// function tambah($data){

//     global $conn;

//     $nisn = $_POST['nisn'];
//     $nis = $_POST['nis'];
//     $nama = $_POST['nama'];
//     $id_kelas =  $_POST['id_kelas'];
//     $alamat = $_POST['alamat'];
//     $no_telp = $_POST['no_telp'];
//     $id_spp = $_POST['id_spp'];

    
// }


function tambah($data) {

    global $conn;
    
    $nisn = $data['nisn'];
    $nis = $data['nis'];
    $nama = $data['nama'];
    $id_kelas = $data['id_kelas'];
    $alamat = $data['alamat'];
    $no_telp = $data['no_telp'];
    $id_spp = $data['id_spp'];

    
    mysqli_query($conn, "INSERT INTO siswa 
                    VALUES('$nisn', '$nis', '$nama', '$id_kelas', '$alamat','$no_telp','$id_spp')");                 

        return mysqli_affected_rows($conn);
}

?>
