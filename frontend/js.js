$('.autoplay').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 3000,
  dots: true,
});

function showQuery() {
  $('.queryDisplay').fadeIn(1000);
}