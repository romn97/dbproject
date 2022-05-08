<?PHP
include "dbconnect.php";

$sql = "SELECT * from swimmers";
$result = $conn->query($sql);
$swimmers = $result->fetch_all(MYSQLI_ASSOC);

?>
<form action="addteam_record2.php">
    <label for="age_group">Age Group:</label></br>
    <select id="age_group" name="age_group" >
        <?php
            echo '<option value = "7-8">';
            echo "7-8</option>";
            echo '<option value = "9-10">';
            echo "9-10</option>";
            echo '<option value = "11-12">';
            echo "11-12</option>";
            echo '<option value = "13-14">';
            echo "13-14</option>";
            echo '<option value = "15-18">';
            echo "15-18</option>";
            echo '<option value = "Open">';
            echo "Open</option>";
        ?>
    </select> </br>
    
    <label for="gender">Gender:</label></br>
    <select id="gender" name="gender" >
        <?php
            echo '<option value = "M">';
            echo "Male</option>";
            echo '<option value = "F">';
            echo "Female</option>";
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
        ?>
    </select> </br>
    
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
    
    <label for="time">Time (HH:MM:SS):</label></br>
    <input type="text" id="time" name="time" value="00:"></br>
    <label for="hundredths">Hundredths:</label></br>
    <input type="text" id="hundredths" name="hundredths"></br>
    <label for="date_achieved">Date Achieved (YYYY-MM-DD):</label></br>
    <input type="text" id="date_achieved" name="date_achieved"></br>
    <input type="submit" value="Submit">
</form>