<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8"/>
	<title>学生管理系统</title>
	</head>
	<body>
		<center>
			<?php  include("./menu.php");?>
			
			<h3>浏览学生信息</h3>
			<table width="750" border="1">
					<tr>
							<th>学号</th>
							<th>姓名</th>
							<th>性别</th>
							<th>年龄</th>
							<th>班级</th>
							<th>操作</th>
					</tr>
					<?php 
								 $mysqli = new mysqli('localhost','root','','message','3306');
								 mysqli_set_charset($mysqli,'utf8');
								//执行学生信息查询
								  $result=$mysqli->query("select * from Smess");
								//解析数据
								//$list = $stmt ->fetchAll(PDO: :FETCH_ASSOC);
								//遍历输出信息
								while($row=$result->fetch_assoc()){   
									echo "<tr>";
									echo "<td>".$row['no']."</td>";
									echo "<td>".$row['name']."</td>";
									echo "<td>".$row['sex']."</td>";
									echo "<td>".$row['age']."</td>";
									echo "<td>".$row['class']."</td>";
									echo "<td><a href='action.php?a=del&no={$row['no']}'>删除</a> 
													 <a href='edit.php?no={$row['no']}'>编辑</a></td>";
									echo "</tr>";
								
							}
					?>
			</table>		
		</center>
		
			
	</body>
</html>