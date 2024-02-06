<html>
<body>
<section>
    <h1>menu</h1>

    <table>
        <tr>
            <th>break fast</th>
            <th>lunch</th>
            <th>dinner</th>
        </tr>
        <?php
        $breakFast = 0;
        $lunch = 0;
        $dinner = 0;
        function menu2($break,$lu,$din)
        {
            $breakFast=$break;
            $lunch=$lu;
            $dinner=$din;
        }
            ?>
            <tr>
                <td><?php echo $breakFast;?></td>
                <td><?php echo $lunch;?></td>
                <td><?php echo $dinner;?></td>
            </tr>

    </table>
</section>
</body>
</html>