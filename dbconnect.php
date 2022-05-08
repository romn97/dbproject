<?PHP
header("Cache-Control: no-cache");
$servername = "localhost";
$username = "romanect_itsamario";
$password = "GreenLuigi";
$db = "romanect_swteam";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$conn->select_db("romanect_swteam");
?>