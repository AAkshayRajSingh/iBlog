<?php
  require('db.php');
  include 'header.php';
  //Check if a user is logged in or not
  session_start();
  if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    //Display a message for logged-in users only
	echo "<center><h3><strong>Hello " . $username . "!</strong></h3></center>";
	echo "<center><div><p><strong><a href='dashboard.php'> Dashboard</a></strong><strong><a href='logout.php'> Logout</a></strong></p></div></center>";
	   
} else {
    //Display different text if a user is not logged in.
	echo "<center><strong><h3>Welcome to iBlog!</h3></strong></center>";
	echo '<center><strong><div>New user? Please <a href="login.php">Login</a> or <a href="register.php">Register</a></div></strong></center>';
	 }
?>
<html>
<body>
  <div id="background-image"></div>
  <header> 
    <style>
      #background-image {
        background-image: url('Img1.jpeg');
        background-size: cover;
        filter: blur(6px);
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
      }

      header {
        position: relative;
        z-index: 1;
      }

      body {
        color: #333;
        font-family: Arial, sans-serif;
      }
    </style>


			<div class="container">
				<h3><strong>About This Blogging website.</strong></h3>
				
			
		<?php
		//If the user is logged-in
		if (isset($_SESSION['username'])){
		$username = $_SESSION['username'];
		echo '
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">iBlog</a>
			</div>
		<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="index.php">
						<span class="glyphicon glyphicon-home"></span> 
						Home</a></li>
                    <li><a href="Blogposts.php"> Blogposts</a></li>
					<li><a href="dashboard.php"> Dashboard</a></li>

					<li><a href="logout.php"> Logout</a></li>';
					
	}

		//If the user is logged-out
		else{
		echo '
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">iBlog </a>
				</div>

			<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="index.php">
							<span class="glyphicon glyphicon-home"></span> 
							Home</a></li>
						

			<li><a href="login.php"><span class="glyphicon 
					glyphicon-log-in"></span> Login</a></li>
					<li><a href="register.php"><span class="glyphicon 
					glyphicon-user"></span> Register</a></li>';

		}
		
	?>       
			</div>
			
		</header>
		<section class="container" >
			<div class="row">
				<div class="col-md-9 content">
				<p class="text-justify"><strong><span style="font-size: 1.2em">iBlog is a dynamic and user-friendly blogging website that allows users to express themselves creatively in a variety of domains. With its easy-to-use interface, anyone can create their own blog and share their thoughts, ideas, and experiences with the world.</span></strong></p>

<p class="text-justify"><strong><span style="font-size: 1.2em">One of the key features of iBlog is its diverse range of domains. From technology to travel, fashion to food, users can choose from a variety of categories to create their blogs in. This ensures that the platform caters to a wide range of interests and hobbies, making it an ideal platform for bloggers of all kinds.</span></strong></p>

<p class="text-justify"><strong><span style="font-size: 1.2em">iBlog also provides users with a suite of tools to help them create and customize their blogs. Users can choose from a variety of templates to get started, and can easily add custom images and videos to make their blogs stand out. Additionally, iBlog's intuitive editor makes it easy for users to format and organize their posts, ensuring that their content is both attractive and easy to read.</span></strong></p>

<p class="text-justify"><strong><span style="font-size: 1.2em">Other key features of iBlog include a powerful search function that allows users to find blogs on topics that interest them, as well as an active community of bloggers who share tips, advice, and support. Whether you're a seasoned blogger or just getting started, iBlog is the perfect platform to share your passions and connect with like-minded individuals.</span></strong></p>

<p class="text-justify"><strong><span style="font-size: 1.2em">In short, iBlog is a comprehensive and versatile platform that empowers users to create and share their ideas with the world. With its diverse range of domains, powerful tools, and supportive community, iBlog is the ideal platform for anyone who wants to start a blog and make their mark on the digital world.</span></strong></p>

				</div>
			</div>
			
			
		</section>
		

		
		<footer class="container">
		   <?php include 'footer.php'; ?>
		</footer>
	  
	</body>
	</html>

	