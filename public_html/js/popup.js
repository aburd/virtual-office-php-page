// JavaScript Document

$(function(){

  // Setup status for forms
  var active = false;

  $("#button_").click(function() {
    // Only handle forms that aren't already running
    if(active == false) {
      var lang = $("html").attr("lang");
      var address = $("#email_").val();

      if($("#name_").val() != "" && $("#email_").val() != "" && address.match(/^[^@]+@.+\..+$/) && $("#phone_").val() != "") {
        active = true;
        waitingIndicator();

        var form = $("#form_");
        var param = {};

        rel = form.serializeArray();
        $(form.serializeArray()).each(function(i, v) {
          param[v.name] = v.value;
        });


        if(lang == "ja") {
          $.post("submit.php", param, function(returnValue) {
            if(returnValue == "done") {
              $.ajax({
                url: "popup.php?lang=ja&enq=done",
                cache: false,
                success: function(html){
                  $("#remoteModal .modal-content").html('');
                  $("#remoteModal .modal-content").append(html);
                }
              });
              ga('send','pageview', '/popup.php?lang=ja&enq=done');
            } else if(returnValue == "error") {
              alert("送信エラーです　もう一度お試しください");
              location.href = "popup.php?lang=ja&enq=yet";
            }
          });
        } else {
          $.post("../submit.php", param, function(returnValue) {
            if(returnValue == "done") {
              $.ajax({
                url: "../popup.php?lang=en&enq=done",
                cache: false,
                success: function(html){
                  $("#remoteModal .modal-content").html('');
                  $("#remoteModal .modal-content").append(html);
                }
              });
              ga('send','pageview', '/popup.php?lang=en&enq=done');

              // reset form status
              active = false;
            } else if(returnValue == "error") {
              alert("Send error, Try again");
              location.href = "../popup.php?lang=en&enq=yet";

              // reset form status
              active = false;
            }
          });
        }

      } else {
        if(lang == "ja") {
          if(address.match(/^[^@]+@.+\..+$/)) {
            alert("必須項目を入力してください");
          } else {
            alert("Emailを正しく入力してください");
          }
        } else {
          if(address.match(/^[^@]+@.+\..+$/)) {
            alert("Please input Required fields");
          } else {
            alert("Please input Email definitely");
          }
        }
      }
    }
	});

	$("#name_").blur(function() {
		if($(this).val() == ""){
			$("#error1").css("display", "inline");
		} else {
			$("#error1").css("display", "none");
		}
	});

	$("#email_").blur(function() {
		if($(this).val() == ""){
			$("#error2").css("display", "inline");
		} else {
			$("#error2").css("display", "none");
		}
	});

	$("#phone_").blur(function() {
		if($(this).val() == ""){
			$("#error3").css("display", "inline");
		} else {
			$("#error3").css("display", "none");
		}
	});

	// textarea maxlength
	$('#comments_').maxlength();
});

// Put focus in first txtbox upon being shown
$('#remoteModal').on('shown.bs.modal', function () {
  $('#name_').focus();
});

function waitingIndicator() {
	var modalContentHeight = $('#remoteModal .modal-content').height();
	$("#waiting").css({"height": modalContentHeight});

	var modalContentWidth  = $('#remoteModal .modal-content').width();
	$("#waiting").css({"width": modalContentWidth});

	$("#waiting").css({"display": 'block'});

	$('#waiting').activity();
}
