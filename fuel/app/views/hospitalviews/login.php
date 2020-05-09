
<div>
<?php 

/* YOU MIGHT HAVE DIFFERENT PATH TO LOGIN.PHP*/

echo  Form::open(array(
'action' => Uri::base().
'index.php/ourhospital/login', 
'method' => 'post'
)); 

?>



     <div align="center">
     	<h2>User Login</h2>
      <label for ='username'>Username: </label>
      <input type="text" name="username" placeholder =" Enter your username... "> </br></br>

      <label for ='password'>Password: </label>
       <input type="password" name="password" placeholder ="Enter your password.. "> </br></br>
    

       <button type='submit' >Login</button><br><br>

     </div>


<?php echo  Form::close(); ?>


<div class = 'col-8 text-center' align="center" >
   <?php $l = Uri::base().'index.php/ourhospital/register';
   ?>
    <a href = "<?php echo $l ?>"> Register Here.</a>
</div>

<div style="height: 5px"></div>
<?php
	if ($failed){
		//echo "<div class = 'row visible'>";
		echo "";
	}else{
		//echo " <div class= 'row invisible'>";
		echo  " <div align='center' color:'red'>Invalid user please try again</div>";
	}
?>

</div>

