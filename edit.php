<?php
    require_once("db.php");

    $id = $_GET['id'];

    if (!isset($_GET['id'])) {
    header("Location: keu_5klsupplier.php");
    }

    if ($_POST) {
        $namaklp = $_POST['namaklp'];
        $noakun = $_POST['noakun'];
        $tipe = $_POST['tipe'];
        $query = "UPDATE keu_5klsupplier SET namaklp = '$namaklp', noakun = '$noakun', tipe = '$tipe' WHERE id = $id";
        $queryact = mysqli_query($koneksi, $query);
        header("Location: keu_5klsupplier.php");
    }

    $query = "SELECT * FROM keu_5klsupplier WHERE id=$id";
    $queryact = mysqli_query($koneksi, $query);
?>

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
        <li><a href="index.php" class="active">EDIT</a></li>
        <li><a href="keu_5akun.php">keu_5akun</a></li>
        <li><a href="keu_5klsupplier.php">keu_5klsupplier</a></li>
    </ul>
    <div class="main-content">
        <form class="form-basic" method="POST" action="">
        <?php while ($x = mysqli_fetch_assoc($queryact)) {?>
            <div class="form-title-row">
                <h1>EDIT DATA</h1>
            </div>
            <div class="form-row">
                <label>
                    <span>Nama KLP</span>
                    <input type="text" name="namaklp" value="<?= $x['namaklp']; ?>" required>
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>No Akun</span>
                    <select name="noakun" required>
                        <?php
                            $query = "SELECT `noakun`, `namaakun` FROM keu_5akun WHERE `noakun` like '211%'";
                            $queryact = mysqli_query($koneksi, $query);
                            while ($q = mysqli_fetch_assoc($queryact)) {
                        ?>
                        <option <?php if($x['noakun'] == $q['noakun']){echo "SELECTED";} ?> value="<?php echo $q['noakun']; ?>"><?php echo $q['namaakun'];  ?></option>
                        <?php 
                            }
                        ?>
                    </select>
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>Tipe</span>
                    <select name="tipe" required>
                        <option <?php if($x['tipe'] == 'KONTRAKTOR'){echo "SELECTED";} ?>>KONTRAKTOR</option>
                        <option <?php if($x['tipe'] == 'SUPPLIER'){echo "SELECTED";} ?>>SUPPLIER</option>
                    </select>
                </label>
            </div>
        <?php } ?>
            <div class="form-row">
                <center><input type="submit" style="color: white;" class="btn btn-primary" value="Simpan"></center>
            </div>
        </form>
    </div>
</body>

</html>
