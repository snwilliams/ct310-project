<?php
    echo Form::open(array(
        'action' => Uri::base() . 'index.php/ourhospital/login.php',
        'method' => 'post'
    ));
    ?>

<div class="username">
    <label for="username">Username:</label>
    <input type="text" name="username" placeholder="Please enter your username">
</div>

<div class="password">
    <label for="password">Password:</label>
    <input type="password" name="password">
</div>
<button type="submit">Log in</button>

<?php
    echo Form::close();

    $register = Uri::base() . 'index.php/ourhospital/register.php';
    echo '<p>New user?  <a href="' . $register . '">Create an account here!</a>';

    ?>

<?php
        if($failed){
            echo "<div class='error visible'>";
        }
        else{
            echo "<div class='error invisible'>";
        }
        ?>

<div class="text-center bg-alert">
    <div class="alert alert-danger" role="alert">Username or password is incorrect.  Please try again.</div>
</div>
</div>
