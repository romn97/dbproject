<?PHP
include "dbconnect.php";

$sql = "insert into team_records (age_group, gender, distance, stroke, time, hundredths, swimmer_id, date_achieved) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";

$age_group = $_REQUEST["age_group"];
$gender = $_REQUEST["gender"];
$distance = $_REQUEST["distance"];
$stroke = $_REQUEST["stroke"];
$time = $_REQUEST["time"];
$hundredths = $_REQUEST["hundredths"];
$swimmer_id = $_REQUEST["swimmer_id"];
$date_achieved = $_REQUEST["date_achieved"];

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssiis", $age_group, $gender, $distance, $stroke, $time, $hundredths, $swimmer_id, $date_achieved);
if ($stmt->execute() === TRUE) {
    echo "<script>window.location.href = 'team_records.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>