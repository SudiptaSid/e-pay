//scroll sections
$(".scroll").on("click", function (event) {
  event.preventDefault();
  $("html,body").animate(
    {
      scrollTop: $(this.hash).offset().top,
    },
    1200
  );
});

// Back To Top
$(window).on("scroll", function () {
  if ($(this).scrollTop() > 500) $(".backTop").fadeIn("slow");
  else $(".backTop").fadeOut("slow");
});

$(document).on("click", ".backTop", function () {
  $("html, body").animate({ scrollTop: 0 }, 800);
  return false;
});

// Typing
var TxtType = function (el, toRotate, period) {
  this.toRotate = toRotate;
  this.el = el;
  this.loopNum = 0;
  this.period = parseInt(period, 10) || 2000;
  this.txt = "";
  this.tick();
  this.isDeleting = false;
};
TxtType.prototype.tick = function () {
  var i = this.loopNum % this.toRotate.length;
  var fullTxt = this.toRotate[i];

  if (this.isDeleting) {
    this.txt = fullTxt.substring(0, this.txt.length - 1);
  } else {
    this.txt = fullTxt.substring(0, this.txt.length + 1);
  }

  this.el.innerHTML = '<i class="wrap">' + this.txt + "</i>";

  var that = this;
  var delta = 200 - Math.random() * 100;

  if (this.isDeleting) {
    delta /= 2;
  }

  if (!this.isDeleting && this.txt === fullTxt) {
    delta = this.period;
    this.isDeleting = true;
  } else if (this.isDeleting && this.txt === "") {
    this.isDeleting = false;
    this.loopNum++;
    delta = 500;
  }

  setTimeout(function () {
    that.tick();
  }, delta);
};
window.onload = function () {
  var elements = document.getElementsByClassName("typewrite");
  for (var i = 0; i < elements.length; i++) {
    var toRotate = elements[i].getAttribute("data-type");
    var period = elements[i].getAttribute("data-period");
    if (toRotate) {
      new TxtType(elements[i], JSON.parse(toRotate), period);
    }
  }
  // INJECT CSS
  var css = document.createElement("style");
  css.type = "text/css";
  css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
  document.body.appendChild(css);
};

// Testimonial Slider
$(".testimonialSlider").owlCarousel({
  items: 1,
  dots: true,
  loop: true,
  autoplayTimeout: 8000,
  autoplay: true,
});

// Payment Form
$(".numOnly").keyup(function (e) {
  this.value = this.value.replace(/\D/g, "");
});

// Ammount View
function showValue(value) {
  document.getElementById("amount_show").innerText = value;
}

// Phone number
$("#phone").keyup(function (e) {
  this.value = this.value.replace(/\D/g, "");
});

// Card Number
$("#ccnum").keyup(function (e) {
  this.value = this.value.replace(/\D/g, "");
  var value = this.value;

  if (value.length > 0) {
    var formattedValue = value.match(/.{1,4}/g).join("-");
    this.value = formattedValue;
  }
});

// Card Expiry
$("#ccexpiry").keyup(function (e) {
  this.value = this.value.replace(/\D/g, "");
  var value = this.value;
  if (value.length > 0) {
    var formattedValue = value.match(/.{1,2}/g).join("/");
    this.value = formattedValue;
  }
});

function payNow() {
  setTimeout(() => {
    window.location.href = "loading.php";
  }, 1000);
}
