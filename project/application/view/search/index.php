
<!DOCTYPE html>
<html>
<title>Food_Search</title>
<body>

<h1>Result : </h1>
<h2><?php foreach ($foods as $food){
    echo ($food->name." ".$food->price." ".$food->restaurant)."\n";
    echo "\n";
    }?> </h2>


</body>
</html>