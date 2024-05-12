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

<?php
  if(isset($_GET['iduser'])){
    $id_user = $_GET['iduser'];
    //var_dump($id_user);
  }
?>

<body>
  <div class="topnav" id="myTopnav">

      <div class="sidebar sidebar-block-open sidebar-background sidebar-card sidebar-animate-left" style="display:none; z-index: 2" id="sidebar">
        <button onclick="sidebar_close()" class="sidebar-button-os">Close &times;</button>
            <a href="../Product/offering.php?iduser=<?php echo $id_user?>" class="sidebar-item">Premium Feature</a>
            <a href="" class="sidebar-item">Facility</a>
      </div>

    <a>
      <div class="sidebar-block-close">
        <button onclick="sidebar_open()" class="sidebar-button-cs">☰</button>
      </div>
    </a>

    <a href="main.php">Home</a>
    <a href="../Admin/kontak.php">Kontak</a>
    <div class="dropdown">
      <a href="#kategori">Kategori</a>
      <div class="dropdown-content">
        <a href="../Product/bahan-makanan.php">Bahan Makanan</a>
        <a href="../Product/jenis-penyakit.php">Penyakit</a>
        <a href="../Product/resep-masakan.php">Resep Masakan</a>
        <a href="../Product/kalkulator-bahan_makanan.php">Kalkulator</a>
      </div>
    </div>
    <a href="../Product/tentang.php">Tentang</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
    <div class="search-container">
      <form action="../Product/Search.php" method="post">
        <input type="text" placeholder="Search.." name="search">
        <button type="submit">Submit</button>
      </form>
    </div>
  </div>


  <div class="slideshow-container">

    <div class="mySlides fade">
    <video width="100%" autoplay loop muted playsinline style="border: none;">
      <source src="../images/3.mp4" type="video/mp4">
      </video>
      
    </div>

    <div class="mySlides fade">
      <img src="../images/1.png" style="width:100%">
    </div>

    <div class="mySlides fade">
      <img src="../images/2.png" style="width:100%">
    </div>

    <a class="prev" onclick="plusSlides(-1)"></a>
    <a class="next" onclick="plusSlides(1)"></a>

  </div>
  <br>

  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
  </div>

  <?php
  ?>

<h1 class="title-card">Want to Check your Daily Nutrition ?</h1>
  <div class="card">
    <div class="circle">
      <div class="progress-bar" style="--i:85; --clr:#43f94a;">
        <h3>85<span>%</span></h3>
        <h4>Asupan Kalori</h4>
      </div>
    </div>
    <div class="container">
      <h1 class="">Nutrition Facts</h1>
      <table class="table-all">
        <thead>
          <tr>
            <th>Amount Per Serving</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th><b>Calories</b></th>
            <td class="cal-res">1774</td>
          </tr>
          <tr>
            <th><b>Total Fat "18.3 gram"</b></th>
          </tr>
          <tr>
            <th><b>Cholestrol "0 mg"</b></th>
          </tr>
          <tr>
            <th><b>Sodium "70 mg"</b></th>
          </tr>
          <tr>
            <th><b>Protein "70 gram"</b></th>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <?php
  ?>
  <script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      if (n > slides.length) {
        slideIndex = 1
      }
      if (n < 1) {
        slideIndex = slides.length
      }
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
    }

    function sidebar_open(){
      document.getElementById("sidebar").style.display = "block";
    }

    function sidebar_close(){
      document.getElementById("sidebar").style.display = "none";
    }
  </script>

  <footer>
    <p>@</p>
  </footer>
</body>

</html>