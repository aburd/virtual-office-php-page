<div class="block04">
	<div class="locations">
		<p class="col-md-3 desc-title">Select your location</p>

		<ul class="col-md-9 location-link hidden-xs">
      <?php
      	echo makeCityLinks( $cityNames, $lang );
      ?>
      <div class="clearfix"></div>
		</ul>
		<div class="clearfix"></div>
	</div>

	<div id="accordion">

		<?php
    	echo makeCities();
	  ?>

	</div>
</div>
