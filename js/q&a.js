$("#topics-btn").click(goToTopic);
$("#TopicsNavBar").click(goToTopic);

function goToTopic() {
  $('html, body').animate({
    scrollTop: $("#themes").offset().top
  }, 1000);
}