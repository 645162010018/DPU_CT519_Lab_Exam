<?php
if(isset($_GET['Hero_id'])) {
 $id = $_GET['Hero_id'];
}else{
  $id = null;
}

$mysql_hostname = "10.1.1.22";  
$mysql_user = "MP"; 
$mysql_password = "Mp@dmin12";
$mysql_database = "0018_Lab_Exam";
$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password,$mysql_database) or die("Could not connect database");

if (!$bd) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully".'<br>';

if($id>0)
{
$sql_stmt = "select Picture_link,h.Name as Hero_Name ,Detail, m.Name as Movie_Name  from Hero h Left Join Movie m on h.Hero_id= m.Movie_id where m.Movie_id = ".$id;

}else
{
$sql_stmt = "select * from  Hero Left Join Hero_in_movie on Hero.Hero_id=Hero_in_movie.Hero_id";
}

$result=mysqli_query($bd,$sql_stmt);
if(!$result)
{
die("Database access failed".mysqli_error());
}

$rows=mysqli_num_rows($result);

if($rows){
echo '<!DOCTYPE html><html lang="en-US"><head><title>การแสดงรายชื่อ Hero โดย นางสาว ปพิชญา ศรีเสริม รหัสนักศึกษา 645162010018 </title></head><body>';

 while($row = mysqli_fetch_array($result)){
   echo 'Image Hero : <img src="'.$row['Picture_link'].'" ><br>';
  echo 'Name  : "'.$row['Hero_Name'].'" <br>';
  echo 'Detail  : "'.$row['Detail'].'" <br>';
  echo 'Movie  : "'.$row['Movie_Name'].'" <br>';
    }

echo  '<a href="index.php">Home </a>'; 
     
echo '</body></html>';
}

//Free result set
mysqli_free_result($result);
mysqli_close($bd);
?>

