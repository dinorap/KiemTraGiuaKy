<?php
$env = file_get_contents(".env");

$lines = explode("\n",$env);

foreach($lines as $line){
  preg_match("/([^#]+)\=(.*)/",$line,$matches);
  if(isset($matches[2])){
    putenv(trim($line));
  }
} 

$servername = getenv('servername');
$username =getenv('username');
$password = getenv('password');
$database = getenv('database');
$port = getenv('port');

try {
    $conn = new PDO("mysql:host=$servername;port=$port;dbname=$database", $username, $password);
    // Thiết lập chế độ báo lỗi và chế độ tùy chỉnh
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Kết nối cơ sở dữ liệu thất bại: " . $e->getMessage();
}
?>