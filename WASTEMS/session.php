<?php
session_start();
  $isIndex = 1;
  if(array_key_exists('type',$_SESSION) && isset($_SESSION['type'])) {
	switch($_SESSION['type'])
	{
			case 0:	
				header("Location:admin/index.php");	 //redirect to admin home
				break;
			case 1:	
				header("Location:user/index.php");	 //redirect to employee home
				break;
			case 2:	
				header("Location:employee/index.php"); //redirect to customer home
				break;
			Default :
				header("Location:index");	//redirect to home
				break;
				
	}
  } else {
    if(!$isIndex) header('Location: index.php');
  }

?>