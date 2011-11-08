 <?php  
 if(!(@fsockopen("201.198.138.107", 80, $errno, $errstr, 20)))   
 {    echo "<body style='margin: 0 auto; overflow: hidden;'><div style='background: #FFF url(http://ucreativa.com/ucreasite/app_design/img/background.jpg) repeat-x;'></body><br/><br/>";
     	include("ucreasite/index.php");
 }else{
 	 	echo "<html>
		      <head></head>
		         <body style='margin: 0 auto; overflow: hidden;'>
		 	       <iframe style='margin: 0 auto; border:none; z-index:999;' src='http://201.198.138.107/ucreauth/' width='100%' height='100%'></iframe>
		 	      </body>
				</html>"; 
 }	  
 ?>  
          
