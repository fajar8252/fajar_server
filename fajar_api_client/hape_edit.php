<?php
//Curl untuk tambah data via api
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "http://localhost/fajar_api/api/hape/ubah",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $_POST,
		CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache"
		),
	));
	$response_tambah = curl_exec($curl);
	$err = curl_error($curl);
	$response_tambah = json_decode($response_tambah, true);
	if(isset($response_tambah['code']) == 200){
		echo "<script type=\"text/javascript\">alert('Data Berhasil diubah...!!');window.location.href=\"http://localhost/fajar_api_client/hape.php\";</script>";
	}else{
		echo $response_tambah['data'];
	}
} 
//Curl untuk menghapus data dari api

//Curl untuk mengambil detail data makul dari ednpoint api
if(isset($_GET['id'])){
	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://localhost/fajar_api/api/hape?id=$_GET[id]",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "cache-control: no-cache"
	  ),
	));
	$response = curl_exec($curl);
	$err = curl_error($curl);
	$response = json_decode($response, true);
	if(isset($response['data'])){ 
		foreach ($response['data'] as $value); ?>
		<h3>Tambah Data hape</h3>
		<form class="form-horizontal" method="POST" action="http://localhost/fajar_api_client/hape_edit.php">
			<input type="hidden" name="id" value="<?php echo $value['id']; ?>"/>
			nama* <br/>
			<input type="text" placeholder="nama" name="nama" value="<?php echo $value['nama']; ?>" required/><br/>
			Harga* <br/>
			<input type="text" placeholder="Harga" name="harga" value="<?php echo $value['harga']; ?>" required/><br/>
			Jumlah * <br/>
			<input type="text" placeholder="Jumlah " name="jumlah" value="<?php echo $value['jumlah']; ?>" required/><br/>
			<button type="submit" type="button">
				Submit
			</button>
		</form> <?php
	}
}else{
	echo "Data tidak dikenali";
} ?>