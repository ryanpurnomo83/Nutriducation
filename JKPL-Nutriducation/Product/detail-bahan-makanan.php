<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../images/brand_favicon.png">
</head>

<?php


$app_id = '9347674b';
$apikey = '96865767f90b24c3546329a90efb51c4';
$ntrtype = 'logging';
if (isset($_GET['id'])){
    $coba = $_GET['id'];
}
$ingr = urlencode('1750 ml ' . $_GET['id']);
$url = 'https://api.edamam.com/api/nutrition-data?' . 'app_id='  . $app_id . '&app_key=' . $apikey . '&nutrition-type=' . $ntrtype . '&ingr=' . $ingr;
$konten = file_get_contents($url);
?>

<body>
<div class="title">FOOD DETAILS</div>
<?php
/*
    $app_id2 = 'da8bf3cf';
    $apikey2 = '6b776ab38275c832c8e078b39b37b1bb';
    $type = 'public';
    $q = $coba;
    $ingr2 = '1-10';
    $iS = 'REGULAR';
    $url2 = 'https://api.edamam.com/api/recipes/v2?' . 'type='  . $type . '&q='  . $q . '&app_id=' . $app_id2 . '&app_key=' . $apikey2 . '&ingr=' . $ingr2 . '&imageSize=' . $iS;
    $konten2 = file_get_contents($url2);
    $decode = json_decode($konten2);

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
    foreach ($data as $item) {
        $var1 = $item['image'];
        $var2 = $item['label'];
        $var3 = $item['ingredientLines'];
        //session_start();}*/
?>

        
</body>
</html>