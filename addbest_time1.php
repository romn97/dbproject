<?PHP
include "dbconnect.php";

$sql = "SELECT * from swimmers";
$result = $conn->query($sql);
$swimmers = $result->fetch_all(MYSQLI_ASSOC);

?>

<form action="addbest_time2.php">
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
    
    <label for="distance">Distance:</label></br>
    <select id="distance" name="distance" >
        <?php
            echo '<option value = "50">';
            echo "50</option>";
            echo '<option value = "100">';
            echo "100</option>";
            echo '<option value = "200">';
            echo "200</option>";
            echo '<option value = "400">';
            echo "400</option>";
            echo '<option value = "500">';
            echo "500</option>";
            echo '<option value = "1000">';
            echo "1000</option>";
            echo '<option value = "1650">';
            echo "1650</option>";
        ?>
    </select> </br>
    
    <label for="stroke">Stroke:</label></br>
    <select id="stroke" name="stroke" >
        <?php
            echo '<option value = "FL">';
            echo "Butterfly</option>";
            echo '<option value = "BK">';
            echo "Backstroke</option>";
            echo '<option value = "BR">';
            echo "Breaststroke</option>";
            echo '<option value = "FR">';
            echo "Freestyle</option>";
            echo '<option value = "IM">';
            echo "IM</option>";
        ?>
    </select> </br>
    
    <label for="time">Time (HH:MM:SS):</label></br>
    <input type="text" id="time" name="time" value="00:"></br>
    <label for="hundredths">Hundredths:</label></br>
    <input type="text" id="hundredths" name="hundredths"></br>
    <label for="date_achieved">Date Achieved (YYYY-MM-DD):</label></br>
    <input type="text" id="date_achieved" name="date_achieved"></br>
    <input type="submit" value="Submit">
</form>