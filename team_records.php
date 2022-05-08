<?PHP
include "menu.html";
include "dbconnect.php";


$sql = "SELECT * FROM team_records NATURAL JOIN swimmers ORDER BY ABS(SUBSTRING_INDEX(age_group, '-', 1)), gender, distance";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo "<table border=1><tr><th>Age Group</th><th>Gender</th><th>Distance</th><th>Stroke</th><th>Time</th><th>Hundredths</th><th>Last Name</th><th>First Name</th><th>Date Achieved</th></tr>";    
  while($row = $result->fetch_assoc()) {
      $key = $row["age_group"] . $row["gender"] . str_pad($row["distance"], 4, "00", STR_PAD_LEFT) . $row["stroke"];
      echo "<tr>";
      echo "<td>" . $row["age_group"] . "</td><td>" . $row["gender"] . "</td><td>" . $row["distance"] . 
      "</td><td>" . $row["stroke"] . "</td><td>" . $row["time"] . "</td><td>" . $row["hundredths"] . "</td><td>" . $row["last_name"] . "</td><td>" . $row["fname"] . "</td><td>" . $row["date_achieved"] . "</td>";
      echo "<td>" . "<a href='delteam_record.php?key=" . $key . "'>Del</a>" . "</td>";
      echo "<td>" . "<a href='editteam_record.php?key=" . $key . "'>Edit</a>" . "</td>";
      echo "</tr>";
  }
  echo "</table>";    
} 
$conn->close();

?>
<a href="addteam_record1.php">Add New</a>