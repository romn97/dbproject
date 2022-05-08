<?PHP
include "dbconnect.php";

$sql = "update best_times set time = ?, hundredths = ?, date_achieved = ? where swimmer_id = ? AND distance = ? AND stroke = ?";

$distance = $_REQUEST["distance"];
$stroke = $_REQUEST["stroke"];
$time = $_REQUEST["time"];
$hundredths = $_REQUEST["hundredths"];
$date_achieved = $_REQUEST["date_achieved"];
$swimmer_id = $_REQUEST["swimmer_id"];

$stmt = $conn->prepare($sql);
$stmt->bind_param("sisiss", $time, $hundredths, $date_achieved, $swimmer_id, $distance, $stroke);
if ($stmt->execute() === TRUE) {
    echo "<script>window.location.href = 'best_times.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>