<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../images/brand_favicon.png">
</head>



<?php

require('../DBConnection/connection.php');

$type_form = $_POST['type_form'];
$username_user = $_POST['username_user'];
$password_user = $_POST['password_user'];


if($type_form == 'signin') {
    $email_user = $_POST['email_user'];
    $username_user = $_POST['username_user'];
    $password_user2 = $_POST['password_repeat_user'];
    $query = "INSERT INTO users (email_user,username_user,password_user) VALUES('$email_user','$username_user','$password_user2')";
    
    $row = $result->fetch_assoc();
    $id_user = $row['id_user'];

    if($conn->query($query)) {
        header("Location: ../Users/Main.php?iduser=$id_user");
    } else {
        echo "Query gagal!";
    }
} else if($type_form == 'login') {

    $username_user = $_POST['username_user'];
    $password_user = $_POST['password_user'];
    
    // Query untuk mencari user berdasarkan username yang diberikan
    $query = "SELECT id_user, username_user, password_user FROM users WHERE username_user = '$username_user'";
    //$query2 = "SELECT id_user FROM users";
    $result = $conn->query($query);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $harga = $_POST['harga']; // Nilai dari 'nilai_post1'
        $paket = $_POST['paket']; // Nilai dari 'nilai_post2'
        $pgg = $_POST['pgg'];
    }

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        //$row2 = $result->fetch_assoc();
        $hashed_password = $row['password_user'];
        $hashed_username = $row['username_user'];

        $session_data1 = [
            'id_user'=> $row['id_user'],
            'username_user' => $row['username_user']
        ];

        $pggi = intval($pgg);
        $id_user = $session_data1['id_user'];
        
        // Memeriksa apakah password yang dimasukkan cocok dengan password di database
        if ($password_user === $hashed_password) {
            
            
            if($pggi == 1){
                $dataarr1 = array(
                    'pg' => $pggi,
                    'harga' => $harga,
                    'paket' => $paket,
                    'iduser' => $id_user
                );
    
                $dataarr = serialize($dataarr1);
                header("Location: ../Payment/payment-gateway.php?dataarr=" . urlencode($dataarr));
                exit();
                // var_dump($session_data);
            }else{
                header("Location: ../Users/Main.php?iduser=$id_user");
                exit();
            }
        } else if($username_user != $hashed_username){
            echo "Invalid username.";
        } else if($password_user != $hashed_password){
            var_dump($harga);
            echo "<br>";
            var_dump($paket);
            echo "<br>";
            var_dump($pgg);
            echo "<br>";
            var_dump($id_user);
            echo "<br>";
            echo "Invalid password.";
        }
    } else {
        //echo $hashed_password;
        //var_dump($hashed_username);
        echo "<br>";
        echo "Invalid username or password.";
    }

    /*
    $query = "SELECT * FROM users";
    if($conn->query($query)) {
        while ($row = $result2->fetch_assoc()) {
            $usrnm = $row['username_user'];
            $pswrd = $row['password_user'];
            if (isset($_POST['submit'])) {
                $username_user = $_POST['username_user'];
                $password_user = $_POST['password_user'];
                if ($username_user == $usrnm && $password_user == $pswrd) {
                    header("Location: ../Users/Main.php");
                    exit();
                } else if($usrnm == null && $pswrd == null){
                    header("Location: ../Users/signin.php");
                } else{
                    echo "Invalid username or password.";
                }
            }
        }
    }*/
}

/*$stmt = $pdo->prepare($query);
$stmt->bindParam(':email', $email);
$stmt->execute();*/

/*
if ($stmt->rowCount() > 0) {
    // Pengguna sudah terdaftar, lakukan tindakan yang sesuai

    echo "Pengguna dengan email tersebut sudah terdaftar.";
} else {
    // Pengguna belum terdaftar, tambahkan data pengguna ke database
    $insertQuery = "INSERT INTO users (nama, email) VALUES (:nama, :email)";
    $insertStmt = $pdo->prepare($insertQuery);
    $insertStmt->bindParam(':nama', $nama);
    $insertStmt->bindParam(':email', $email);
    $insertStmt->execute();

    echo "Data pengguna berhasil ditambahkan ke database.";
}*/
