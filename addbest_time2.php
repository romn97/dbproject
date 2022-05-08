<?PHP
include "dbconnect.php";

$sql = "insert into best_times (swimmer_id, distance, stroke, time, hundredths, date_achieved) VALUES(?, ?, ?, ?, ?, ?)";

$swimmer_id = $_REQUEST["swimmer_id"];
$distance = $_REQUEST["distance"];
$stroke = $_REQUEST["stroke"];
$time = $_REQUEST["time"];
$hundredths = $_REQUEST["hundredths"];
$date_achieved = $_REQUEST["date_achieved"];

$stmt = $conn->prepare($sql);
$stmt->bind_param("iissis", $swimmer_id, $distance, $stroke, $time, $hundredths, $date_achieved);
if ($stmt->execute() === TRUE) {
    echo "<script>window.location.href = 'best_times.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>