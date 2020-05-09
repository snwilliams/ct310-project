<?php
echo Form::open(array(
    'action' => '/index.php/ourhospital/register',
    'method' => 'post',
  
));
// Add security token
echo \Form::csrf();
?>
<div align="center">


<h2>Register</h2>
<!-- Using bootstrap forms to make it pretty -->
<div class='form-group'>
    <label for="username">Username</label>
    <input type='text' class='form-control' id='username' name='username'  required>
</div>
<div class="form-group">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
<br>    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name='email'  required>
</div>
<div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control"  name='password' required>
</div>

<div class="form-group">
    <label for="confirm">Confirm Password</label>
    <input type="password" class="form-control" name='confirm' required>
</div>


<button type="submit" class="btn btn-primary">Sign Up </button>
</div>
<?php
echo Form::close();
?>

