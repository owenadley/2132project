$('.autoplay').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 3000,
  dots: true,
});

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

function showQuery1a() {
  $('#queryDisplay1a').fadeIn(1000);
}
function showQuery1b() {
  $('#queryDisplay1b').fadeIn(1000);
}
function showQuery1c() {
  $('#queryDisplay1c').fadeIn(1000);
}
function showQuery1d() {
  $('#queryDisplay1d').fadeIn(1000);
}
function showQuery1e() {
  $('#queryDisplay1e').fadeIn(1000);
}
function showQuery2f() {
  $('#queryDisplay2f').fadeIn(1000);
}
function showQuery2g() {
  $('#queryDisplay2g').fadeIn(1000);
}
function showQuery2h() {
  $('#queryDisplay2h').fadeIn(1000);
}
function showQuery2i() {
  $('#queryDisplay2i').fadeIn(1000);
}
function showQuery2j() {
  $('#queryDisplay2j').fadeIn(1000);
}
function showQuery3k() {
  $('#queryDisplay3k').fadeIn(1000);
}
function showQuery3l() {
  $('#queryDisplay3l').fadeIn(1000);
}
function showQuery3m() {
  $('#queryDisplay3m').fadeIn(1000);
}
function showQuery3n() {
  $('#queryDisplay3n').fadeIn(1000);
}
function showQuery3o() {
  $('#queryDisplay3o').fadeIn(1000);
}
