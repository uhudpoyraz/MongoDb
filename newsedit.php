<?php
$mongo=new Mongo();
$db=$mongo->blog;
$news=$db->news;
$category=$db->category;
$id=($_GET['id']);
$n=$news->findOne(array("_id"=>new MongoId($id)));

echo $n['title']."aa";


?>

<table border="1">
<form method="post">
<tr><td>Title  </td><td><input type="text" name="title" value="<?php echo $n['title']?>"></td></tr>
<tr><td>icerik  </td><td><input type="text" name="icerik" value="<?php echo $n['icerik']?>"></td></tr>
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