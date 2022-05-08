<?PHP
include "dbconnect.php";

$sql = "SELECT * from swimmers";
$result = $conn->query($sql);
$swimmers = $result->fetch_all(MYSQLI_ASSOC);

$sql = "select * from team_records where age_group = ? AND gender = ? AND distance = ? AND stroke = ?";

$age_group = substr($_REQUEST["key"], 0, 5);
$gender = substr($_REQUEST["key"], 5, 1);
$distance = ltrim(substr($_REQUEST["key"], 6, 4), "0");
$stroke = substr($_REQUEST["key"], 10, 2);
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $age_group, $gender, $distance, $stroke);

$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}
?>

<form action="upteam_record.php">
    <label for="distance">Distance: <?php echo $row["distance"];?></label></br>
    <input type="hidden" id="distance" name="distance" value="<?php echo $row["distance"];?>"></br>
    <label for="stroke">Stroke: <?php echo $row["stroke"];?></label></br>
    <input type="hidden" id="stroke" name="stroke" value="<?php echo $row["stroke"];?>"></br>
    <label for="age_group">Age Group: <?php echo $row["age_group"];?></label></br>
    <input type="hidden" id="age_group" name="age_group" value="<?php echo $row["age_group"];?>"></br>
    <label for="gender">Gender: <?php echo $row["gender"];?></label></br>
    <input type="hidden" id="gender" name="gender" value="<?php echo $row["gender"];?>"></br>
    <label for="time">Time (HH:MM:SS):</label></br>
    <input type="text" id="time" name="time" value="<?php echo $row["time"];?>"></br>
    <label for="hundredths">Hundredths:</label></br>
    <input type="text" id="hundredths" name="hundredths" value="<?php echo $row["hundredths"];?>"></br>
    <label for="date_achieved">Date Achieved (YYYY-MM-DD):</label></br>
    <input type="text" id="date_achieved" name="date_achieved" value="<?php echo $row["date_achieved"];?>"></br>
    
    <label for="swimmer_id">Swimmer:</label></br>
    <select id="swimmer_id" name="swimmer_id" >
        <?php
        for($i=0; $i< count($swimmers); $i++)
        {
            echo '<option value = "' . $swimmers[$i]["swimmer_id"] . '">';
            echo $swimmers[$i]["fname"] . "</option>";
        }
        ?>
    </select> </br>
    
    <input type="submit" value="Submit">
</form>