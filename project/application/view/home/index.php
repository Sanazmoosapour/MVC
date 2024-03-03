<html>
<body>
<form method="post" action="http://localhost:8080/home" >

    what would you like to do ? :
    <input type="radio" name="select"
        <?php if (isset($select) && $select=="show") echo "checked";?>
           value="show">Show
    <input type="radio" name="select"
        <?php if (isset($select) && $select=="change") echo "checked";?>
           value="change">Change
    <input type="radio" name="select"
        <?php if (isset($select) && $select=="order") echo "checked";?>
           value="order">Order
    <input type="submit"  >


</form>
</body>
</html>