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