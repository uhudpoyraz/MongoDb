<?php
$mongo=new Mongo();
$db=$mongo->blog;
$news=$db->news;
$category=$db->category;
if($_POST){
$title=$_POST['title'];
$icerik=$_POST['icerik'];
$kategori=$_POST['kategori'];

$ekle=array("title"=>$title,"icerik"=>$icerik,"kategori"=>$kategori);
$news->insert($ekle);
}

$newslist=$news->find();
echo '<table border="1">
<tr><td>Title</td><td>icerik</td><td>kategori</td><td>Dasdasdas</td></tr>';
foreach($newslist as $b){
$kat=$category->findOne(array("_id"=>new MongoId($b['kategori'])));
echo '<tr><td>'.$b['title'].'</td><td>'.$b['icerik'].'</td><td>'.$kat['title'].'</td><td><a href="haberduzenle.php?id='.$b['_id'].'">duzenle</a></td></tr>';

}
echo '</table><br><br><br>';

?>
<table border="1">
<form method="post">
<tr><td>Title  </td><td><input type="text" name="title" value=""></td></tr>
<tr><td>icerik  </td><td><input type="text" name="icerik" value=""></td></tr>
<tr><td>kategori</td><td>
<select name="kategori">
<?php 
$list=$category->find();
foreach ($list as $a){
echo '<option value="'.$a['_id'].'">'.$a['title'].'</option>
';

}

?>
</select></td></tr>
<tr><td><input type="submit" value="gonder" name="button"</td></tr>
</form>
</table>


