<div class="row block02">
  <div class="col-sm-12">
    <div class="main-visual"><img src="./public_html/images/banner1.png" class="img-responsive hidden-xs" alt="" /><img src="./public_html/images/banner1mb.png" class="visible-xs-block" alt="" /></div>
  </div>

  <div class="col-sm-12 hidden-xs badging">
    <p>あなたの
      <br>オフィスが
      <br>ここに!</p>
  </div>

  <div class="col-sm-12 hidden-xs banner-text">
    <p>初期1ヶ月無料
      <br><span>ご継続の義務はありません</span>
    </p>
  </div>

  <div class="col-sm-12 key-point">
    <p class="hidden-xs desc2">初期1ヶ月無料 - <span class="obligation">ご継続の義務はありません</span>
    </p>
    <h3 class="title">バーチャルオフィスが<br class="hidden-xs">月々<?= $cheapestPrice; ?>円から!</h3>
    <p class="desc"><span class="visible-xs-inline">初期1ヶ月無料 - </span>従来の賃貸オフィスのコストをかけず洗練された
      <br class="hidden-xs">ビジネス環境を実現します</p>

    <ul class="col-sm-6 hidden-xs left">
      <li>一等地のビジネス住所</li>
      <li>市内局番の専用電話番号</li>
      <li>受付 &amp; 秘書</li>
    </ul>
    <ul class="col-sm-6 hidden-xs right">
      <li>会議室</li>
      <li>IT家具完備オフィス</li>
      <li>ITサポート</li>
    </ul>
    <div class="clearfix"></div>

    <?php
    // create dealbox
    echo '<div class="promo">
      <h4>' . $theMonthJa . '月限定スペシャル!</h4>
      <div class="inner">';
		
        for($i = 0; $i < sizeof($dealLocationsArr); $i++) {
          $location = $dealLocationsArr[$i];
          echo '<a href="#' . $location['locationCode'] . '" class="smooth">
                    <strong style="color: #494949;">' . $location['namae'] . '</strong>
                </a>';
          
          // echo out connecting words if necessary
          if(sizeof($dealLocationsArr) >= 3){ // more than two locations for a deal
            if($i == sizeof($dealLocationsArr) - 2) {
              echo 'または、';
            } elseif($i == sizeof($dealLocationsArr) - 1) {
              echo 'を特別割引料金でお申込みいただけます。';
            } else {
              echo '、';
            }
          } elseif(sizeof($dealLocationsArr) === 2) {
            if($i == sizeof($dealLocationsArr) - 1) {
              echo 'を特別割引料金でお申込みいただけます。';
            } else {
              echo 'または、';
            }
          } else {
            echo 'を特別割引料金でお申込みいただけます。';
          }
          
        }
      echo '</div>
    </div>';
    ?>

    <div class="col-xs-6 tel"><a href="tel:0120894577">0120 8945 77</a>
    </div>

    <div class="col-sm-6 hidden-xs chat">
      <div data-id="eVOTyEfsHEB" class="livechat_button"></div>
    </div>
    <div class="col-sm-1 hidden-xs"></div>
    <div class="col-xs-6 col-sm-11 btn"><a href="popup.php?lang=ja&enq=yet" data-toggle="modal" data-target="#remoteModal">お問合せフォーム</a>
    </div>
    <!-- Enquiry Form Popup Modal -->
    <div class="modal fade" id="remoteModal" tabindex="-1" role="dialog" aria-labelledby="remoteModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
        </div>
      </div>
    </div>
  </div>
</div>
