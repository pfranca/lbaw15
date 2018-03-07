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

$(document).ready(function() {

  $('.collapse').on('shown.bs.collapse', function() {
    var heightToAdjust = $(".navbar").height();
    $("#breadcrumbs").css("margin-top", heightToAdjust + 9);
    $("#index").css("padding-top", heightToAdjust + 16);
    heightToAdjust += $("#breadcrumbs").height();
    $("#myPage").css("padding-top", heightToAdjust);
  });

  $('.collapse').on('hidden.bs.collapse', function() {
    var heightToAdjust = $(".navbar").height();
    $("#breadcrumbs").css("margin-top", heightToAdjust + 9);
    $("#index").css("padding-top", heightToAdjust + 16);
    heightToAdjust += $("#breadcrumbs").height();
    $("#myPage").css("padding-top", heightToAdjust);
  });


  $('.dropdown').on('shown.bs.dropdown', function() {
    var heightToAdjust = $(".navbar").height();
    $("#breadcrumbs").css("margin-top", heightToAdjust + 9);
    $("#index").css("padding-top", heightToAdjust);
    heightToAdjust += $("#breadcrumbs").height();
    $("#myPage").css("padding-top", heightToAdjust);
  });

  $('.dropdown').on('hidden.bs.dropdown', function() {
    var heightToAdjust = $(".navbar").height();
    $("#breadcrumbs").css("margin-top", heightToAdjust + 9);
    $("#index").css("padding-top", heightToAdjust);
    heightToAdjust += $("#breadcrumbs").height();
    $("#myPage").css("padding-top", heightToAdjust);
  });

});