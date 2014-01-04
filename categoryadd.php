<?php 
$mongo=new Mongo();
$db=$mongo->blog;
$category=$db->category;
if($_POST){
$title=$_POST['title'];
$ekle=array("title"=>"$title");
$category->insert($ekle);
}


$list=$category->find();
	echo "<table border=1><tr><td>title</td><td>Duzenle</td><td>sil</td></tr>";
	foreach($list as $a){
	echo "<tr><td>".$a['title']."</td><td>Duzenle</td><td>sil</td></tr>";
	
	
	}
echo "</table></br>";
?>
<table>
<form method="post">
<tr><td>title</td><td><input type="text" name="title" value=""></td><tr>
<tr><td><input type="submit" value="gonder" name="button"</td></tr>
</form></table>