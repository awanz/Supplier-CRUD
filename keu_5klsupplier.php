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
        <li><a href="keu_5akun.php">keu_5akun</a></li>
        <li><a href="keu_5klsupplier.php" class="active">keu_5klsupplier</a></li>
    </ul>


    <div class="main-content">
      <div class="container">
			<div class="col-md-12 col-xs-12 col-lg-12">

        <!-- You only need this form and the form-basic.css -->

            <table id="putri" class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode KLP</th>
                    <th>Nama KLP</th>
                    <th>No Akun</th>
                    <th>Tipe</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                    <?php

                    //Data mentah yang ditampilkan ke tabel
                    require_once("db.php");
                    $query = "SELECT * FROM keu_5klsupplier";
                    $queryact = mysqli_query($koneksi, $query);
                    while ($q = mysqli_fetch_assoc($queryact)) {
                    ?>

                    <tr>
                        <td><?php echo  $q['kodeklp']; ?></td>
                        <td><?php echo  $q['namaklp']; ?></td>
                        <td><?php echo  $q['noakun']; ?></td>
                        <td><?php echo  $q['tipe']; ?></td>
                        <td><a href="edit.php?id=<?php echo $q['id']; ?>">Edit</a> - <a href="delete.php?id=<?php echo $q['id']; ?>">Hapus</a></td>
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
