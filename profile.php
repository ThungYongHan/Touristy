<!-- turn off error reporting so that undefined index:username error will not pop up -->
<?php error_reporting(0); ?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "penang";
// start new or resume existing session
session_start();
// call current session's username(logged in user)
$user = $_SESSION['username'];
$conn = new mysqli($servername, $username, $password, $dbname);
// ' ' to call usernames which are not just numbers (input string)
$qResult = mysqli_query($conn, "SELECT war FROM users WHERE username='$user'");
// fetch a result row as an associative array
while ($qValues = mysqli_fetch_assoc($qResult)) {
    // if the specific war value is empty (current session user has not visited war museum)
    if (empty($qValues["war"])) {
        $warconfirm = "War Museum : Not Visited";
    } else {
        $warconfirm = "War Museum : Visited";
    }
}

$fResult = mysqli_query($conn, "SELECT farm FROM users WHERE username='$user'");
while ($fValues = mysqli_fetch_assoc($fResult)) {
    // if the specific farm value is empty (current session user has not visited butterfly farm)
    if (empty($fValues["farm"])) {
        $farmconfirm = "Butterfly Farm : Not Visited";
    } else {
        $farmconfirm = "Butterfly Farm : Visited";
    }
}

// if user clicks upload to upload their profile picture and profile description
if (isset($_POST['upload'])) {
    // image original file name from user's machine
    $image = $_FILES['image']['name'];

    // check if image file exceeds 300KB
    if ($_FILES["image"]["size"] <= 300000  ) {
        // escapes special characters in a string for use in an SQL query, used to create a legal SQL string that can be used in an SQL statement
        $image_text = mysqli_real_escape_string($conn, $_POST['image_text']);

        // file directory to store uploaded image file
        $target = "images/" . basename($image);

        // if submitted profile description is empty
        if (empty($image_text)) {
            // if there is an image file selected
            if (!empty($image)) {
                // only update the profile picture for current user and does not affect the old profile description if the submitted profile description is empty
                // can preserve existing profile description
                $sql = "UPDATE Users SET image = '$image' WHERE username='$user'";
                // check if new image file was uploaded successfully to file directory
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                    ?>
                    <script>
                    alert("Image uploaded successfully!");
                    </script>
                    <?php
                } else {
                    ?> 
                    <script>
                    alert("Image failed to be uploaded!");
                    </script>
                    <?php
                }
            }
        }
        // if no image file was selected
        elseif (empty($image)) {
            // if submitted profile description is not empty
            if (!empty($image_text)) {
                // only update the profile description for current user and does not affect profile picture if no image file was selected this time
                // can preserve existing profile picture
                $sql = "UPDATE Users SET image_text = '$image_text' WHERE username='$user'";
            }
        }
        // if image file was selected and submitted profile description is not empty
        elseif (!empty($image) && (!empty($image_text))) {
            // update both profile picture and profile description for current user
            $sql = "UPDATE Users SET image = '$image', image_text = '$image_text' WHERE username='$user'";
            // verify if new image file was uploaded successfully
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                ?>
                <script>
                alert("Image uploaded successfully!");
                </script>
                <?php
            } else {
                ?> 
                <script>
                alert("Image failed to be uploaded!");
                </script>
                <?php
            }
        }
        if ($conn->query($sql) === true) {
        } else {
            echo "Error updating records: " . $conn->error;
        }
    }
    else{
        ?>
    <script>
    alert("Image file size exceeded 300KB!");
    </script>
    <?php
    }
}

$result = mysqli_query($conn, "SELECT image, image_text FROM Users WHERE username='$user'");
?>

<style>
    img {
        width: 400px;
        height: 300px;
    }

    .emp-profile {
        padding: 3%;
        margin-top: 3%;
        margin-bottom: 3%;
        border-radius: 0.5rem;
        background: #fff;
    }

    .profile-head h6 {
        color: #0062cc;
    }
</style>

<title>Profile Page</title>
<?php
// use the standard header with all the navigation links
include('header.php');
?>

<div class="container emp-profile">
    <h3 class="mb-5">Profile picture and Description</h3>
    <body>
        <div class="row">
            <div id="content">
                <?php
                // display current user profile image and profile description
                // default user profile image is a placeholder image if no image file has been uploaded
                while ($row = mysqli_fetch_array($result)) {
                    echo "<img src='images/" . $row['image'] . "' >";
                    echo "<p> Profile Description: " . $row['image_text'] . "</p>";
                }
                ?>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-6">
                        <div class="profile-head">
                            <p class="proile-rating"></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true">Destinations</a>
                                </li>
                            </ul>
                            <h6>
                                <?php
                                echo "<br>";
                                // display visit status of war museum
                                echo $warconfirm;
                                echo "<br>";
                                ?>

                                <?php
                                // display visit status of butterfly farm
                                echo $farmconfirm;
                                echo "<br><br>";
                                ?>
                            </h6>
                        </div>
                    </div>
                </div>
                Experience Bar
                <?php
                $eResult = mysqli_query($conn, "SELECT experience FROM users WHERE username='$user'");
                while ($eValues=mysqli_fetch_assoc($eResult)) {
                    // change experience bar based on current user's experience points
                    if (($eValues["experience"]) == 0) {
                        echo(
                        "<div class=\"progress\">
                            <div class=\"progress-bar progress-bar-success progress-bar-striped\" role=\"progressbar\" aria-valuenow=\"0\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:0%\">
                            You haven't earned any experience points yet!
                            </div>
                        </div>");
                    } 
                    else if (($eValues["experience"]) == 50) {
                        echo(
                        "<div class=\"progress\">
                            <div class=\"progress-bar progress-bar-success progress-bar-striped\" role=\"progressbar\" aria-valuenow=\"50\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:50%\">
                            50%
                            </div>
                        </div>");
                    } 
                    else if (($eValues["experience"]) == 100) {
                        echo(
                        "<div class=\"progress\">
                            <div class=\"progress-bar progress-bar-success progress-bar-striped\" role=\"progressbar\" aria-valuenow=\"100\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:100%\">
                            100%
                            </div>
                        </div>");
                    } 
                }
                ?>
                
                <br>
                <!-- profile picture and profile description upload form -->
                <form method="POST" action="profile.php" class="p-5 bg-light" enctype="multipart/form-data">
                    <input type="hidden" name="size" value="1000000">

                    <!--  <input type="file"> defines a file-select field and a "Browse" button for file uploads -->
                    <p><input type="file" name="image"></p>
                    <div class="form-group">
                        <textarea id="text" cols="300" rows="10" class="form-control" name="image_text" placeholder="Please describe your profile!"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary" name="upload">Upload</button>
                    </div>
                </form>
            </div>
        </div>
</div>
<?php include('footer.php'); ?>