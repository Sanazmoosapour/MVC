<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    restaurant: <input type="text" name="restaurant" value="<?php echo $restaurantName?>">
    break_fast: <input type="text" name="break">
    lunch: <input type="text" name="lunch">
    dinner: <input type="text" name="dinner">
    <input type="submit">
</form>

</body>
</html>