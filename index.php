<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h1 class="mb-4">Input Barang</h1>

                <?php
                session_start();
                include 'gudang_db.php';

                if (isset($_SESSION['sukses'])) {
                    echo '<div class="alert alert-success">' . $_SESSION['sukses'] . '</div>';
                }

                session_destroy();
                ?>

                <form action="tambah_data.php" method="post" class="mb-5">
                    <div class="form-group">
                        <label for="barang">Pilih Barang</label>
                        <select class="form-control" name="id" id="barang">
                            <option value="1">Susu Kotak</option>
                            <option value="2">Permen</option>
                            <option value="3">Biskuit</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="barang_masuk">Jumlah Barang Masuk</label>
                        <input type="number" name="barang_masuk" id="barang_masuk" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Barang</button>
                </form>

                <h1 class="mb-4">Barang Keluar</h1>

                <?php
                if (isset($_SESSION['sukses_barang_keluar'])) {
                    echo '<div class="alert alert-success">' . $_SESSION['sukses_barang_keluar'] . '</div>';
                }
                ?>

                <form action="barang_keluar.php" method="post" class="mb-5">
                    <div class="form-group">
                        <label for="barang_keluar">Pilih Barang</label>
                        <select class="form-control" name="id" id="barang_keluar">
                            <option value="1">Susu Kotak</option>
                            <option value="2">Permen</option>
                            <option value="3">Biskuit</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="barang_keluar_jumlah">Jumlah Barang Keluar</label>
                        <input type="number" name="barang_keluar" id="barang_keluar_jumlah" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Kurangi Barang</button>
                </form>
            </div>

            <div class="col-md-4">
                <h1 class="mb-4">Stok Barang</h1>

                <?php
                $susu_kotak = "SELECT jumlah FROM stok_barang WHERE id = 1";
                $result_susu_kotak = $conn->query($susu_kotak);
                $row_susu_kotak = $result_susu_kotak->fetch_assoc();

                $permen = "SELECT jumlah FROM stok_barang WHERE id = 2";
                $result_permen = $conn->query($permen);
                $row_permen = $result_permen->fetch_assoc();

                $biskuit = "SELECT jumlah FROM stok_barang WHERE id = 3";
                $result_biskuit = $conn->query($biskuit);
                $row_biskuit = $result_biskuit->fetch_assoc();
                ?>

                <ul class="list-group">
                    <li class="list-group-item">Susu Kotak: <?php echo $row_susu_kotak['jumlah']; ?></li>
                    <li class="list-group-item">Permen: <?php echo $row_permen['jumlah']; ?></li>
                    <li class="list-group-item">Biskuit: <?php echo $row_biskuit['jumlah']; ?></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
