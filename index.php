<!-- turn off error reporting so that undefined index:username error will not pop up -->
<?php error_reporting(0);
      // start new or resume existing session
      session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Touristy - Penang Tourism Gamification Site</title>
	<?php
    // call current session's username(logged in user)
    $user = $_SESSION['username'];
    // if no user is logged in (username session is empty)
    if (empty($user)) {
        // use a different header (without profile, welcome message and log out)
        include('notloggedheader.php');
    } else {
        // use the standard header with all the navigation links
        include('header.php');
    }
    ?>     
	  <section id="home-section" class="hero">
	  	<img src="images/blob-shape-3.svg" class="svg-blob" alt="Colorlib Free Template">
		<div class="home-slider owl-carousel">
	      <div class="slider-item">
	      	<div class="overlay"></div>
	        <div class="container-fluid p-0">
	          <div class="row d-md-flex no-gutters slider-text align-items-center justify-content-end"> 
	          	<div class="one-third order-md-last">
	          		<div class="img" style="background-image:url(images/penang-war-museum.jpg);">
	          			<div class="overlay"></div>
	          		</div>
	          	</div>
		        <div class="one-forth d-flex align-items-center ftco-animate"> 
		          	<div class="text">
		          		<span class="subheading pl-5">Discover War Museum</span>
			            <h1 class="mb-4 mt-3">Penang War Museum</h1>
			            <p>Penang War Museum in Bukit Batu Maung was a fort built by the British in the 1930s.
						   In 1941 it gained fame when it became the site where the battle for Penang against the invading Japanese army was lost. 
						   These days it is a museum open to the public and is billed as Southeast Asia’s largest war museum.</p>
			            <p><a href="http://localhost:8080/Penang\Touristy\Touristy\destination-war.php" class="btn btn-primary px-5 py-3 mt-3">Discover <span class="ion-ios-arrow-forward"></span></a></p>
		            </div>
		        </div>
	          </div>
	        </div>
	      </div>

	      <div class="slider-item"> 
	      	<div class="overlay"></div>
	        <div class="container-fluid p-0">
	          <div class="row d-flex no-gutters slider-text align-items-center justify-content-end">
	          	<div class="one-third order-md-last">
	          		<div class="img" style="background-image:url(images/entopia.jpg);">
	          			<div class="overlay"></div>
	          		</div>
	          	</div>
		          <div class="one-forth d-flex align-items-center ftco-animate">
		          	<div class="text">
		          		<span class="subheading pl-5">Discover Butterfly Farm</span>
			            <h1 class="mb-4 mt-3">Entopia by Penang Butterfly Farm</span></h1>
			            <p>Entopia Penang Butterfly Farm is a giant glass-house conservatory where butterflies flutter freely amid beautifully landscaped lush tropical gardens which are also home to a selection of reptiles and other small creatures. 
						   In design it is reminiscent of Singapore's Flower Dome though somewhat smaller. 
						   The exterior is made up of a massive green wall, or vertical garden, the largest of its kind in Malaysia.</p>
			            <p><a href="http://localhost:8080/Penang\Touristy\Touristy\destination-farm.php" class="btn btn-primary px-5 py-3 mt-3">Discover <span class="ion-ios-arrow-forward"></span></a></p>
		            </div>
		          </div>
	        	</div>
	        </div>
	      </div>
	    </div>
    </section>
<?php include('footer.php'); ?>
</body>
</html>