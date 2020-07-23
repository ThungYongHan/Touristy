<!-- if errors array is not empty -->
<?php if (count($errors) > 0) : ?>
  <div class="error">
    <!-- iterate over errors array -->
  	<?php foreach ($errors as $error) : ?>
	  <!-- print error messages-->
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php endif ?>