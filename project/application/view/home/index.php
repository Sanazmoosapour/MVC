<html>
<body>

<form method="get" action="<?php echo $_SERVER['PHP_SELF'];
                                                               ?>" onclick="<?php
header("jhviyvh: iubiubi");
?>">

    what would you like to do ? :
    <input type="radio" name="select"
        <?php
        print_r(headers_list());
        if (isset($select) && $select=="female") echo "checked";?>
           value="show">Show
    <input type="radio" name="select"
        <?php if (isset($select) && $select=="male") echo "checked";?>
           value="change">Change

    name_of_restaurant : <input type="text" name="restaurant">
    <input type="submit" >

</form>
<?php
header("jhviyvh: iubiubi");
?>
</body>
</html>