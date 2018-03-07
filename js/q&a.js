$(document).ready(function() {

  if (window.location.href.indexOf('topics') != -1) {
    time = 1;
    goToTopic();
  } else if (window.location.href.indexOf('answer') != -1) {
    $('#questionModal').modal('show');
  }
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
};

$(".card-body").click(function(event) {
  event.preventDefault();
  $(this).children(":first").toggleClass("unfollow");
  $(this).children(":first").toggleClass("follow");
  if ($(this).children(":first").hasClass("unfollow")) {
    $(this).children(":first").children("h5").text("Unfollow ").append('<i class="text-right fas fa-heart"></i>');
  } else if ($(this).children(":first").hasClass("follow")) {
    $(this).children(":first").children("h5").text("Follow ").append('<i class="text-right far fa-heart"></i>');
  }
});

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