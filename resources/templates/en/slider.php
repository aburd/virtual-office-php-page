<div class="row block02">
	<div class="col-sm-12">
		<div class="main-visual"><img src="../public_html/images/banner1.png" class="img-responsive hidden-xs" alt="" /><img src="../public_html/images/banner1mb.png" class="visible-xs-block" alt="" /></div>
	</div>

	<div class="col-sm-12 hidden-xs badging"><p>Your address could be<br>here!</p></div>

	<div class="col-sm-12 hidden-xs banner-text"><p>First Month FREE<br><span>No further obligation</span></p></div>

	<div class="col-sm-12 key-point">
		<p class="hidden-xs desc2">First Month FREE - <span class="obligation">No further obligation</span></p>
		<h3 class="title">Virtual Office from &yen;10,000/month!</h3>
		<p class="desc"><span class="visible-xs-inline">First Month FREE - </span>Run your business professionally without the costs of a traditional office space.</p>

		<ul class="col-sm-7 hidden-xs left">
			<li>Prime Business Address</li>
			<li>Local Telephone Number</li>
			<li>Receptionist &amp; Secretary</li>
		</ul>
		<ul class="col-sm-5 hidden-xs right">
			<li>Meeting Rooms</li>
			<li>Office Suites</li>
			<li>IT support</li>
		</ul>
		<div class="clearfix"></div>

		<!-- Start VO promo  -->
		<?php
    // create dealbox
    echo '<div class="promo">
      <h4>' . $theMonthEn . ' Special!</h4>
      <div class="inner">Get a reduced special price at ';
				// Loop through locations with deal
        for($i = 0; $i < sizeof($dealLocationsArr); $i++) {
          $location = $dealLocationsArr[$i];
					// Print out location
					echo '<a href="#' . $location['locationCode'] . '" class="smooth">
                    <strong style="color: #494949;">' . $location['name'] . '</strong>
                </a>';
					// echo out connector if necessary
          if(sizeof($dealLocationsArr) > 2){ // more than two locations for a deal
            if($i === sizeof($dealLocationsArr) - 1) {
              echo '.';
            } elseif($i === sizeof($dealLocationsArr) - 2) { 
              echo ' or ';
            } else {
              echo ', ';
            }            
          } elseif(sizeof($dealLocationsArr === 2)) { // only two locations this month
            if($i !== sizeof($dealLocationsArr) - 1) {
              echo ' or ';
            } 
          }

        }
      echo '</div>
    </div>';
		?>
		<!-- End VO promo -->

		<div class="col-xs-6 tel"><a href="tel:81362693400">+81 3 6269 3400</a></div>

		<!-- Livechat button -->
		<div class="col-sm-6 hidden-xs chat">
			<div data-id="TeJiKG5sjUK" class="livechat_button"></div>
		</div>
		<div class="col-sm-1 hidden-xs"></div>

		<div class="col-xs-6 col-sm-11 btn"><a href="../popup.php?lang=en&enq=yet" data-toggle="modal" data-target="#remoteModal">Contact Us Form</a></div>
		<!-- Enquiry Form Popup Modal -->
		<div class="modal fade" id="remoteModal" tabindex="-1" role="dialog" aria-labelledby="remoteModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
				</div>
			</div>
		</div>
	</div>
</div>
