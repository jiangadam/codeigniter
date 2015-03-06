<?php
    if(validation_errors()){
        echo '<h4 style="color: red;">input error!!</h4>';
    }
?>
<?php echo form_open('login/register');?>
    <p>username:<input type="text" name="username" placeholder="username"/></p>
    <p>password:<input type="password" name="pwd"/></p>
    <p>E-mail:<input type="email" name="email"/></p>
    <p>
        <input type="submit" value="注册"/>
        &nbsp;&nbsp;&nbsp;<?php echo anchor('login/index', '登陆');?>
    </p>
</form>