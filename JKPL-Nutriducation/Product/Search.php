<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../images/brand_favicon.png">
</head>
<style>
  .mySlides {
    display: block;
  }

  .sidebar{
    height: 100%;
    width: 200px;
    position: fixed!important;
    overflow: auto;
  }

  .sidebar-background{
    color: #000;
    background-color: #333;
  }

  .sidebar-card{
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);
  }

  .sidebar-animate-left{
    animation: animateleft 0.4s;
  }

  .sidebar-block-close{
    color: #fff;
  }

  .sidebar-button-cs{
    background-color: #333;
    color: #fff;
  }

  .sidebar-button-os{
    background-color: #333;
    color: #fff;
  }
</style>
<body>
    <div class="topnav" id="myTopnav">

        <div class="sidebar sidebar-block-open sidebar-background sidebar-card sidebar-animate-left" style="display:none; z-index: 2" id="sidebar">
        <button onclick="sidebar_close()" class="sidebar-button-os">Close &times;</button>
            <a href="../Product/offering.php" class="sidebar-item">Premium Feature</a>
            <a href="" class="sidebar-item">Facility</a>
        </div>

        <a>
        <div class="sidebar-block-close">
        <button onclick="sidebar_open()" class="sidebar-button-cs">☰</button>
        </div>
        </a>
        <a href="../Users/main.php">Home</a>
        <a href="#contact">Kontak</a>
        <div class="dropdown">
            <a href="#kategori">Kategori</a>
            <div class="dropdown-content">
                <a href="bahan-makanan.php">Bahan Makanan</a>
                <a href="#">Penyakit</a>
                <a href="#">Resep Masakan</a>
            </div>
        </div>
        <a href="../Product/tentang.php">Tentang</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
        <div class="search-container">
            <form action="../Product/Search.php" method="post">
                <input type=" text" placeholder="Search.." name="search">
                <button type="submit">Search</button>
            </form>
        </div>
    </div>

    <?php
    $value = $_POST['search'];
    //var_dump($value);
    $app_id = 'da8bf3cf';
    $apikey = '6b776ab38275c832c8e078b39b37b1bb';
    $type = 'public';
    $q = $value;
    $ingr = '1-10';
    $iS = 'REGULAR';
    $url = 'https://api.edamam.com/api/recipes/v2?' . 'type='  . $type . '&q='  . $q . '&app_id=' . $app_id . '&app_key=' . $apikey . '&ingr=' . $ingr . '&imageSize=' . $iS;
    $konten = file_get_contents($url);
    $decode = json_decode($konten);
    //$decode2 = json_decode($konten, true);
    //$jD = count($decode2);
    //echo $jD;
    foreach ($decode->hits as $hit) {
        $recipe = $hit->recipe;
        $item = array(
            'image' => $recipe->image,
            'label' => $recipe->label,
            'ingredientLines' => $recipe->ingredientLines
        );
        $data[] = $item;
    }

    // Menampilkan semua isi data
   
    ?>

    <div style="display: flex; flex-direction: row; flex-wrap: wrap; justify-content: center;" class="wrapper">
    <?php
    foreach ($data as $item) {
        $var1 = $item['image'];
        $var2 = $item['label'];
        $var3 = $item['ingredientLines'];
        //session_start();
    ?>
    <br>
        <!-- <main> -->
            <div style="margin: 1rem;" class="card">
                <div class="image">
                    <img src="<?php echo $var1; ?>" alt="Avatar">
                </div>
                <a href="detail-bahan-makanan.php?id=<?php echo $var2; ?>" class="link-to">
                    <div class="container">
                        <h4 class="nama-bahan-makanan">
                            <b>
                            <?php echo $var2;//$_SESSION['bahan'] = $var2  ?>
                            </b>
                        </h4>
                        <ul>
                            <?php foreach ($var3 as $ingredient) { ?>
                                <li><?php echo $ingredient;} ?>
                                </li>
                        </ul>
                    </div>
                </a>
            </div>
        <!-- </main> -->
    <?php
    }
    ?>
    </div>

    <script>
        function sidebar_open(){
             document.getElementById("sidebar").style.display = "block";
        }

        function sidebar_close(){
             document.getElementById("sidebar").style.display = "none";
        }
  </script>
    </script>
</body>

</html>