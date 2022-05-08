<?PHP
include_once "dbconnect.php";
$group_id = $_REQUEST["group_id"];
if(empty($group_id)){
    include "menu.html";
    $sql = "SELECT * FROM swimmers ORDER BY last_name";
}
else
{
    $sql = "SELECT * FROM swimmers where group_name = (SELECT group_name FROM groups where group_id = '" . $group_id . "') ORDER BY last_name";
}

$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo "<table border=1><tr><th>Last Name</th><th>First Name</th><th>Birthday</th><th>Gender</th><th>Group Name</th></tr>";    
  while($row = $result->fetch_assoc()) {
      $key = str_pad($row["swimmer_id"], 4, "0", STR_PAD_LEFT) . $row["gender"] . str_pad($row["group_name"], 30, "1", STR_PAD_LEFT) . str_pad($row["last_name"], 20, "1", STR_PAD_LEFT);
      echo "<tr>";
      echo "<td>" . $row["last_name"] . "</td><td>" . $row["fname"] . "</td><td>" . $row["birthday"] . 
      "</td><td>" . $row["gender"] . "</td><td>" . $row["group_name"] . "</td>";
      echo "<td>" . "<a href='delswimmer.php?key=" . $key . "'>Del</a>" . "</td>";
      echo "<td>" . "<a href='editswimmer.php?key=" . $key . "'>Edit</a>" . "</td>";
      echo "</tr>";
  }
  echo "</table>";    
} 
$conn->close();

?>
<a href='addswimmer1.php'>Add New</a>