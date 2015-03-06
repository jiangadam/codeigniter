<ul>
    <?php
    foreach($blog as $item){
        ?>
        <li style="text-align: left;">
            <a href="<?php echo site_url('blog/view/'.$item['id']);?>"><?php echo $item['title'];?></a>
            <span><?php echo date('Y-m-d H:i:s', $item['create']);?></span>
        </li>
    <?php
    }
    ?>
</ul>