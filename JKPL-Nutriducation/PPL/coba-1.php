<!DOCTYPE html>
<html>
<head>
  <title>Form POST Value</title>
</head>
<body>
  <!---<form action="coba-2.php" method="post">
    <input type="hidden" name="nilai" value="150000">
    <input type="submit" value="Submit">
  </form>
  <p>Nilai yang akan dikirim: <span id="nilaiDisplay">150.000</span></p>
  --->

    <form id="myForm" action="coba-2.php" method="post">
        <p id="nilaiP">150.000</p>
        <input type="hidden" id="hiddenInput" name="nilai_post" value="">
        <button type="submit">Submit</button>
    </form>

  

  <script>
    // Mengambil nilai dari input tersembunyi dan menampilkannya di dalam tag <p>
    /*const nilaiInput = document.querySelector('input[name="nilai"]');
    const nilaiDisplay = document.getElementById('nilaiDisplay');
    nilaiDisplay.textContent = nilaiInput.value.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Menambahkan titik sebagai pemisah ribuan*/

    document.getElementById('myForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Mencegah form untuk langsung melakukan submit

    // Mendapatkan nilai dari elemen <p>
    var nilaiP = document.getElementById('nilaiP').textContent;

    // Mengatur nilai pada input tersembunyi (hidden input) di dalam form
    document.getElementById('hiddenInput').value = nilaiP;

    // Melakukan submit form secara otomatis setelah nilai tersembunyi diatur
    this.submit();
    });

  </script>
</body>
</html>
