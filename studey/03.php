<?php
require_once 'DAOPDO.class.php';
$configs=array(
    'dbname'=>'text'
);
$pdo=DAOPDO::getSingleton($configs);
$sql="select * from student";
$arr=$pdo->fetchAll($sql);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<table>
    <thead>
        <tr>
            <th>姓名</th>
            <th>年龄</th>
            <th>分数</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($arr as $key=>$value){ ?>
        <tr>
            <td><?php echo $value['name']?></td>
            <td><?php echo $value['age']?></td>
            <td><?php echo $value['score']?></td>
            <td><a href="javascript:void(0)" id="<?php echo $value['id']?>">删除</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</body>
<script src="jquery.min.js"></script>
<script>
    //隐士迭代（原生js中数组不可以直接绑定事件）
    $("a").click(function(){
        var id=$(this).attr('id');
        $.ajax({
            url:'04.php',
            type:'post',
            data:{'id':id},
            dataType:'json',
            success:function(data){
                if(data.code==0){
                    alert('删除成功');
                }else{
                    alert('删除失败');
                }
            }
        })
    })
</script>
</html>
