<?PHP
include "dbconnect.php";

$sql = "SELECT * from groups";
$result = $conn->query($sql);
$groups = $result->fetch_all(MYSQLI_ASSOC);

$sql = "select * from weekly_pool_usage  where weekday = ? AND group_name = ?";

$weekday = substr($_REQUEST["key"], 0, 3);
$group_name = substr($_REQUEST["key"], 3);
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $weekday, $group_name);

$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}
?>

<form action="upweekly_pool_use.php">
    <label for="weekday">Weekday: <?php echo $row["weekday"];?></label></br>
    <input type="hidden" id="weekday" name="weekday" value="<?php echo $row["weekday"];?>"></br>
    <label for="halfHour">30-minute Block (12:00-12:30am = 1, 12:30-1:00am = 2,  3:00-3:30pm = 31):</label></br>
    <input type="text" id="halfHour" name="halfHour" value="<?php echo $row["halfHour"];?>"></br>
    
    <label for="group_name">Group:</label></br>
    <select id="group_name" name="group_name" >
        <?php
        for($i=0; $i< count($groups); $i++)
        {
            echo '<option value = "' . $groups[$i]["group_name"];
            if($groups[$i]["group_name"] == $row["group_name"])
                echo '" selected>';
            else
                echo '">';
            echo $groups[$i]["group_name"] . "</option>";
        }
        ?>
    </select> </br>
    
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
    <label for="oldLanes">Old Lane Count: <?php echo $row["num_of_lanes"];?></label></br>
    <input type="hidden" id="oldLanes" name="oldLanes" value="<?php echo $row["num_of_lanes"];?>"></br>
    <input type="submit" value="Submit">
</form>