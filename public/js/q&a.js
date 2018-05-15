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

function actionFollow(id_topic){
  $.ajax({
    url: '/setfollow',
    type: 'PUT',
    dataType: 'json',
    data: {
      "_token": $('#token').val(),
      "id_topic": id_topic
    }
    }).done(function (data) {
        console.log(data);
    }).fail(function (data) {
      console.log(data);
    });
}

function actionFollowAnswer(id_answer){
  window.alert(id_answer)
  $.ajax({
    url: '/setfollowQuestion',
    type: 'PUT',
    dataType: 'json',
    data: {
      "_token": $('#token').val(),
      "id_topic": id_answer
    }
    }).done(function (data) {
        console.log(data);
        //location.reload();
    }).fail(function (data) {
      console.log(data);
    });
}


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
      
      $.ajax({
        url: '/question/addQuestion',
        type: 'POST',
        dataType: 'json',
        data: {
          "_token": $('#token').val(),
          "id_topic": $("#topicSelected").val(),
          "short_message": $("#short_message").val(),
          "long_message": $("#long_message").val()
        }
    }).done(function (data) {
        // do whatever u want if the request is ok
        $("#short_message").val('');
        $("#long_message").val('');        
        $('#questionModal').modal('hide');
        console.log(data);
    }).fail(function (data) {
      window.alert(data);
        // do what ever you want if the request is not ok
    });
  });

   $("#submitionEdit").click(function(){
      var usr_name = $('#usernameEdit').val()
      var new_name = $('#usr').val()
      var new_email = $('#email').val()
      var new_bio = $('#bio').val()

      
      $.ajax({
        url: '/user/'+usr_name+'/edit',
        type: 'PUT',
        dataType: 'json',
        data: {
          "_token": $('#token').val(),
          "name": new_name,
          "email" : new_email,
          "bio" : new_bio

        }

    }).done(function (data) {
      console.log(data);
      location.reload();
        // do whatever u want if the request is ok
       
    }).fail(function (data) {
      console.log(data);
      window.alert("Fail: " + data);
    });
  });

  $("#bestAnswer").click(function(){
      $.ajax({
        url: '/question/getBestAnswer',
        type: 'GET',
        dataType: 'json',
        data: {
          "_token": $('#token').val(),
          "id_question": $("#questionId").val(),
        }
    }).done(function (data) {
        console.log(data);
    }).fail(function (data) {
      console.log("bestAnswer " + data.data);
        // do what ever you want if the request is not ok

    });
  });
  
  $("#submitAnswerBtn").click(function(){
    
    $.ajax({
      url: '/answer/addAnswer',
      type: 'POST',
      dataType: 'json',
      data: {
        "_token": $('#token').val(),
        "id_question": $("#questionId").val(),
        "message": $("#message").val()
      }
  }).done(function (data) {
        $("#message").val('');        
        $('#answerModal').modal('hide');
        location.reload();
      console.log(data);
  }).fail(function (data) {
    console.log(data);
  });
});



$("#editquestionSubmitBtn").click(function(){
  $.ajax({
    url: '/question/updateQuestion',
    type: 'PUT',
    dataType: 'json',
    data: {
      "_token": $('#token').val(),
      "id_topic": $("#edit_topicSelected").val(),
      "id_question" : $("#questionId").val(),
      "short_message": $("#edit_short_message").val(),
      "long_message": $("#edit_long_message").val()
    }
}).done(function (data) {
    $('#editquestionModal').modal('hide');
    console.log(data);
    location.reload();
}).fail(function (data) {
  window.alert(data);
    // do what ever you want if the request is not ok
});
});


$("#submitEditAnswerBtn").click(function(){
  $.ajax({
    url: '/answer/updateAnswer',
    type: 'PUT',
    dataType: 'json',
    data: {
      "_token": $('#token').val(),
      "id_answer": $("#answerId").val(),
      "message": $("#message").val()
    }
}).done(function (data) {
    $('#editanswerModal').modal('hide');
    console.log(data);
    location.reload();
}).fail(function (data) {
  window.alert(data);
  console.log(data);
    // do what ever you want if the request is not ok
});
});

  $("#submitDeleteQuestion").click(function(){

    $.ajax({
      url: '/topic/question/disable',
      type: 'PUT',
      dataType: 'json',
      data: {
        "_token": $('#token').val(),
        "id_question": $("#getId").val()
      }
  }).done(function (data) {
      console.log(data);
       location.reload();
  }).fail(function (data) {
    console.log(data);
  });
});



  $("#submitDeleteAnswer").click(function(){
    $.ajax({
      url: '/topic/question/answer/disable',
      type: 'PUT',
      dataType: 'json',
      data: {
        "_token": $('#token').val(),
        "id_answer": $("#answerIdToDelete").val()
      }
  }).done(function (data) {
      console.log(data);
       location.reload();
  }).fail(function (data) {
    console.log(data);
  });
});


$("#question-follow-btn").click(function(){
  window.alert('follow ' + $("#userAuthId").val());
  $.ajax({
    url: '/topic/question/followQuestion',
    type: 'POST',
    dataType: 'json',
    data: {
      "_token": $('#token').val(),
      "id_question": $("#questionId").val(),
      "id_user": $("#userAuthId").val()      
    }
}).done(function (data) {
    console.log(data);
    window.alert("followed");
}).fail(function (data) {
  console.log(data);
});
});

$("#question-unfollow-btn").click(function(){
  window.alert('unfollow');
  $.ajax({
    url: '/topic/question/unfollowQuestion',
    type: 'DELETE',
    dataType: 'json',
    data: {
      "_token": $('#token').val(),
      "id_question": $("#questionId").val(),
      "id_user": $("#userId").val() 
    }
}).done(function (data) {
    console.log(data);
    window.alert("unfollowed");
}).fail(function (data) {
  console.log(data);
});
});


$("#submitReportBtn").click(function(){
      //reason
      //reported user
      //reported question or answer
  $.ajax({
    url: '/report/question',
    type: 'POST',
    dataType: 'json',
    data: {
      "_token": $('#token').val(),
      "id_question": $("#questionIdReported").val(),
      "reason": $("#reason").val()
    }
}).done(function (data) {
    // do whatever u want if the request is ok
  
    $('#reportModal').modal('hide');
    console.log(data);
}).fail(function (data) {
  window.alert(data);
    // do what ever you want if the request is not ok
    console.log(data);
});
});


$("#submitReportBtnAnswer").click(function(){
  //reason
  //reported user
  //reported question or answer
$.ajax({
url: '/report/answer',
type: 'POST',
dataType: 'json',
data: {
  "_token": $('#token').val(),
  "id_answer": $("#answerReportedID").val(),
  "reason": $("#reason").val()
}
}).done(function (data) {
// do whatever u want if the request is ok

$('#reportModalAnswer').modal('hide');
console.log(data);
}).fail(function (data) {
window.alert(data);
// do what ever you want if the request is not ok
console.log(data);
});
});



});
