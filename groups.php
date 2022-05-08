<?PHP
include "menu.html";
include "dbconnect.php";

$sql = "SELECT * FROM groups NATURAL JOIN coaches ORDER BY group_name";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo "<table border=1><tr><th>Group Name</th><th>Number of Swimmers</th><th>Coach</th><th>Assistant 1</th><th>Assistant 2</th><th>Age Range</th></tr>";    
  while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["group_name"] . "</td><td>" . $row["num_swimmers"] . "</td><td>" . $row["coach"] . 
      "</td><td>" . $row["assistant_1"] . "</td><td>" . $row["assistant_2"] . "</td><td>" . $row["age_range"] . "</td>";
      echo "<td>" . "<a href='delgroup.php?group_id=" . $row["group_id"] . "'>Del</a>" . "</td>";
      echo "<td>" . "<a href='editgroup.php?group_id=" . $row["group_id"] . "'>Edit</a>" . "</td>";
      echo "</tr>";
  }
  echo "</table>";    
} 
$conn->close();

?>
<a href="addgroup1.php">Add New</a>