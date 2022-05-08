<?PHP
include "dbconnect.php";

$age_group = substr($_REQUEST["key"], 0, 5);
$gender = substr($_REQUEST["key"], 5, 1);
$distance = ltrim(substr($_REQUEST["key"], 6, 4), "0");
$stroke = substr($_REQUEST["key"], 10, 2);
$sql = "delete from team_records where age_group = ? AND gender = ? AND distance = ? AND stroke = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $age_group, $gender, $distance, $stroke);

if ($stmt->execute() === TRUE) {
    echo "<script>window.location.href = 'team_records.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>