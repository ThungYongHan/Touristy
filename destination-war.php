<!-- turn off error reporting so that undefined index:username error will not pop up -->
<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "penang";

// start new or resume existing session
session_start();

// call current session's username (logged in user)
$user = $_SESSION['username'];
// connect to database
$conn = new mysqli($servername, $username, $password, $dbname);

// set war = '1' which means user visited war museum
$sql = "UPDATE Users SET war='1' WHERE username='$user'";
// add 50 to user's experience points
$exp = "UPDATE Users SET experience= experience + 50 WHERE username='$user'";

// if user clicked to set destination as visited
if ($_POST && isset($_POST['Visited'])) {
    // if no user is logged in (username session is empty)
    if (empty($user)) {
        // alert user with alert box to log in to set visit status
        echo "<script type='text/javascript'>
              alert('You must be logged in to set visit status!');
              </script>";
    } else {
        // if updating war museum visit status was successful
        if ($conn->query($sql) === true) {
            // execute query to add experience points for user (for progress bar in profile)
            mysqli_query($conn, $exp);
            echo "<script type='text/javascript'>
                alert('Visit status updated successfully');
            </script>";
        } else {
            echo "Error updating visit status: " . $conn->error;
        }
    }
}

// if user clicks upload to upload their review and if the review text for war museum is not empty
// trim() to remove whitespace and other predefined characters from both sides of warreview_text string (make sure user cannot submit empty reviews)
if (isset($_POST['upload']) && trim($_POST['warreview_text']) != "") {
    if (empty($user)) {
        // alert user with alert box to log in to post review
        echo "<script type='text/javascript'>
                alert('You must be logged in to post your review!');
              </script>";
    } else{
        // mysqli_real_escape_string() escapes special characters in a string for use in an SQL query, used to create a legal SQL string that can be used in an SQL statement
        $warreview_text = mysqli_real_escape_string($conn, $_POST['warreview_text']);

        // set the review text for war museum for the current user
        $sql = "UPDATE Users SET warreview_text = '$warreview_text' WHERE username='$user'";

        // if submitting review for war museum was successful
        if ($conn->query($sql) === true) {
            echo "<script type='text/javascript'>
                    alert('Review for Penang War Museum submitted successfully!');
                  </script>";
        } else {
            echo "Error submitting review: " . $conn->error;
        }
    }
}

// only display user profile image, user specific war museum review text and username if they submitted a review for war museum
$warreviewresult = mysqli_query($conn, "SELECT image, warreview_text, username FROM Users WHERE warreview_text IS NOT NULL");
$warcheck = mysqli_query($conn, "SELECT war FROM users WHERE username='$user'");

// close connection to database
$conn->close();
?>

<!-- css for gallery div -->
<style>
div.gallery {
  margin: 1px;
  float: left;
  width: 378px;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}
</style>

<head>
    <title>Penang War Museum</title>

    <?php
    if (empty($user)) {
        // use a different header (without profile, welcome message and log out)
        include('notloggedheader.php');
    } else {
        // use the standard header with all the navigation links
        include('header.php');
    }
    ?>
   
    <script type="text/javascript">
        // confirm() method to open the corresponding link in window.location.href if user clicks "OK"
        // if user clicks "cancel", user stays on the current page
        function redirectWarFirstWarning(){
          if (confirm('You are being redirected to an external website!')) window.location.href="https://www.youtube.com/watch?v=M-3B-OMnl8g&feature=emb_logo";      
        }

        function redirectWarSecondWarning(){
          if (confirm('You are being redirected to an external website!')) window.location.href="https://mypenang.gov.my/all/my-stories/118/";      
        }

        function reviewMsg(){
          alert("Thanks for submitting a review about Penang War Museum!\nNote: Your review will not be posted if the review message is blank!");
        }

        function countReview(review) {
          var maxChar = 100;             
          words = document.warpost.warreview_text;     
          // if warreview_text reaches exactly 100 characters     
          if (words.value.length == maxChar){ 
             // display alert box message 
             alert('You have reached the maximum 100 characters allowed!');  
          } 
        }
        
    </script>

	  <section class="hero-wrap" style="background-image: url('images/f4.jpg');" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-start">
          <div class="col-md-9 ftco-animate pb-4">
          <p style="color:white">Discover War Museum</p>
            <!-- button tied to onclick javascript function that asks user if they wish to be redirected to other links  -->
            <!-- a href="#" will allow the user to still stay on current page if they do not wish to be redirected  -->
            <p><a href="#" class="btn btn-primary py-2 px-4 "onclick="redirectWarFirstWarning();">Watch Video</a></p>

            <!-- Visited button form to allow user to change their visit status of butterfly farm -->
            <form action="destination-war.php" method="post">
            <?php
            // use different visit button based on the war museum visit status of the current logged in user
            while ($qValues=mysqli_fetch_assoc($warcheck)) {
                // if the specific war value is empty
                if (empty($qValues["war"])) {
                    echo("<input type='submit' class=\"btn btn-black py-2 px-4\" name='Visited' value='Visited? +50xp'/>");
                } else {
                    // disabled visit button
                    echo("<input type='submit' disabled class=\"btn btn-black py-2 px-4\" value='Visited'/>");
                }
            }
            if (empty($user)) {
                echo("<input type='submit' class=\"btn btn-black py-2 px-4\" name='Visited' value='Visited?'/>");
            }
            ?>
            </form>
          </div>
        </div>
      </div>
    </section>
    
    <section class="ftco-section ftco-services-2 ftco-no-pt">
    	<div class="container-fluid px-0 bg-light">
    		<div class="container">
    			<div class="row tour py-5">
        	<div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services text-center d-block">
              <div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-alarm-clock"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">9AM–6PM every day<br>
                Night tours available</h3>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services text-center d-block">
              <div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-manager"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Age 12+</h3>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services text-center d-block">
              <div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-calendar"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">1 day visit</h3>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services text-center d-block">
              <div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-wallet"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3"><span>RM15 or RM30/adult</span> <br>RM7.50 or RM15/child</h3>
              </div>
            </div>      
          </div>
        </div>
    		</div>
    	</div>
      <div class="container">
        <div class="row">
        	<div class="col-md-12 tour-wrap mb-5">
    				<div class="row">
    					<div class="col-md-6 d-flex ftco-animate">
    						<div class="img align-self-stretch" style="background-image: url(images/war2.jpg);"></div>
    					</div>
    					<div class="col-md-6 ftco-animate">
    						<div class="text py-5">
    							<h3>Discover War Museum</h3>
    							<p>Penang War Museum in Bukit Batu Maung was a fort built by the British in the 1930s.
						         In 1941 it gained fame when it became the site where the battle for Penang against the invading Japanese army was lost. 
						         These days it is a museum open to the public and is billed as Southeast Asia’s largest war museum.</p>
    							<p><a href="#" class="btn btn-secondary" onclick="redirectWarSecondWarning();">Official Website</a> </p>
    						</div>
    					</div>
    				</div>
    			</div>
          
    				<div class="day-wrap">
              <!-- gallery div to show images of war museum -->  
    					<h3 class="pl-5">Gallery</h3>
  
              <div class="gallery">
              <a target="_blank" href="images/wargal1.jpg">
                <img src="images/wargal1.jpg" alt="war1" width="600" height="400">
              </a>
            </div>

            <div class="gallery">
              <a target="_blank" href="images/wargal4.jpg">
                <img src="images/wargal4.jpg" alt="war2" width="600" height="400">
              </a>
            </div>

            <div class="gallery">
              <a target="_blank" href="images/wargal3.jpg">
                <img src="images/wargal3.jpg" alt="war3" width="600" height="400">
              </a>
            </div>
    				</div>
    			</div>  
    		    <!-- send mail with subject = Penang War Museum and body = Recommend Penang War Museum to p18009969@student.newinti.edu.my -->    		
    				<p> <a href="mailto:?subject=Penang War Museum&amp;body=Recommend Penang War Museum" class="btn btn-secondary py-3 px-4">Recommend This Place!</a></p>

    			<div class="col-md-12 tour-wrap">
    				<div class="pt-5 mt-5">
              <h3 class="mb-5">Reviews</h3>
              <ul class="comment-list">
              <li class="comment">
                <!-- display user profile image, user specific butterfly farm review text and username if they submitted a review for war museum -->
                <?php while ($row = mysqli_fetch_array($warreviewresult)) {
                echo "<div class=\"vcard bio\">";
                echo "<img src='images/".$row['image']."' >";
                echo "</div>";
                echo "<p>Review content: ".$row['warreview_text']."</p>";
                echo "<p>Review by: ".$row['username']."</p>";
                echo "<br>";
            }
                ?>
              </li>
            </div>
              </ul>
   
  <h3 class="mb-5">Leave a review</h3>
  <!-- war museum review text form -->
  <form method ="POST" action="destination-war.php" class="p-5 bg-light" enctype="multipart/form-data" name="warpost" id="warpost" >
      <input type="hidden" name="size" value="1000000">
      <div class="form-group">
        <label for="message">Message</label>
        <!-- onkeypress to execute countReview function when user presses a key: -->
        <textarea id="warreview_text" cols="30" rows="10" class="form-control" name="warreview_text" maxlength="100"
         placeholder="Say something about the Penang War Museum! (100 character limit)" 
         onkeypress="countReview(this.form)";></textarea>
      </div>
      <div class="form-group">         
        <button type="submit" class="btn btn-secondary" name="upload" onclick="reviewMsg()">Submit</button>                 
      </div>
  </form>
              </div>
            </div>
    			</div>
        </div>
      </div>
    </section> 
    <?php include('footer.php'); ?>
  </body>
</html>