<?php
$id=$_POST['id'];
require_once 'DAOPDO.class.php';
$configs=array(
        'dbname'=>'text'
);
$pdo=DAOPDO::getSingleton($configs);
$sql="delete from student where id=$id";
$res=$pdo->query($sql);
if($res==true){
    $arr=array(
        'code'=>0,
        'msg'=>'删除成功'
    );
    echo json_encode($arr);
}else{
    $arr=array(
        'code'=>1,
        'msg'=>'删除失败'
    );
    echo json_encode($arr);
}