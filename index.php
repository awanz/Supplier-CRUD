<?php
    require_once("db.php");

    if ($_POST) {
        // print_r($_POST);
        // die();

        $kodeklp = 0;
        if($_POST['tipe'] == 'SUPPLIER'){
            $kodeklp = 'S';
            $query = "SELECT kodeklp FROM keu_5klsupplier WHERE kodeklp LIKE 'S%' ORDER BY id DESC LIMIT 1 ";
            $queryact = mysqli_query($koneksi, $query);
            $q = mysqli_fetch_assoc($queryact);
            
            if(empty($q)){
                $kodeklp .= '001';
            }else{
                $temp = ltrim($q['kodeklp'], "S");
                $temp += 1;
                if($temp > 999){
                    die("nilai max K999");
                }
                $temp = sprintf("%03d", $temp);
                $kodeklp .= $temp;
            }

            $namaklp = $_POST['namaklp'];
            $noakun = $_POST['noakun'];
            $tipe = $_POST['tipe'];

            // $query = "INSERT INTO keu_5klsupplier(namaklp, noakun, tipe) VALUE ($namaklp, $noakun, $tipe)";
            $query = "INSERT INTO `keu_5klsupplier`(`kodeklp`, `namaklp`, `noakun`, `tipe`) VALUES ('$kodeklp', '$namaklp',  '$noakun', '$tipe')";
            $queryact = mysqli_query($koneksi, $query);
        }

        if($_POST['tipe'] == 'KONTRAKTOR'){
            $kodeklp = 'K';
            $query = "SELECT kodeklp FROM keu_5klsupplier WHERE kodeklp LIKE 'K%' ORDER BY id DESC LIMIT 1 ";
            $queryact = mysqli_query($koneksi, $query);
            $q = mysqli_fetch_assoc($queryact);
            
            if(empty($q)){
                $kodeklp .= '001';
            }else{
                $temp = ltrim($q['kodeklp'], "K");
                $temp += 1;
                if($temp > 999){
                    die("nilai max K999");
                }
                $temp = sprintf("%03d", $temp);
                $kodeklp .= $temp;
            }

            $namaklp = $_POST['namaklp'];
            $noakun = $_POST['noakun'];
            $tipe = $_POST['tipe'];

            // $query = "INSERT INTO keu_5klsupplier(namaklp, noakun, tipe) VALUE ($namaklp, $noakun, $tipe)";
            $query = "INSERT INTO `keu_5klsupplier`(`kodeklp`, `namaklp`, `noakun`, `tipe`) VALUES ('$kodeklp', '$namaklp',  '$noakun', '$tipe')";
            $queryact = mysqli_query($koneksi, $query);
        }

        


        
    }
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
        <li><a href="index.php" class="active">INPUT</a></li>
        <li><a href="keu_5akun.php">keu_5akun</a></li>
        <li><a href="keu_5klsupplier.php">keu_5klsupplier</a></li>
    </ul>
    <div class="main-content">
        <form class="form-basic" method="POST" action="">
            <div class="form-title-row">
                <h1>INPUT DATA</h1>
            </div>
            <div class="form-row">
                <label>
                    <span>Nama KLP</span>
                    <input type="text" name="namaklp" required>
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
                        <option value="<?php echo $q['noakun']; ?>"><?php echo $q['namaakun'];  ?></option>
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
                        <option>KONTRAKTOR</option>
                        <option>SUPPLIER</option>
                    </select>
                </label>
            </div>
            <div class="form-row">
                <center><input type="submit" style="color: white;" class="btn btn-primary" value="Simpan"></center>
            </div>
        </form>
    </div>
</body>

</html>
