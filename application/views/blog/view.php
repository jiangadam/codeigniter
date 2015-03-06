<h3><?php echo $blog['title'];?></h3>
<p>发表时间：<?php echo date('Y-m-d H:i:s', $blog['create']);?>点击量：<?php echo $blog['hot'];?></p>
<p><?php echo $blog['content'];?></p>