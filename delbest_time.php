<?PHP
include "dbconnect.php";

$distance = ltrim(substr($_REQUEST["key"], 0, 4), "0");
$stroke = substr($_REQUEST["key"], 4, 2);
$swimmer_id = substr($_REQUEST["key"], 6);
$sql = "delete from best_times where swimmer_id = ? AND distance = ? AND stroke = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("iss", $swimmer_id, $distance, $stroke);

if ($stmt->execute() === TRUE) {
    echo "<script>window.location.href = 'best_times.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>