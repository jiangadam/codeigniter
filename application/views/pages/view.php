<table>
    <tr>
        <th>ID</th>
        <th>user</th>
        <th>age</th>
    </tr>
    <?php foreach($list as $value){
    ?>
        <tr>
            <td><?php echo $value['id'];?></td>
            <td><?php echo $value['user'];?></td>
            <td><?php echo $value['age'];?></td>
        </tr>
    <?php
    }
    ?>
</table>