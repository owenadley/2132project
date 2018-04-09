$('.autoplay').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 3000,
  dots: true,
});


function showQuery1a() {
  $('#queryDisplay1a').fadeIn(1000);
}
function hideQuery1a() {
  $('#queryDisplay1a').fadeOut(1000);
}
function showQuery1b() {
  $('#queryDisplay1b').fadeIn(1000);
}
function hideQuery1b() {
  $('#queryDisplay1b').fadeOut(1000);
}
function showQuery1c() {
  $('#queryDisplay1c').fadeIn(1000);
}
function hideQuery1c() {
  $('#queryDisplay1c').fadeOut(1000);
}
function showQuery1d() {
  $('#queryDisplay1d').fadeIn(1000);
}
function hideQuery1d() {
  $('#queryDisplay1d').fadeOut(1000);
}
function showQuery1e() {
  $('#queryDisplay1e').fadeIn(1000);
}
function hideQuery1e() {
  $('#queryDisplay1e').fadeOut(1000);
}
function showQuery2f() {
  $('#queryDisplay2f').fadeIn(1000);
}
function hideQuery2f() {
  $('#queryDisplay2f').fadeOut(1000);
}
function showQuery2g() {
  $('#queryDisplay2g').fadeIn(1000);
}
function hideQuery2g() {
  $('#queryDisplay2g').fadeOut(1000);
}
function showQuery2h() {
  $('#queryDisplay2h').fadeIn(1000);
}
function hideQuery2h() {
  $('#queryDisplay2h').fadeOut(1000);
}
function showQuery2i() {
  $('#queryDisplay2i').fadeIn(1000);
}
function hideQuery2i() {
  $('#queryDisplay2i').fadeOut(1000);
}
function showQuery2j() {
  $('#queryDisplay2j').fadeIn(1000);
}
function hideQuery2j() {
  $('#queryDisplay2j').fadeOut(1000);
}
function showQuery3k() {
  $('#queryDisplay3k').fadeIn(1000);
}
function hideQuery3k() {
  $('#queryDisplay3k').fadeOut(1000);
}
function showQuery3l() {
  $('#queryDisplay3l').fadeIn(1000);
}
function hideQuery3l() {
  $('#queryDisplay3l').fadeOut(1000);
}
function showQuery3m() {
  $('#queryDisplay3m').fadeIn(1000);
}
function hideQuery3m() {
  $('#queryDisplay3m').fadeOut(1000);
}
function showQuery3n() {
  $('#queryDisplay3n').fadeIn(1000);
}
function hideQuery3n() {
  $('#queryDisplay3n').fadeOut(1000);
}
function showQuery3o() {
  $('#queryDisplay3o').fadeIn(1000);
}
function hideQuery3o() {
  $('#queryDisplay3o').fadeOut(1000);
}





$('#loginForm').validate({
    errorClass: 'error'
  });
  
$('#modal_trigger').leanModal({
		top: 100,
		overlay: 0.6,
		closeButton: '.modal_close'
});

$(function() {
		// Calling Login Form
		$('#login_form').click(function() {
				$('.social_login').hide();
				$('.user_login').show();
				return false;
		});

		// Calling Register Form
		$('#register_form').click(function() {
				$('.social_login').hide();
				$('.user_register').show();
				$('.header_title').text('Register');
				return false;
		});

		// Going back to Social Forms
		$('.back_btn').click(function() {
				$('.user_login').hide();
				$('.user_register').hide();
				$('.social_login').show();
				$('.header_title').text('Login');
				return false;
		});
});

function pop() {
  $('#modal').fadeIn(1000);
}
function unpop() {
  $('#modal').fadeOut(1000);
}
function log() {
  $('#ulogin').fadeIn(1000);
  	$('.social_login').hide();
    $('.user_login').show();
	return false;
}
function reg() {
  $('#uregister').fadeIn(1000);
  	$('.social_login').hide();
	$('.user_register').show();
	$('.header_title').text('Register');
	return false;
}

function back() {
  	$('.user_login').hide();
	$('.user_register').hide();
	$('.social_login').show();
	$('.header_title').text('Login');
	return false;
}



/*Functions for adding user entries popups*/
function popAddRestaurant() {
  $('#modal1').fadeIn(1000);
  $('#addEntryResturaunt').fadeIn(1000);
}
function popDelRestaurant() {
  $('#modal4').fadeIn(1000);
  $('#delEntryResturant').fadeIn(1000);
}
function popAddMenuItem() {
  $('#modal2').fadeIn(1000);
  $('#addEntryMenuItem').fadeIn(1000);
}
function popDelMenuItem() {
  $('#modal5').fadeIn(1000);
  $('#delEntryMenuItem').fadeIn(1000);
}
function popAddRater() {
  $('#modal3').fadeIn(1000);
  $('#addEntryRater').fadeIn(1000);
}
function popDelRater() {
  $('#modal6').fadeIn(1000);
  $('#delEntryRater').fadeIn(1000);
}
function unpop1() {
  $('#modal1').fadeOut(1000);
}
function unpop2() {
  $('#modal2').fadeOut(1000);
}
function unpop3() {
  $('#modal3').fadeOut(1000);
}
function unpop4() {
  $('#modal4').fadeOut(1000);
}
function unpop5() {
  $('#modal5').fadeOut(1000);
}
function unpop6() {
  $('#modal5').fadeOut(1000);
}