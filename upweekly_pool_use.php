<?PHP
include "dbconnect.php";

$weekday = $_REQUEST["weekday"];
$group_name = $_REQUEST["group_name"];
$halfHour = $_REQUEST["halfHour"];
$num_of_lanes = $_REQUEST["num_of_lanes"];
$oldLanes = $_REQUEST["oldLanes"];

if ($num_of_lanes > $oldLanes){
    $sql = "call isLaneSpace(?,?,?, @isSpace)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $weekday, $halfHour, $num_of_lanes);

    if ($stmt->execute() === TRUE) {
        $sql = "SELECT @isSpace as isSpace";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        var_dump($row);
        if($row["isSpace"] == "Success!") {
            $SQL = "update weekly_pool_usage set halfHour = ?, num_of_lanes = ? where weekday = ? AND group_name = ?";
            $stmt = $conn->prepare($SQL);
            $stmt->bind_param("iiss", $halfHour, $num_of_lanes, $weekday, $group_name);
            $stmt->execute();
            echo "<script>window.location.href = 'weekly_pool_usage.php'</script>";
        }
        else {
            echo $row["isSpace"];
        }
    }
}
else {
    $SQL = "update weekly_pool_usage set halfHour = ?, num_of_lanes = ? where weekday = ? AND group_name = ?";
    $stmt = $conn->prepare($SQL);
    $stmt->bind_param("iiss", $halfHour, $num_of_lanes, $weekday, $group_name);
    if($stmt->execute() ===  TRUE) 
        echo "<script>window.location.href = 'weekly_pool_usage.php'</script>";
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>