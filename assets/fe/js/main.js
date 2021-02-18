$(document).ready(function() {
  var owl = $('#testimonial');
  owl.owlCarousel({
    margin: 30,
    nav: false,
    dots: true,
    loop: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      1000: {
        items: 2
      }
    }
  })
})












