
<?php

session_start();

if($_SESSION['access']==1)
{
	require('main.php');

}

?>


<div>from 2012.12.31 to 2013.05.13</div>

<form action="check.php" method="post" class="formit">
		 <a>userName:  </a> <input type="text" name="userName" />
		 <a>password:  </a><input type="password" name="password" />

		</br>




		<input type="submit"  class="button_submit" value="send " />
		</form>


