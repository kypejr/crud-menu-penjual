<html>
<head>
    <title>Add Users</title>
</head>
 
<body>
    <a href="index.php">Go to Home</a>
    <br/><br/>
 
    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Id_Penjual</td>
                <td><input type="text" name="id_penjual"></td>
            </tr>
            <tr> 
                <td>Nama_Produk</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr> 
                <td>Jenis</td>
                <td><select name="jenis" id="jenis">
                <option value="jenis">Makanan Ringan</option>
                <option value="jenis">Makanan Cepat Saji</option>
                </select></td>
            </tr>
            <tr> 
                <td>Harga</td>
                <td><input type="text" name="harga"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    
    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $id_penjual = $_POST['id_penjual'];
        $nama = $_POST['nama'];
        $jenis = $_POST['jenis'];
        $harga = $_POST['harga'];
        
        // include database connection file
        include_once("config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO penjual(id_penjual,nama,jenis,harga) VALUES('$id_penjual','$nama','$jenis','$harga')");
        
        // Show message when user added
        echo "Menu added successfully. <a href='index.php'>View Menu</a>";
    }
    ?>
</body>
</html>