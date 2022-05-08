<?PHP
include "dbconnect.php";

$sql = "update team_records set time = ?, hundredths = ?, swimmer_id = ?, date_achieved = ? where age_group = ? AND gender = ? AND distance = ? AND stroke = ?";

$time = $_REQUEST["time"];
$hundredths = $_REQUEST["hundredths"];
$swimmer_id = $_REQUEST["swimmer_id"];
$date_achieved = $_REQUEST["date_achieved"];
$age_group = $_REQUEST["age_group"];
$gender = $_REQUEST["gender"];
$distance = $_REQUEST["distance"];
$stroke = $_REQUEST["stroke"];

$stmt = $conn->prepare($sql);
$stmt->bind_param("siisssss", $time, $hundredths, $swimmer_id, $date_achieved, $age_group, $gender, $distance, $stroke);
if ($stmt->execute() === TRUE) {
    echo "<script>window.location.href = 'team_records.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>