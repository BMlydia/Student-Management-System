<!DOCTYPE html>
<html>
	<head>
			<meta charset="utf-8"/>
			<title>学生管理系统</title>
	</head>
	<body>
		<center>
			<?php include("./menu.php");?>
			<h3>学生信息操作</h3>
			<?php 
						$mysqli = new mysqli('localhost','root','','message','3306');
						mysqli_set_charset($mysqli,'utf8');
						//根据参数a的值，执行对应的操作
						switch ($_GET ['a'] ){
								case 'create' : //添加
										//获取添加的信息
										$no = $_POST['no'];
										$name = $_POST ['name'];
										$sex = $_POST ['sex'];
										$age = $_POST ['age'];
										$class = $_POST ['class'];
										//拼装sql 语句
										$sql = "insert into Smess values('$no','$name','$sex','$age','$class');";
										//执行
									  $m=$mysqli->query($sql);
										//判断是否成功
										if($m>0){
												echo "添加成功！" ;
										}else{
												echo "添加失败！";
										}
										break;
							  case 'del' : //删除
									//定义sql语句
									$sql = "delete from Smess where no=".$_GET['no'];
									//执行sql
									if($mysqli->query($sql)){
											//跳回到浏览页
											header("Location:index.php");
									}
								break;
								case 'update': //修改
									//获取要修改的信息
										$no = $_POST ['no'];
										$name = $_POST ['name'];
										$sex = $_POST ['sex'];
										$age = $_POST ['age'];
										$class = $_POST ['class'];
									//拼装修改sql语句
									$sql ="update Smess set no = '{$no}', name ='{$name}', sex='{$sex }',age='{$age}',class=' {$class}'  where no ='{$no}' ";
									//执行修改
									$m = $mysqli->query($sql);
									//判断成功与否
									if($m>0){
												echo "修改成功";
									}else{
												echo"修改失败!";
									}
									
					
										break;
 						}
			
			?>
			
				</center>
			</body>
</html>			
					
					