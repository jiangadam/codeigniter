<html>
    <head>
        <title><?php echo $title;?></title>
    </head>
    <style>
        .con{
            width: 800px;
            margin: 0px auto;
            text-align: center;
        }
    </style>
    <body>
        <div class="con">
            <h1>CI_blog</h1>
            <header>
                <?php echo anchor('blog/index', '查看所有博客').'&nbsp;'.anchor('login/index', '登陆').'&nbsp;'.anchor('login/loginout', '退出');?>
            </header>