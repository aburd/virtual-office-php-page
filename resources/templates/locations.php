<div class="block04">
  <div class="locations">
    <p class="col-md-4 desc-title">ご希望の拠点をお選びください</p>

    <ul class="col-md-8 location-link hidden-xs">
      <!-- print out the links for each city above the locations -->
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
