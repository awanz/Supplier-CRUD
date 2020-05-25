<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Supplier CRUD</title>

	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/form-basic.css">


    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/dataTables.bootstrap.css"/>
</head>


	<header>
		<h1>Supplier CRUD</h1>
    </header>

    <ul>
        <li><a href="index.php">INPUT</a></li>
        <li><a href="keu_5akun.php" class="active">keu_5akun</a></li>
        <li><a href="keu_5klsupplier.php">keu_5klsupplier</a></li>
    </ul>


    <div class="main-content">
      <div class="container">
			<div class="col-md-12 col-xs-12 col-lg-12">

        <!-- You only need this form and the form-basic.css -->

            <table id="putri" class="table table-bordered">
            <thead>
                <tr>
                    <th>No Akun</th>
                    <th>Nama Akun</th>
                    <th>Nama Akun 1</th>
                    <th>Tipe Akun</th>
                    <th>Kas Bank</th>
                    <th>Level</th>
                    <th>matauang</th>
                    <th>Kode org</th>
                    <th>Detail</th>
                    <th>Field Aktif</th>
                    <th>Pemilik</th>
                </tr>
            </thead>
            <tbody>
                    <?php

                    //Data mentah yang ditampilkan ke tabel
                    require_once("db.php");
                    $query = "SELECT * FROM keu_5akun";
                    $queryact = mysqli_query($koneksi, $query);
                    while ($q = mysqli_fetch_assoc($queryact)) {
                    ?>

                    <tr>
                        <td><?php echo  $q['noakun']; ?></td>
                        <td><?php echo  $q['namaakun']; ?></td>
                        <td><?php echo  $q['namaakun1']; ?></td>
                        <td><?php echo  $q['tipeakun']; ?></td>
                        <td><?php echo  $q['kasbank']; ?></td>
                        <td><?php echo  $q['level']; ?></td>
                        <td><?php echo  $q['matauang']; ?></td>
                        <td><?php echo  $q['kodeorg']; ?></td>
                        <td><?php echo  $q['detail']; ?></td>
                        <td><?php echo  $q['fieldaktif']; ?></td>
                        <td><?php echo  $q['pemilik']; ?></td>
                    </tr>
                    <?php
                    }
                    ?>
            </tbody>
            </table>
            </div>
        </div>
    </div>

    <script src="js/jquery-1.11.0.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="datatables/jquery.dataTables.js"></script>
    <script src="datatables/dataTables.bootstrap.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#putri").dataTable();
        });
    </script>
</body>

</html>
