<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../images/brand_favicon.png">
</head>

<?php
    include "../DBConnection/connection.php";
    
    if(isset($_GET['dataarr'])){
        $dataarr1 = $_GET['dataarr'];
        $dataarr = unserialize(urldecode($dataarr1));

        $harga = $dataarr['harga'];
        $paket = $dataarr['paket'];
        $pgg = $dataarr['pg'];
        $id_user = $dataarr['iduser'];

        var_dump($harga);
        var_dump($paket);
        var_dump($pgg);

        $harga_customer = intval($harga);
        $paket_customer = $paket;
        $order_id_customer = rand();
        $transaction_status_customer = 1;

        mysqli_query($conn, "INSERT INTO customers(harga_dibayar_customer, paket_customer, order_id_customer, transaction_status_customer, id_user) VALUES('$harga_customer', '$paket_customer', '$order_id_customer', '$transaction_status_customer', '$id_user')");
        header("location:./midtrans/examples/snap/checkout-process-simple-version.php?order_id=$order_id");
    }else{

        session_start();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $id_user = $_POST['iduser'];
        //var_dump($id_user);
        $nilai_post1 = $_POST['nilai_post1']; // Nilai dari 'nilai_post1'
        $nilai_post2 = $_POST['nilai_post2']; // Nilai dari 'nilai_post2'
        $nilai_post3 = $_POST['nilai_post3']; // Nilai dari 'nilai_post3'

            if($nilai_post1){
                $harga = $nilai_post1;
                $paket = "Basic";
            }else if($nilai_post2){
                $harga = $nilai_post2;
                $paket = "Standard";
            }else if($nilai_post3){
                $harga = $nilai_post3;
                $paket = "Premium";
            }
        }
        //var_dump($id_user);

        if($id_user == NULL){
            $pesan = "maaf anda harus login terlebih dahulu";
            $pg = 1;
            $dataarr1 = array(
                'pg' => $pg,
                'harga' => $harga,
                'paket' => $paket
            );

            $dataarr = serialize($dataarr1); 

            echo "<script>alert('$pesan');</script>";
            header("Refresh: 1; URL=../Users/login.php?dataarr=" . urlencode($dataarr));
            exit();
         }

        $harga_customer = intval($harga);
        //var_dump($harga_customer);
        $paket_customer = $paket;
        $order_id_customer = rand();
        $transaction_status_customer = 1;

        var_dump($order_id_customer);

        $dataarr2 = array(
            'iduser' => $id_user,
            'harga' => $harga_customer,
            'paket' => $paket_customer,
            'orderid' => $order_id_customer,
            'transactionstat' => $transaction_status_customer
        );

        $dataarr = serialize($dataarr2); 
        header("location:./../midtrans/examples/snap/checkout-process-simple-version.php?dataarr=" . urlencode($dataarr));
        //mysqli_query($conn, "INSERT INTO customers(harga_dibayar_customer, paket_customer, order_id_customer, transaction_status_customer, id_user) VALUES('$harga_customer', '$paket_customer', '$order_id_customer', '$transaction_status_customer', '$id_user')");
        //header("location:./midtrans/examples/snap/checkout-process-simple-version.php?order_id=$order_id_customer");
    }    

    /*
    mysqli_query($conn, "INSERT INTO customers(harga_dibayar_customer, paket_customer, order_id_customer, transaction_status_customer, id_user) VALUES('$harga_customer', '$paket_customer', '$order_id_customer', '$transaction_status_customer', '$id_user')");
    header("location:./midtrans/examples/snap/checkout-process-simple-version.php?order_id=$order_id");*/
?>