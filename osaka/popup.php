<?php
	$lang = htmlspecialchars($_GET["lang"]);
	$enq  = htmlspecialchars($_GET["enq"]);
	if ($lang == "ja" && $enq == "yet") :
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<script src="public_html/js/jquery.activity-indicator-valid-chrome.js"></script>
<script src="public_html/js/jquery.maxlength.js"></script>
<script src="public_html/js/popup.js"></script>
</head>

<body class="ja">

<!-- Google Tag Manager -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-12762629-1', 'auto');
  ga('send', 'pageview');

</script>
<!-- End Google Tag Manager -->

<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title text-center"><strong>お問合せフォーム</strong></h4>
</div>
<div class="modal-body">

	<div id="form_ja">
		<form class="form-horizontal" action="" method="post" id="form_">
			<div class="form-group">
				<label for="name_" class="col-sm-4 control-label require">お名前 <span>*</span></label>
				<div class="col-sm-8 req-base">
					<input type="text" class="form-control" id="name_" name="name_" value="" maxlength="50"><span id="error1">必須</span>
				</div>
			</div>
			<div class="form-group">
				<label for="email_" class="col-sm-4 control-label require">Email <span>*</span></label>
				<div class="col-sm-8 req-base">
					<input type="email" class="form-control" id="email_" name="email_" value="" maxlength="100"><span id="error2">必須</span>
				</div>
			</div>
			<div class="form-group">
				<label for="phone_" class="col-sm-4 control-label require">電話 <span>*</span></label>
				<div class="col-sm-8 req-base">
					<input type="tel" class="form-control" id="phone_" name="phone_" value="" maxlength="50"><span id="error3">必須</span>
				</div>
			</div>
			<div class="form-group">
				<label for="comments_" class="col-sm-4 control-label require">メッセージ</label>
				<div class="col-sm-8 req-base">
					<textarea class="form-control" rows="3" id="comments_" name="comments_" maxlength="2000"></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10 req-base">
				<div class="require"><span>*</span> 必須項目</div>
				<div class="button"><a href="javascript:void(0);" id="button_">お問合せを送信</a></div>
				</div>
			</div>
			<div class="clearfix"></div>

			<input type="hidden" name="lang_" value="JPN" />
			<input type="hidden" name="url_" value="http://virtualoffice.servcorp.co.jp" />
		</form>

	</div>

	<div id="waiting"></div>

</div>

</body>
</html>
<?php elseif ($lang == "ja" && $enq == "done") : ?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title text-center"><strong>お問合せフォーム</strong></h4>
</div>
<div class="modal-body">

	<div id="thankyou_ja">
		<h3 class="thankyoutitle">送信されました</h3>
		<p class="thankyoucont">サーブコープ担当者より24時間以内に折り返しご連絡させていただきます。</p>

		<div class="tel">
			<span>0120 8945 77</span>
		</div>
	</div>

</div>

<script type="text/javascript" class="microad_blade_track">
<!--
var microad_blade_jp = microad_blade_jp || { 'params' : new Array(), 'complete_map' : new Object() };
(function() {
var param = {'co_account_id' : '9744', 'group_id' : 'convtrack27478', 'country_id' : '1', 'ver' : '2.1.0'};
microad_blade_jp.params.push(param);

var src = (location.protocol == 'https:')
? 'https://d-track.send.microad.jp/js/blade_track_jp.js' : 'http://d-cache.microad.jp/js/blade_track_jp.js';

var bs = document.createElement('script');
bs.type = 'text/javascript'; bs.async = true;
bs.charset = 'utf-8'; bs.src = src;

var s = document.getElementsByTagName('script')[0];
s.parentNode.insertBefore(bs, s);
})();
-->
</script>
<?php elseif ($lang == "en" && $enq == "yet") : ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<script src="../public_html/js/jquery.activity-indicator-valid-chrome.js"></script>
<script src="../public_html/js/jquery.maxlength.js"></script>
<script src="../public_html/js/popup.js"></script>
</head>

<body class="en">

<!-- Google Tag Manager -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-12762629-1', 'auto');
  ga('send', 'pageview');

</script>
<!-- End Google Tag Manager -->

<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title text-center"><strong>Contact Us</strong></h4>
</div>
<div class="modal-body">

	<div id="form_en">
		<form class="form-horizontal" action="" method="post" id="form_">
			<div class="form-group">
				<label for="name_" class="col-sm-4 control-label require">Full Name <span>*</span></label>
				<div class="col-sm-8 req-base">
					<input type="text" class="form-control" id="name_" name="name_" value="" maxlength="50"><span id="error1">Required</span>
				</div>
			</div>
			<div class="form-group">
				<label for="email_" class="col-sm-4 control-label require">Email <span>*</span></label>
				<div class="col-sm-8 req-base">
					<input type="email" class="form-control" id="email_" name="email_" value="" maxlength="100"><span id="error2">Required</span>
				</div>
			</div>
			<div class="form-group">
				<label for="phone_" class="col-sm-4 control-label require">Phone <span>*</span></label>
				<div class="col-sm-8 req-base">
					<input type="tel" class="form-control" id="phone_" name="phone_" value="" maxlength="50"><span id="error3">Required</span>
				</div>
			</div>
			<div class="form-group">
				<label for="comments_" class="col-sm-4 control-label require">Comments:</label>
				<div class="col-sm-8 req-base">
					<textarea class="form-control" rows="3" id="comments_" name="comments_" maxlength="2000"></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10 req-base">
				<div class="require"><span>*</span> Required fields</div>
				<div class="button"><a href="javascript:void(0);" id="button_">Send my enquiry</a></div>
				</div>
			</div>
			<div class="clearfix"></div>

			<input type="hidden" name="lang_" value="ENG" />
			<input type="hidden" name="url_" value="http://virtualoffice.servcorp.co.jp/en" />
		</form>

	</div>

	<div id="waiting"></div>

</div>

</body>
</html>
<?php elseif ($lang == "en" && $enq == "done") : ?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title text-center"><strong>Contact Us</strong></h4>
</div>
<div class="modal-body">

	<div id="thankyou_en">
		<h3 class="thankyoutitle">Thank you</h3>
		<p class="thankyoucont">Thank you for your enquiry, a Servcorp manager will contact you within 24 hours to discuss your business needs.</p>

		<div class="tel">
			<span>+81 3 6269 3400</span>
		</div>
	</div>

</div>

<script type="text/javascript" class="microad_blade_track">
<!--
var microad_blade_jp = microad_blade_jp || { 'params' : new Array(), 'complete_map' : new Object() };
(function() {
var param = {'co_account_id' : '9744', 'group_id' : 'convtrack27478', 'country_id' : '1', 'ver' : '2.1.0'};
microad_blade_jp.params.push(param);

var src = (location.protocol == 'https:')
? 'https://d-track.send.microad.jp/js/blade_track_jp.js' : 'http://d-cache.microad.jp/js/blade_track_jp.js';

var bs = document.createElement('script');
bs.type = 'text/javascript'; bs.async = true;
bs.charset = 'utf-8'; bs.src = src;

var s = document.getElementsByTagName('script')[0];
s.parentNode.insertBefore(bs, s);
})();
-->
</script>
<?php endif; ?>
