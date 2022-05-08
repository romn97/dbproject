<?PHP
include "dbconnect.php";

$sql = "select * from best_times  where swimmer_id = ? AND distance = ? AND stroke = ?";

$distance = ltrim(substr($_REQUEST["key"], 0, 4), "0");
$stroke = substr($_REQUEST["key"], 4, 2);
$swimmer_id = substr($_REQUEST["key"], 6);
$stmt = $conn->prepare($sql);
$stmt->bind_param("iss", $swimmer_id, $distance, $stroke);

$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}
?>

<form action="upbest_time.php">
    <label for="distance">Distance: <?php echo $row["distance"];?></label></br>
    <input type="hidden" id="distance" name="distance" value="<?php echo $row["distance"];?>"></br>
    <label for="stroke">Stroke: <?php echo $row["stroke"];?></label></br>
    <input type="hidden" id="stroke" name="stroke" value="<?php echo $row["stroke"];?>"></br>
    <label for="time">Time (HH:MM:SS):</label></br>
    <input type="text" id="time" name="time" value="<?php echo $row["time"];?>"></br>
    <label for="hundredths">Hundredths:</label></br>
    <input type="text" id="hundredths" name="hundredths" value="<?php echo $row["hundredths"];?>"></br>
    <label for="date_achieved">Date Achieved (YYYY-MM-DD):</label></br>
    <input type="text" id="date_achieved" name="date_achieved" value="<?php echo $row["date_achieved"];?>"></br>
    <input type="hidden" id="swimmer_id" name="swimmer_id" value="<?php echo $row["swimmer_id"];?>"></br>
    <input type="submit" value="Submit">
</form>