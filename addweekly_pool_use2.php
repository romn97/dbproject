<?PHP
include "dbconnect.php";

$weekday = $_REQUEST["weekday"];
$halfHour = $_REQUEST["halfHour"];
$group_name = $_REQUEST["group_name"];
$num_of_lanes = $_REQUEST["num_of_lanes"];
var_dump($weekday, $halfHour, $num_of_lanes);

$sql = "call isLaneSpace(?,?,?, @isSpace)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sii", $weekday, $halfHour, $num_of_lanes);

if ($stmt->execute() === TRUE) {
    $sql = "SELECT @isSpace as isSpace";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    var_dump($row);
    if($row["isSpace"] == "Success!") {
        $SQL = "insert into weekly_pool_usage (weekday, halfHour, group_name, num_of_lanes) VALUES(?, ?, ?, ?)";
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("sisi", $weekday, $halfHour, $group_name, $num_of_lanes);
        $stmt->execute();
        echo "<script>window.location.href = 'weekly_pool_usage.php'</script>";
    }
    else {
        echo $row["isSpace"];
    }
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>