<?php
// This is just for very basic implementation reference, in production, you should validate the incoming requests and implement your backend more securely.
// Please refer to this docs for snap popup:
// https://docs.midtrans.com/en/snap/integration-guide?id=integration-steps-overview

namespace Midtrans;

require_once dirname(__FILE__) . '/../../Midtrans.php';
// Set Your server key
// can find in Merchant Portal -> Settings -> Access keys


Config::$serverKey = 'SB-Mid-server-BRE6dJMPp03POatV03zvqnw3';
Config::$clientKey = 'SB-Mid-client-BKi0SemmgJv4QAMO';

// non-relevant function only used for demo/example purpose
//printExampleWarningMessage();

// Uncomment for production environment
//Config::$isProduction = true;
Config::$isSanitized = Config::$is3ds = true;

// Required

include "../../../DBConnection/connection.php";

if(isset($_GET['dataarr'])){
    $dataarr1 = $_GET['dataarr'];
    $dataarr = unserialize(urldecode($dataarr1));

    $harga = $dataarr['harga'];
    $paket = $dataarr['paket'];
    $order_id = $dataarr['orderid'];
    $id_user1 = $dataarr['iduser'];
    $id_user = intval($id_user1);

    //var_dump($order_id);
    //var_dump($id_user);
}

$query = "SELECT username_user, email_user FROM users WHERE id_user = $id_user";
$sql = mysqli_query($conn, $query);

if ($sql) {
    $data = mysqli_fetch_assoc($sql);
    $nama = $data['username_user'];
    $email = $data['email_user'];
    //var_dump($data);
    //echo "$name <br>";
    //echo "$email";    
} else {
    echo "Query error: " . mysqli_error($conn); // Tampilkan kesalahan jika terjadi kesalahan dalam query
}

$transaction_details = array(
    'order_id' => $order_id,
    'gross_amount' => $harga, // no decimal allowed for creditcard
);

$item_details = array(
    array(
        'id' => 'a1',
        'price' => $harga,
        'quantity' => 1,
        'name' => 'Pembayaran Paket ' . $paket
    )
);

$customer_details = array(
    'nama' => "$nama",
    'last_name' => "",
    'email' => "$email",
    'phone' => ""
);

$transaction = array(
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
);

$snap_token = '';
try {
    $snap_token = Snap::getSnapToken($transaction);
}
catch (\Exception $e) {
    echo $e->getMessage();
}
echo "snapToken = ".$snap_token;

function printExampleWarningMessage() {
    if (strpos(Config::$serverKey, 'your ') != false ) {
        echo "<code>";
        echo "<h4>Please set your server key from sandbox</h4>";
        echo "In file: " . __FILE__;
        echo "<br>";
        echo "<br>";
        echo htmlspecialchars('Config::$serverKey = \'<your server key>\';');
        die();
    } 
}
?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="../Snap/style.css">
    <link rel="icon" href="../../../images/brand_favicon.png">
    </head>
    <body>
        <div class="card">
            <p class="text1"> Paket yang kamu pilih berhasil terdaftar, Selesaikan pembayaran sekarang</p>
            <button id="pay-button" class="pay-button">Pilih Metode Pembayaran</button>
        </div>
        <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo Config::$clientKey;?>"></script>
        <script type="text/javascript">
            document.getElementById('pay-button').onclick = function(){
                // SnapToken acquired from previous step
                snap.pay('<?php echo $snap_token?>');
            };
        </script>
    </body>
</html>
