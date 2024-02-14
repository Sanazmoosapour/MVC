<!DOCTYPE html>
<html>
<title>MENU</title>
<body>
<h1>todays menu : </h1>
<h2><?php echo $restaurantName;?> </h2>
    <h3>break fast</h3>
    <td><?php echo $breakFastName." ".$breakFastPrice;?></td>
    <h3>lunch</h3>
    <td><?php echo $lunchName." ".$lunchPrice;?></td>
    <h3>dinner</h3>
    <td><?php echo $dinnerName." ".$dinnerPrice;?></td>

</body>
</html>