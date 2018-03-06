$(document).ready(function() {

  if (window.location.href.indexOf('topics') != -1) {
    time = 1;
    goToTopic();
  };
});

$("#topics-btn").click({
  time: 1000
}, goToTopic);
$("#TopicsNavBar").click({
  time: 1000
}, goToTopic);

function goToTopic(time) {
  $('html, body').animate({
    scrollTop: $("#themes").offset().top - 56
  }, time);
}

$(".navbar-toggler").click(pushBreadcrombsdown);

function pushBreadcrombsdown() {
  if ($("#navbarSupportedContent").hasClass("show")) {
    $("#breadcrumbs").css("margin-top", "55px");
    $("#myPage").css("padding-top", "110px");
    $("#index").css("padding-top", "55px");

  } else {
    $("#breadcrumbs").css("margin-top", "206px");
    $("#myPage").css("padding-top", "316px");
    $("#index").css("padding-top", "206px");
    $(".dropdown-toggle").click(pushBreadcrombsdown2);
  }
}

function pushBreadcrombsdown2() {
  if ($(".dropdown").hasClass("show")) {
    $("#breadcrumbs").css("margin-top", "206px");
    $("#index").css("padding-top", "206px");
    $("#myPage").css("padding-top", "316px");
  } else {
    $("#breadcrumbs").css("margin-top", "351px");
    $("#index").css("padding-top", "351px");
    $("#myPage").css("padding-top", "402px");
  }
}