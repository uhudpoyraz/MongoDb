<?php
$mongo=new Mongo();
$db=$mongo->blog;
$news=$db->news;
$n=$news->findOne(array('_id'=>new mongoid($_GET['id'])));
$category=$db->category;

if($_POST){

$title=$_POST['title'];
$id=$_POST['id'];
$content=$_POST['icerik'];
$category=$_POST['kategori'];
$where=array("_id"=>new mongoid($id));
$update=array('$set'=>array("title"=>$title,"icerik"=>$content,"kategori"=>$category));
$news->update($where,$update);
header("Location:newsadd.php");
}

?>

<table border="1">
<form method="post">
<input type="hidden" name="id" value="<?php echo $n['_id']; ?>">
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