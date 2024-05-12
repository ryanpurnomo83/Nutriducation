<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Offering Packages</title>
  <link rel="stylesheet" href="style2.css">
  <link rel="icon" href="../images/brand_favicon.png">
</head>

<?php
  if(isset($_GET['iduser'])){
    $id_user = $_GET['iduser'];
    //var_dump($id_user);
  }
?>

<body>
  <div class="container">
    <h1>Penawaran Paket</h1>

    <form id="form1" name="form_harga" action="../Payment/payment-gateway.php" method="post">
        <div class="packages">

            <div class="package">
                <h2>Basic</h2>
                <p class="price">Rp. 150.000,00/bulan</p>
                <p style="display:none;" id="hiddenInput1">150000</p>
                <input type="hidden" name="iduser" value="<?php echo $id_user; ?>">
                <ul>
                <li>Kalkulator Gizi</li>
                <li>Sosial Media</li>
                <li></li>
                </ul>
                <!---<a href="" class="btn">Select</a>--->
                <input type="hidden" name="nilai_post1" id="nilai_post1" value="">
                <button type="button" class="btn" onclick="submitForm('hiddenInput1', 'nilai_post1')">Select</button>
            </div>
        

            <div class="package">
                <h2>Standard</h2>
                <p class="price">Rp. 300.000,00/bulan</p>
                <p style="display:none;" id="hiddenInput2" >300000</p>
                <ul>
                <li>Kalkulator Gizi</li>
                <li>Sosial Media</li>
                <li>Visitasi Kebun (dengan menggunakan API Google Maps)</li>
                </ul>
                <input type="hidden" name="nilai_post2" id="nilai_post2" value="">
                <button type="button" class="btn" onclick="submitForm('hiddenInput2', 'nilai_post2')">Select</button>
            </div>


            <div class="package">
                <h2>Premium</h2>
                <p class="price">Rp. 650.000,00/bulan</p>
                <p style="display:none;" id="hiddenInput3">650000</p>
                <ul>
                <li>Kalkulator Gizi</li>
                <li>Sosial Media</li>
                <li>Visitasi Kebun</li>
                <li></li>
                </ul>
                <input type="hidden" name="nilai_post3" id="nilai_post3" value="">
                <button type="button" class="btn" onclick="submitForm('hiddenInput3', 'nilai_post3')">Select</button>
            </div>
        </div>
    </form>
  </div>


  <script>   

    function submitForm(hiddenInputId, inputName) {
        // Mendapatkan nilai dari elemen <p> yang tersembunyi
        var nilaiP = document.getElementById(hiddenInputId).innerText;
        //var inputP = document.getElementById(inputName);
        //inputP.value = nilaiP;

        // Menetapkan nilai ke input tersembunyi dalam formulir yang bersangkutan
        
        document.querySelector('input[name="' + inputName + '"]').value = nilaiP;
        
        // Submit formulir yang sesuai dengan tombol yang ditekan
        document.getElementById('form1').submit();
    }



    /*
    document.getElementById('form1').addEventListener('submit', function(event) {
    event.preventDefault();
    var nilaiP = document.getElementById('1').textContent;
    document.getElementById('hiddenInput').value = nilaiP;
    this.submit();
    });
    */
  </script>
</body>
</html>
