<?PHP
include "dbconnect.php";

$sql = "SELECT * from groups";
$result = $conn->query($sql);
$groups = $result->fetch_all(MYSQLI_ASSOC);

?>

<form action="addweekly_pool_use2.php">
    <label for="weekday">Weekday:</label></br>
    <select id="weekday" name="weekday" >
        <?php
            echo '<option value = "MON">';
            echo "MON</option>";
            echo '<option value = "TUE">';
            echo "TUE</option>";
            echo '<option value = "WED">';
            echo "WED</option>";
            echo '<option value = "THU">';
            echo "THU</option>";
            echo '<option value = "FRI">';
            echo "FRI</option>";
            echo '<option value = "SAT">';
            echo "SAT</option>";
            echo '<option value = "SUN">';
            echo "SUN</option>";
        ?>
    </select> </br>
    
    <label for="group_name">Group:</label></br>
    <select id="group_name" name="group_name" >
        <?php
        for($i=0; $i< count($groups); $i++)
        {
            echo '<option value = "' . $groups[$i]["group_name"] . '">';
            echo $groups[$i]["group_name"] . "</option>";
        }
        ?>
    </select> </br>
    
    <label for="halfHour">30-minute Block (12:00-12:30am = 1, 6:00-6:30am = 13,  12:00-12:30pm = 25, 6:00-6:30pm = 37):</label></br>
    <input type="text" id="halfHour" name="halfHour"></br>
    
    <label for="num_of_lanes">Number of Lanes:</label></br>
    <select id="num_of_lanes" name="num_of_lanes" >
        <?php
            echo '<option value = "1">';
            echo "1</option>";
            echo '<option value = "2">';
            echo "2</option>";
            echo '<option value = "3">';
            echo "3</option>";
            echo '<option value = "4">';
            echo "4</option>";
            echo '<option value = "5">';
            echo "5</option>";
            echo '<option value = "6">';
            echo "6</option>";
            echo '<option value = "7">';
            echo "7</option>";
            echo '<option value = "8">';
            echo "8</option>";
            echo '<option value = "9">';
            echo "9</option>";
            echo '<option value = "10">';
            echo "10</option>";
            echo '<option value = "11">';
            echo "11</option>";
            echo '<option value = "12">';
            echo "12</option>";
            echo '<option value = "13">';
            echo "13</option>";
            echo '<option value = "14">';
            echo "14</option>";
        ?>
    </select> </br>
    
    <input type="submit" value="Submit">
</form>