<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id_penjual= $_POST['id_penjual'];
    $nama=$_POST['nama'];
    $jenis=$_POST['jenis'];
    $harga=$_POST['harga'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE users SET id_penjual='$id_penjual',nama='$nama',jenis='$jenis',harga='$harga' WHERE id_penjual=$id_penjual");
    
    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id_penjual = $_GET['id_penjual'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id_penjual=$id_penjual");
 
while($user_data = mysqli_fetch_array($result))
{
    $nama = $user_data['nama'];
    $jenis = $user_data['jenis'];
    $harga = $user_data['harga'];
}
?>
<html>
<head>	
    <title>Edit User Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form nama="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama" value=<?php echo $nama;?>></td>
            </tr>
            <tr> 
                <td>Jenis</td>
                <td><input type="text" name="alamat" value=<?php echo $jenis;?>></td>
            </tr>
            <tr> 
                <td>Harga</td>
                <td><input type="text" name="harga" value=<?php echo $harga;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id_penjual" value=<?php echo $_GET['id_penjual'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>