<?php 
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "project_web"; 
 
    // Create connection 
    $conn = new mysqli($servername, $username, $password, $dbname); 
    // Check connection 
    if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
    } 
    
    // Handle insert request
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve POST data
        $nama = $_POST['nama']; 
        $domisili = $_POST['domisili']; 
        $tanggal_lahir = $_POST['tanggal_lahir']; 
        $tempat_lahir = $_POST['tempat_lahir']; 
        $email = $_POST['email']; 
        $phone = $_POST['phone']; 
        $alamat = $_POST['alamat']; 
        $jenis_kelamin = $_POST['jenis_kelamin']; 
        
        $query = "INSERT INTO mahasiswa (nama, domisili, tempat_lahir, tanggal_lahir, email, phone, alamat, jenis_kelamin) 
            VALUES('$nama', '$domisili', '$tempat_lahir', '$tanggal_lahir', '$email', '$phone', '$alamat', '$jenis_kelamin')"; 
        $result = $conn->query($query); 
        if ($result) { 
            $response = array("status" => "success", "id"=> $conn->insert_id); 
            echo json_encode($response); 
        } else { 
            echo json_encode(array("status" => "gagal")); 
        } 
    } else { 
        // Handle select request
        $result = $conn->query("SELECT * FROM mahasiswa"); 
        if ($result->num_rows > 0) { 
            $data = array(); 
            while ($row = $result->fetch_assoc()) { 
                $data[] = array( 
                    "id" => $row['id'], 
                    "nama" => $row['nama'], 
                    "domisili" => $row['domisili'], 
                    "tempat_lahir" => $row['tempat_lahir'], 
                    "tanggal_lahir" => $row['tanggal_lahir'], 
                    "email" => $row['email'], 
                    "phone" => $row['phone'], 
                    "alamat" => $row['alamat'], 
                    "jenis_kelamin" => $row['jenis_kelamin'] 
                ); 
            } 
            echo json_encode(array("status" => "success", "data" => $data)); 
        } else { 
            echo json_encode(array("status" => "gagal")); 
        } 
    }
?>
