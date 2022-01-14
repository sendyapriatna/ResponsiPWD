<div class="row">
    <h2>Menampilkan Data Produk dengan JSON</h2>
    <?php
    // Memamnggil koneksi php untuk menghubungkan ke database
    include "../koneksi.php";
    // Query untuk menampilkan semua data produk berdasarkan id
    $sql = "select * from produk order by id";
    $tampil = mysqli_query($koneksi, $sql);
    // Kondisi jika terdapat data maka akan menjalankan fungsi if
    if (mysqli_num_rows($tampil) > 0) {
        $no = 1;
        $response = array();
        $response["data"] = array();
        // Menyimpan data produk pada variable berbentuk array
        while ($r = mysqli_fetch_array($tampil)) {
            $h['id'] = $r['id'];
            $h['nama_produk'] = $r['nama_produk'];
            $h['supplier'] = $r['supplier'];
            $h['stok'] = $r['stok'];
            $h['harga'] = $r['harga'];
            array_push($response["data"], $h);
        }
        echo json_encode($response);
    } else {
        $response["message"] = "tidak ada data";
        echo json_encode($response);
    }
    ?>
</div>