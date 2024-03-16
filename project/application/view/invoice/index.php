<!DOCTYPE html>
<html>
<title>setOrder</title>
<body>

<form method="post" action="http://localhost:8080/setOrder" >
    food_name: <input name="name" value="<?php echo $foodName;?>" >
    restaurant: <input  name="restaurant" value="<?php echo $restaurant;?>">
    price: <input  name="price" value="<?php echo $price;?>">

    <input type="submit" >
</form>


</body>
</html>