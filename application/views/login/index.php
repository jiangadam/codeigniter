<?php
    if(validation_errors()){
        echo '<h4 style="color: red;">username or password error!!</h4>';
    }
?>
<?php echo form_open('login/index');?>
    <p>username:<input type="text" name="username"/></p>
    <p>password:<input type="password" name="pwd"/></p>
    <p>
        <input type="submit" name="submit" value="登陆"/>&nbsp;&nbsp;
        <?php echo anchor('login/register', '无用户名，点此注册！');?>
    </p>
</form>