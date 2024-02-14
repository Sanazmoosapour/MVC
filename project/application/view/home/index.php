<html>
<body>

<form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">

    what would you like to do ? :
    <input type="radio" name="select"
        <?php if (isset($select) && $select=="female") echo "checked";?>
           value="show">Show
    <input type="radio" name="select"
        <?php if (isset($select) && $select=="male") echo "checked";?>
           value="change">Change

    name_of_restaurant : <input type="text" name="restaurant">
    <input type="submit">
</form>
</body>
</html>