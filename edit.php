<!DOCTYPE html>
<html>
	<head>
			<meta charset="utf-8"/>
			<title>学生信息管理</title>
	</head>
	<body>
		<center>
			<?php  include("./menu.php");
							
							$mysqli=@mysqli_connect('localhost','root','','message',3306);  
							mysqli_set_charset($mysqli,'utf8');
              //连接时的错误提示
              if( mysqli_connect_errno()){
                exit(mysqli_connect_error());
              }
              //设置默认字符编码
              mysqli_set_charset($mysqli,'utf8');
              //选择特定的数据库
              mysqli_select_db($mysqli,'message'); 
            //执行学生信息查询
              $mysqli->query("select * from Smess where no=".$_GET['no']);
              $result = $mysqli->query("select * from Smess where no=".$_GET['no']);
              if(!$row=$result->fetch_assoc()){
                die("没有找到要修改的信息");
              }
							
			?>
			
			<h3>编辑学生信息</h3>
			<form action ="action.php?a=update" method="post" >
			<input type ="hidden" name ="no"  value="<?php echo $row['no'] ?>"/>
			<table width="300" border="0">
					<tr>
							<td>姓名：</td>
							<td><input type ="text" name ="name" value ="<?php echo $row['name'] ?>"/></td>
					</tr>
					<tr>
							<td>性别：</td>
							<td><input type ="radio" name ="sex" value ="男"<?php  echo $row['sex']=="男"?"checked" : "";?>/>男
									<input type ="radio" name ="sex" value ="女"<?php  echo $row['sex']=="女"?"checked" : "";?>/>女
							</td>
					</tr>
					<tr>
							<td>年龄：</td>
							<td><input type ="text" name ="age" value ="<?php echo $row['age'] ?>"/></td>
					</tr>
					<tr>
							<td>班级：</td>
						    <td><input type ="text" name ="class" value ="<?php echo $row['class'] ?>"/></td>
					</tr>			
					<tr>
								<td align="center"colspan="2">
											<input  type ="submit" value="保存"/>
											<input type ="reset"  value="重置"/>
								</td>
					</tr>
					</table>
					</form>
				</center>
			</body>
</html>			
					
					
					