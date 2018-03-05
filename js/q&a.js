$("#topics-btn").click(goToTopic);
$("#TopicsNavBar").click(goToTopic);

function goToTopic() {
  $('html, body').animate({
    scrollTop: $("#themes").offset().top
  }, 1000);
}

$(".navbar-toggler").click(pushBreadcrombsdown);


function pushBreadcrombsdown() {
  if ($("#navbarSupportedContent").hasClass("show")) {
    $("#breadcrumbs").css("margin-top", "55px");
  } else {
    $("#breadcrumbs").css("margin-top", "206px");
    $(".dropdown-toggle").click(pushBreadcrombsdown2);
  }
}

function pushBreadcrombsdown2() {
  if ($(".dropdown").hasClass("show")) {
    $("#breadcrumbs").css("margin-top", "206px");
  } else {
    $("#breadcrumbs").css("margin-top", "351px");
  }
}