	  <?php
	  		include 'koneksi_restaurant.php';
	  $nama=$_GET["nama"];
	  $alamat=$_GET["alamat"];
	  $notelp=$_GET["notelp"];
	  $email=$_GET["email"];
	  $pesanan=$_GET["pesanan"];
	  /*if(isset($_POST['nama_pembeli'])) {
	  $error = 0;
	  if ($_POST['nama_pembeli'] == null);{
		  $error== true;
		  echo ('Nama tidak boleh kosong');
	  }
		  ($_POST['alamat']== null);{
		  $error== true;
		  echo('alamat tidak boleh palsu');
		  }
		  ($_POST['email'] == null);{
			$error== true;
			echo ('email tidak boleh kosong');
		 }
		  ($_POST['nomor_telpon']==null);{
		  $error==true;
		  echo('nomer telpon tidak boleh kosong');
		  }
		  if ($error==false){
			  $namapembeli=$_POST["nama_pembeli"];
			  $alamat=$_POST["alamat"];
			  $email=$_POST["email"];
			  $nomor_telpon=$_POST["nomor_telpon"];*/
			  
			  $sql="INSERT into tb_pembeli(nama_pembeli,alamat,email,nomor_telpon) VALUES('$nama','$alamat','$email','$notelp');";
			mysqli_query($conn, $sql);
			$sql="select id from tb_pembeli where nama_pembeli='$nama' and alamat='$alamat'";
			$result=mysqli_query($conn, $sql);
			$row=mysqli_fetch_array($result);
			$id=$row["id"];
			$sql="INSERT INTO `tb_transaksi`(`tanggal_transaksi`, `id_pembeli`, `id_barang`) VALUES (NOW(),'$id','$pesanan')";
			mysqli_query($conn, $sql);
			//kode kirim email
			$to = "farhanalfaizi11@gmail.com";
$subject = "Order Oleh-Oleh.com";
$txt = "Ada yang Memesan Barang, mohon cek database anda";

$headers = "From: order@oleholeh.com" . "\r\n" .
"CC: ".$email;

mail($to,$subject,$txt,$headers);
			echo 'Transaksi berhasil<br/>';
			echo '<a href="index.php"><button type="button" class="btn btn-md">Ok</button></a>';
			
		
	  	
	  ?>
