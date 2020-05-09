<?php
echo Form::open(array(
    'action' => '/index.php/ourhospital/register',
    'method' => 'post',
    'class' => 'needs-validation',
    'novalidate' => 'true'
));
// Add security token
echo \Form::csrf();
?>

    <!-- Using bootstrap forms to make it pretty -->
    <div class='form-group'>
        <label for="username">Username</label>
        <input type='text' class='form-control' id='username' name='username'  required>
    </div>
    <div class="form-group">
        <label for="emailInput">Email address</label>
        <input type="email" class="form-control" id="emailInput" aria-describedby="emailHelp" name='email'  required>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="passwordInput">Password</label>
        <input type="password" class="form-control" id="passwordInput" name='password' required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>

<?php
echo Form::close();
?>