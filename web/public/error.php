<!DOCTYPE html>
<!-- 
 * Author: Chris Craven
 * Revision date: 05/07/2015
 * File name: error.php
 * Description: 
 * This error page is viewed only when main bootstrap fails
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Web 289 Project"/>
        <meta name="author" content="Chris Craven" />
        
        <link rel="stylesheet" type="text/css" href="/289/web/css/normalize.css" />
        <link rel="stylesheet" type="text/css" href="/289/web/css/skeleton.css" />
        
        <link rel="stylesheet" type="text/css" href="/289/web/css/style.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="/289/web/js/utils.js"></script>
		
		<link href='//fonts.googleapis.com/css?family=Raleway:400,300,600' rel='stylesheet' type='text/css'>
    </head>
    <body>

<?php 
if (strpos($_SERVER['REQUEST_URI'], '289/web'))
	$base = '/289/web/'; 
	else $base = '/';
?>



<header>

<nav class="navbar">
  
    

	<ul class="nav-list">
	<!-- Brand -->
    <li>
      <a  id="navbar-brand" href="<?php echo $base; ?>index/index">Apps.BePlace</a>
    </li>
		<li>			
			<a href="<?php echo $base; ?>apps/index">Apps</a>
		</li>
		<li>
			<a href="<?php echo $base; ?>about/index">About</a>		
		</li>
	</ul>

 
</nav>

</header>

        <div id="content" class="container">
            <div class="row-fluid">
                <section>
					<p class="error"><?php echo $errorMessage; ?></p>
		        </section>
            </div>
        </div>
	</body>
</html>