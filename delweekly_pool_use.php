<?PHP
include "dbconnect.php";

$weekday = substr($_REQUEST["key"], 0, 3);
$group_name = substr($_REQUEST["key"], 3);
$sql = "delete from weekly_pool_usage where weekday = ? AND group_name = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $weekday, $group_name);

if ($stmt->execute() === TRUE) {
    echo "<script>window.location.href = 'weekly_pool_usage.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>