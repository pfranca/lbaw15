$(document).ready(function() {
  loadingModals();
  if (window.location.href.indexOf('topics') != -1) {
    time = 1;
    goToTopic();
  }
});

function loadingModals() {
  if ($("#modals").hasClass('login')) {
    $.get('html/loginModals.html', function(result) {
      $('#modals').append(result);
      $.getScript("js/LoginValidate.js");
      if (window.location.href.indexOf('login') != -1) {
        $('#loginModal').modal("show");
      }
      else if (window.location.href.indexOf('register')!= -1)
      {
        $("#registerModal").modal("show");
      }
    });
    console.log("login");

  };
  if ($("#modals").hasClass('submitQuestion')) {
    $.get('html/submitQuestionModal.html', function(result) {
      $('#modals').append(result);
    });
  };
  if ($("#modals").hasClass('answerQuestion')) {
    $.get('html/submitAnswerModal.html', function(result) {
      $('#modals').append(result);
      if (window.location.href.indexOf('answer') != -1) {
        $('#answerModal').modal("show");
      }
    });
  };

}

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

  $("#questionSubmitBtn").click(function(){
      window.alert("short " + $("#short_message").val() +"\n"+ "long " + $("#long_message").val());
      
      $.ajax({
        url: '/question/addQuestion',
        type: 'POST',
        dataType: 'json',
        data: {
          "_token": $('#token').val(),
          "id_author": '2',
          "topic_name": $("#topicName").val(),
          "short_message": $("#short_message").val(),
          "long_message": $("#long_message").val()
        }

    }).done(function (data) {
      window.alert($("#topicSelected").val());
        // do whatever u want if the request is ok
        $("#short_message").val('');
        $("#long_message").val('');        
        $('#questionModal').modal('hide');
        window.alert(data);
        console.log(data);
    }).fail(function (data) {
      window.alert(data);

        // do what ever you want if the request is not ok

    });
  
  });

});
