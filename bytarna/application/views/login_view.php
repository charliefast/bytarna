<!DOCTYPE html>
<html>
 <head>
   <title>Bytarna</title>
 </head>
 <body>
   <h1>Simple Login with CodeIgniter</h1>
   <?php echo validation_errors(); ?>
   <?php echo form_open('index.php/verifylogin'); ?>
     <label for="username">Username:</label>
     <input type="text" size="20" id="username" name="username"/>
     <label for="password">Password:</label>
     <input type="password" size="20" id="password" name="password"/>
     <input type="submit" value="Login"/>
   </form>
   <a href="index.php/register">Registrera dej här</a>
 </body>
</html>
