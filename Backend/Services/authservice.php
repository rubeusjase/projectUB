<?php
    include_once('koneksi.php');

    class AuthService extends Koneksi {
        private $sqlQuery;
        private $stmt;
    
        function CekLogin($uname = null, $upass = null) {
            try {
                // Query dengan Prepared Statement
                $this->sqlQuery = "SELECT fullname, email, password FROM tb_user WHERE email = ?";
                $this->stmt = $this->conn->prepare($this->sqlQuery);
                $this->stmt->bind_param("s", $uname);
                $this->stmt->execute();
                $result = $this->stmt->get_result();
    
                // Jika pengguna ditemukan
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    
                    // Verifikasi password
                    if (password_verify($upass, $row['password'])) {
                        $_SESSION['info'] = 'sukses';
                        $_SESSION['fullname'] = $row['fullname'];
                        $_SESSION['email'] = $row['email'];
                        return "Sukses";
                    } else {
                        // Password salah
                        $_SESSION['info'] = 'gagal';
                        return "Gagal";
                    }
                } else {
                    // Pengguna tidak ditemukan
                    $_SESSION['info'] = 'gagal';
                    return "Gagal";
                }
            } catch (Exception $e) {
                // Tangani error
                error_log("Error saat login: " . $e->getMessage());
                return "Error";
            }
        }

        //hapus data home
        function deletehome($id,$aksi)
        {
             if($aksi=='delete') //hapus permanen
            {
            $this->sqlQuery = "DELETE FROM home WHERE id=".$id;
            }
            $hsl = mysqli_query($this->conn, $this->sqlQuery);
            return $hsl;
        }
        function Savehome($dthome, $aksi) {
            $Id=null;
            $judul=null;
            $deskripsi=null;
            $hsl=0;

            foreach($dthome as $key => $value) {
                switch($key) {
                    case 'id':
                        $Id = $value;
                        break;
                    case 'judul':
                        $judul = $value;
                    break;
                    case 'deskripsi':
                        $deskripsi = $value;
                    break;
                }
            }
            // Menambahkan data home 
            if($aksi == 'new') {
                $sqlQuery = "INSERT INTO `home`(`judul`, `deskripsi`) VALUES ('$judul','$deskripsi')";
                $hsl = mysqli_query($this->conn, $sqlQuery);
            } else if($aksi=='edit') {
                $sqlQuery = "UPDATE `home` SET `judul`='$judul', `deskripsi`='$deskripsi' WHERE id=" . $Id;
                $hsl = mysqli_query($this->conn, $sqlQuery);
            }
            return $hsl;
        }

//hapus data blog
function deleteBlog($id,$aksi)
{
        if($aksi=='delete') //hapus permanen
    {
    $this->sqlQuery = "DELETE FROM blog WHERE id=".$id;
    }
    $hsl = mysqli_query($this->conn, $this->sqlQuery);
    return $hsl;
}
function SaveBlog(array $dtblog, $foto, $aksi) {
    $Id=null;
    $judul=null;
    $deskripsi=null;
    $hsl=0;

    foreach($dtblog as $key => $value) {
        switch($key) {
            case 'id':
                $Id = $value;
                break;
            case 'judul':
                $judul = $value;
                break;
            case 'deskripsi':
                $deskripsi = $value;
                break;      
        }
    }
    // Menambahkan data blog
    if($aksi == 'new') 
    {
        $namafoto = $foto['name'];
        $this->sqlQuery = "INSERT INTO `blog`(`judul`, `deskripsi`, `foto`) VALUES ('$judul','$deskripsi','$namafoto')";
        $hsl = mysqli_query($this->conn, $this->sqlQuery) ;
        
    } 
    else if($aksi=='edit') 
    {
        $namafoto = $foto['name'];
        $this->sqlQuery = "UPDATE `blog` SET `judul`='$judul',`deskripsi`='$deskripsi',`foto`='$namafoto' WHERE id=" . $Id;
        $hsl = mysqli_query($this->conn, $this->sqlQuery);
    }
    $hsl = $this->updatefoto($foto);
    return $hsl;

    }
    function updatefoto($foto = null) 
{
    if ($foto === null || !isset($foto["tmp_name"]) || !is_uploaded_file($foto["tmp_name"])) {
        return "No file was uploaded.";
    }

    $target_dir = "assets/";
    $target_file = $target_dir . basename($foto["name"]);
    $uploadOk = 1;
    $hsl = "";
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a valid image
    $check = getimagesize($foto["tmp_name"]);
    if ($check !== false) {
        $hsl = "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        return "File is not an image.";
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        return "Sorry, file already exists.";
    }

    // Check file size (limit to 10 mb)
    if ($foto["size"] > 10000000) {
        return "Sorry, your file is too large.";
    }

    // Allow only certain file formats
    if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
        return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }

    // Attempt to upload file
    if (move_uploaded_file($foto["tmp_name"], $target_file)) {
        return "The file " . htmlspecialchars(basename($foto["name"])) . " has been uploaded.";
    } else {
        return "Sorry, there was an error uploading your file.";
    }
}

//hapus data artikel 2
function deleteartikel2($id,$aksi)
{
     if($aksi=='delete') //hapus permanen
    {
    $this->sqlQuery = "DELETE FROM artikel2 WHERE id=".$id;
    }
    $hsl = mysqli_query($this->conn, $this->sqlQuery);
    return $hsl;
}
function Saveartikel2(array $dtartikel2, $foto, $aksi) {
    $Id=null;
    $judul=null;
    $deskripsi=null;
    $hsl=0;

    foreach($dtartikel2 as $key => $value) {
        switch($key) {
            case 'id':
                $Id = $value;
                break;
            case 'judul':
                $judul = $value;
                break;
            case 'deskripsi':
                $deskripsi = $value;
                break;      
        }
    }
    // Menambahkan data artikel2
    if($aksi == 'new') 
    {
        $namafoto = $foto['name'];
        $this->sqlQuery = "INSERT INTO `artikel2`(`judul`, `deskripsi`, `foto`) VALUES ('$judul','$deskripsi','$namafoto')";
        $hsl = mysqli_query($this->conn, $this->sqlQuery) ;
        
    } 
    else if($aksi=='edit') 
    {
        $namafoto = $foto['name'];
        $this->sqlQuery = "UPDATE `artikel2` SET `judul`='$judul',`deskripsi`='$deskripsi',`foto`='$namafoto' WHERE id=" . $Id;
        $hsl = mysqli_query($this->conn, $this->sqlQuery);
    }
    $hsl = $this->uploadfoto($foto);
    return $hsl;

    }
    function uploadfoto($foto = null) 
{
    if ($foto === null || !isset($foto["tmp_name"]) || !is_uploaded_file($foto["tmp_name"])) {
        return "No file was uploaded.";
    }

    $target_dir = "assets/";
    $target_file = $target_dir . basename($foto["name"]);
    $uploadOk = 1;
    $hsl = "";
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a valid image
    $check = getimagesize($foto["tmp_name"]);
    if ($check !== false) {
        $hsl = "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        return "File is not an image.";
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        return "Sorry, file already exists.";
    }

    // Check file size (limit to 10 mb)
    if ($foto["size"] > 10000000) {
        return "Sorry, your file is too large.";
    }

    // Allow only certain file formats
    if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
        return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }

    // Attempt to upload file
    if (move_uploaded_file($foto["tmp_name"], $target_file)) {
        return "The file " . htmlspecialchars(basename($foto["name"])) . " has been uploaded.";
    } else {
        return "Sorry, there was an error uploading your file.";
    }
}

//hapus data artikel 3
function deleteartikel3($id,$aksi)
{
     if($aksi=='delete') //hapus permanen
    {
    $this->sqlQuery = "DELETE FROM artikel3 WHERE id=".$id;
    }
    $hsl = mysqli_query($this->conn, $this->sqlQuery);
    return $hsl;
}
function Saveartikel3(array $dtartikel3, $foto, $aksi) {
    $Id=null;
    $judul=null;
    $deskripsi=null;
    $hsl=0;

    foreach($dtartikel3 as $key => $value) {
        switch($key) {
            case 'id':
                $Id = $value;
                break;
            case 'judul':
                $judul = $value;
                break;
            case 'deskripsi':
                $deskripsi = $value;
                break;      
        }
    }
    // Menambahkan data artikel3
    if($aksi == 'new') 
    {
        $namafoto = $foto['name'];
        $this->sqlQuery = "INSERT INTO `artikel3`(`judul`, `deskripsi`, `foto`) VALUES ('$judul','$deskripsi','$namafoto')";
        $hsl = mysqli_query($this->conn, $this->sqlQuery) ;
        
    } 
    else if($aksi=='edit') 
    {
        $namafoto = $foto['name'];
        $this->sqlQuery = "UPDATE `artikel3` SET `judul`='$judul',`deskripsi`='$deskripsi',`foto`='$namafoto' WHERE id=" . $Id;
        $hsl = mysqli_query($this->conn, $this->sqlQuery);
    }
    $hsl = $this->uploadedfoto($foto);
    return $hsl;

    }
    function uploadedfoto($foto = null) 
{
    if ($foto === null || !isset($foto["tmp_name"]) || !is_uploaded_file($foto["tmp_name"])) {
        return "No file was uploaded.";
    }

    $target_dir = "assets/";
    $target_file = $target_dir . basename($foto["name"]);
    $uploadOk = 1;
    $hsl = "";
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a valid image
    $check = getimagesize($foto["tmp_name"]);
    if ($check !== false) {
        $hsl = "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        return "File is not an image.";
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        return "Sorry, file already exists.";
    }

    // Check file size (limit to 10 mb)
    if ($foto["size"] > 10000000) {
        return "Sorry, your file is too large.";
    }

    // Allow only certain file formats
    if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
        return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }

    // Attempt to upload file
    if (move_uploaded_file($foto["tmp_name"], $target_file)) {
        return "The file " . htmlspecialchars(basename($foto["name"])) . " has been uploaded.";
    } else {
        return "Sorry, there was an error uploading your file.";
    }
}
//hapus data dokter
function deletedokter($id,$aksi)
{
     if($aksi=='delete') //hapus permanen
    {
    $this->sqlQuery = "DELETE FROM dokter WHERE id=".$id;
    }
    $hsl = mysqli_query($this->conn, $this->sqlQuery);
    return $hsl;
}
function Savedokter(array $dtdokter, $foto, $aksi) {
    $Id=null;
    $nama=null;
    $specialist=null;
    $deskripsi=null;
    $hsl=0;

    foreach($dtdokter as $key => $value) 
    {
        switch($key) 
        {
            case 'id':
                $Id = $value;
                break;
            case 'nama':
                $nama = $value;
                break;
            case 'specialist':
                $specialist = $value;
                break;
                case 'foto':
                    $foto = $value;
            case 'deskripsi':
                $deskripsi = $value;
                break; 
        }
    }
    // Menambahkan data dokter
    if($aksi == 'new') 
    {
        $namafoto = $foto['name'];
        $this->sqlQuery = "INSERT INTO `dokter`(`nama`, `specialist`, `deskripsi`, `foto`) VALUES ('$nama','$specialist','$deskripsi','$namafoto')";
        $hsl = mysqli_query($this->conn, $this->sqlQuery) ;
        
    } 
    else if($aksi=='edit') 
    {
        $namafoto = $foto['name'];
        $this->sqlQuery = "UPDATE `dokter` SET `nama`='$nama',`specialist`='$specialist',`deskripsi`='$deskripsi',`foto`='$namafoto' WHERE id=" . $Id;
        $hsl = mysqli_query($this->conn, $this->sqlQuery);
    }
    $hsl = $this->updatedfoto($foto);
    return $hsl;

    }
    function updatedfoto($foto = null) 
{
    if ($foto === null || !isset($foto["tmp_name"]) || !is_uploaded_file($foto["tmp_name"])) {
        return "No file was uploaded.";
    }

    $target_dir = "assets/";
    $target_file = $target_dir . basename($foto["name"]);
    $uploadOk = 1;
    $hsl = "";
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a valid image
    $check = getimagesize($foto["tmp_name"]);
    if ($check !== false) {
        $hsl = "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        return "File is not an image.";
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        return "Sorry, file already exists.";
    }

    // Check file size (limit to 10 mb)
    if ($foto["size"] > 10000000) {
        return "Sorry, your file is too large.";
    }

    // Allow only certain file formats
    if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
        return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }

    // Attempt to upload file
    if (move_uploaded_file($foto["tmp_name"], $target_file)) {
        return "The file " . htmlspecialchars(basename($foto["name"])) . " has been uploaded.";
    } else {
        return "Sorry, there was an error uploading your file.";
    }
}
        //hapus data pertanyaan 1
        function deletePertanyaan($id,$aksi)
        {
             if($aksi=='delete') //hapus permanen
            {
            $this->sqlQuery = "DELETE FROM pertanyaan1 WHERE id=".$id;
            }
            $hsl = mysqli_query($this->conn, $this->sqlQuery);
            return $hsl;
        }
        function SavePertanyaan($dtpertanyaan, $aksi) {
            $Id=null;
            $pertanyaan=null;
            $jawaban=null;
            $deskripsi=null;
            $hsl=0;

            foreach($dtpertanyaan as $key => $value) {
                switch($key) {
                    case 'id':
                        $Id = $value;
                        break;
                    case 'pertanyaan':
                        $pertanyaan = $value;
                    break;
                    case 'jawaban':
                        $jawaban = $value;
                    break;
                    case 'deskripsi':
                        $deskripsi = $value;
                    break;     
                }
            }
            // Menambahkan data pertanyaan 1
            if($aksi == 'new') {
                $sqlQuery = "INSERT INTO `pertanyaan1`(`pertanyaan`, `jawaban`, `deskripsi`) VALUES ('$pertanyaan','$jawaban','$deskripsi')";
                $hsl = mysqli_query($this->conn, $sqlQuery);
            } else if($aksi=='edit') {
                $sqlQuery = "UPDATE `pertanyaan1` SET `pertanyaan`='$pertanyaan', `jawaban`='$jawaban', `deskripsi`='$deskripsi' WHERE id=" . $Id;
                $hsl = mysqli_query($this->conn, $sqlQuery);
            }
            return $hsl;
        }

        //hapus data pertanyaan 2
        function deletePertanyaan2($id,$aksi)
        {
             if($aksi=='delete') //hapus permanen
            {
            $this->sqlQuery = "DELETE FROM pertanyaan2 WHERE id=".$id;
            }
            $hsl = mysqli_query($this->conn, $this->sqlQuery);
            return $hsl;
        }
        function SavePertanyaan2($dtpertanyaan2, $aksi) {
            $Id=null;
            $pertanyaan=null;
            $jawaban=null;
            $hsl=0;

            foreach($dtpertanyaan2 as $key => $value) {
                switch($key) {
                    case 'id':
                        $Id = $value;
                        break;
                    case 'pertanyaan':
                        $pertanyaan = $value;
                    break;
                    case 'jawaban':
                        $jawaban = $value;
                    break;
                }
            }
            // Menambahkan data pertanyaan 2
            if($aksi == 'new') {
                $sqlQuery = "INSERT INTO `pertanyaan2`(`pertanyaan`, `jawaban`) VALUES ('$pertanyaan','$jawaban')";
                $hsl = mysqli_query($this->conn, $sqlQuery);
            } else if($aksi=='edit') {
                $sqlQuery = "UPDATE `pertanyaan2` SET `pertanyaan`='$pertanyaan', `jawaban`='$jawaban' WHERE id=" . $Id;
                $hsl = mysqli_query($this->conn, $sqlQuery);
            }
            return $hsl;
        }

        //hapus data pertanyaan 3
        function deletePertanyaan3($id,$aksi)
        {
             if($aksi=='delete') //hapus permanen
            {
            $this->sqlQuery = "DELETE FROM pertanyaan3 WHERE id=".$id;
            }
            $hsl = mysqli_query($this->conn, $this->sqlQuery);
            return $hsl;
        }
        function SavePertanyaan3($dtpertanyaan3, $aksi) {
            $Id=null;
            $pertanyaan=null;
            $jawaban=null;
            $hsl=0;

            foreach($dtpertanyaan3 as $key => $value) {
                switch($key) {
                    case 'id':
                        $Id = $value;
                        break;
                    case 'pertanyaan':
                        $pertanyaan = $value;
                    break;
                    case 'jawaban':
                        $jawaban = $value;
                    break;
                }
            }
            // Menambahkan data pertanyaan 3
            if($aksi == 'new') {
                $sqlQuery = "INSERT INTO `pertanyaan3`(`pertanyaan`, `jawaban`) VALUES ('$pertanyaan','$jawaban')";
                $hsl = mysqli_query($this->conn, $sqlQuery);
            } else if($aksi=='edit') {
                $sqlQuery = "UPDATE `pertanyaan3` SET `pertanyaan`='$pertanyaan', `jawaban`='$jawaban' WHERE id=" . $Id;
                $hsl = mysqli_query($this->conn, $sqlQuery);
            }
            return $hsl;
        }

        //hapus data kontak 
        function deletekontak($id,$aksi)
        {
             if($aksi=='delete') //hapus permanen
            {
            $this->sqlQuery = "DELETE FROM kontak WHERE id=".$id;
            }
            $hsl = mysqli_query($this->conn, $this->sqlQuery);
            return $hsl;
        }
        function Savekontak($dtkontak, $aksi) {
            $Id=null;
            $alamat=null;
            $email=null;
            $nomor_telepon=null;
            $jam_operasional=null;
            $hsl=0;

            foreach($dtkontak as $key => $value) {
                switch($key) {
                    case 'id':
                        $Id = $value;
                        break;
                    case 'alamat':
                        $alamat = $value;
                    break;
                    case 'email':
                        $email = $value;
                    break;
                    case 'nomor_telepon':
                        $nomor_telepon = $value;
                    break;
                    case 'jam_operasional':
                        $jam_operasional = $value;
                    break;
                }
            }
            // Menambahkan data kontak 
            if($aksi == 'new') {
                $sqlQuery = "INSERT INTO `kontak`(`alamat`, `email`, `nomor_telepon`, `jam_operasional`) VALUES ('$alamat', '$email', '$nomor_telepon','$jam_operasional')";
                $hsl = mysqli_query($this->conn, $sqlQuery);
            } else if($aksi=='edit') {
                $sqlQuery = "UPDATE `kontak` SET `alamat`='$alamat', `email`='$email', `nomor_telepon`='$nomor_telepon', `jam_operasional`='$jam_operasional' WHERE id=" . $Id;
                $hsl = mysqli_query($this->conn, $sqlQuery);
            }
            return $hsl;
        }
    }
?>