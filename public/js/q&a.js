$(document).ready(function() {
  if (window.location.href.indexOf('topics') != -1) {
    time = 1;
    goToTopic();
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

function actionFollowQuestion(id_question){
  $.ajax({
    url: '/setfollowQuestion',
    type: 'PUT',
    dataType: 'json',
    data: {
      "_token": $('#token').val(),
      "id_question": id_question
    }
    }).done(function (data) {
        console.log(data);
        $id = "followQuestion" + id_question;
        if(document.getElementById($id).value == "followingPage"){
          location.reload();
        }else{
            if(document.getElementById($id).value == "Unfollow"){
            document.getElementById($id).value = "Follow";
            document.getElementById($id).innerHTML = "Follow";
          }else{
            document.getElementById($id).value = "Unfollow";
            document.getElementById($id).innerHTML = "Unfollow";
          }
      }
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


  function actionUpvoteQuestion(id_question,karma){
    
    $.ajax({
      url: '/setUpvoteQuestion',
      type: 'PUT',
      dataType: 'json',
      data: {
        "_token": $('#token').val(),
        "id_question": id_question
      }
      }).done(function (data) {
          console.log(data);
          if(data.status == "failed"){
            window.alert("you have already voted");
          }else{
            $karma = document.getElementById("question_karma"+id_question).innerHTML;
            $karma++;
            $("#question_karma"+id_question).html($karma);
          }
      }).fail(function (data) {
        console.log(data);
      });
  }

function actionDownvoteQuestion(id_question){
  $.ajax({
    url: '/setDownvoteQuestion',
    type: 'PUT',
    dataType: 'json',
    data: {
      "_token": $('#token').val(),
      "id_question": id_question
    }
    }).done(function (data) {
        console.log(data);
        if(data.status == "failed"){
          window.alert("you have already voted");
        }else{
          $karma = document.getElementById("question_karma"+id_question).innerHTML;
          $karma--;
        $("#question_karma"+id_question).html($karma);
        }
    }).fail(function (data) {
      console.log(data);
    });
}

function actionUpvoteAnswer(id_answer){
  $.ajax({
    url: '/setUpvoteAnswer',
    type: 'PUT',
    dataType: 'json',
    data: {
      "_token": $('#token').val(),
      "id_answer": id_answer
    }
    }).done(function (data) {
        console.log(data);
        if(data.status == "failed"){
          window.alert("you have already voted");
        }else{
          $karma = document.getElementById("answer_karma"+id_answer).innerHTML;
          $karma++;
        $("#answer_karma"+id_answer).html($karma);
        }
    }).fail(function (data) {
      console.log(data);
    });
}

function actionDownvoteAnswer(id_answer){
  $.ajax({
    url: '/setDownvoteAnswer',
    type: 'PUT',
    dataType: 'json',
    data: {
      "_token": $('#token').val(),
      "id_answer": id_answer
    }
    }).done(function (data) {
        console.log(data);
        if(data.status == "failed"){
          window.alert("you have already voted");
        }else{
          $karma = document.getElementById("answer_karma"+id_answer).innerHTML;
          $karma--;
        $("#answer_karma"+id_answer).html($karma);
        }
    }).fail(function (data) {
      console.log(data);
    });
}

function actionDismiss(id_notification){
  $.ajax({
    url: '/dismiss',
    type: 'PUT',
    dataType: 'json',
    data: {
      "_token": $('#token').val(),
      "id_notification": id_notification
    }
    }).done(function (data) {
        console.log(data);
        if(data.status == "failed"){
          window.alert("error");
        }else{
          $("#notification"+id_notification).attr('hidden', 'hidden');
        }
    }).fail(function (data) {
      console.log(data);
    });
}

function followQuestion(){

  $.ajax({
    url: '/topic/question/followQuestion',
    type: 'POST',
    dataType: 'json',
    data: {
      "_token": $('#token').val(),
      "id_question": $("#questionId").val()
    }
}).done(function (data) {
    console.log(data);
}).fail(function (data) {
  console.log(data);
});
}

function unfollowQuestion(){
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
}).fail(function (data) {
  console.log(data);
});
}

function actionAnswer(newUrl){
  console.log("newURl " + newUrl);
  window.location.href = newUrl;
  location.reload();
  $('#answerModal').modal('show');
}


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

  $('#profileModal').on('shown.bs.modal', function(e) {
    $id = e.relatedTarget.attributes['data-id'].value;
   $("#submitionEdit").click(function(){
      var usr_name = $('#usernameEdit').val()
      var new_name = $('#usr').val()
      var new_email = $('#emailToChange').val()
      var new_bio = $('#bio').val()

      
      $.ajax({
        url: '/user/'+usr_name+'/edit',
        type: 'PUT',
        dataType: 'json',
        data: {
          "_token": $('#token').val(),
          "name": new_name,
          "email" : new_email,
          "bio" : new_bio,
          "user_id" : $id

        }
  

    }).done(function (data) {
      console.log(data);
      location.reload();
        // do whatever u want if the request is ok
       
    }).fail(function (data) {
      console.log(data);
      window.alert("Fail: " + data.new_name);
    });
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
      console.log("Failed geting bestAnswer " + data.data);
        // do what ever you want if the request is not ok

    });
  });
  

  $('#answerModal').on('shown.bs.modal', function(e) {
    $id = e.relatedTarget.attributes['data-id'].value;
  $("#submitAnswerBtn").click(function(){
    
    $.ajax({
      url: '/answer/addAnswer',
      type: 'POST',
      dataType: 'json',
      data: {
        "_token": $('#token').val(),
        "id_question": $id,
        "message": $("#answerMessage").val()
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
});



$('#editquestionModal').on('shown.bs.modal', function(e) {
  $long = e.relatedTarget.attributes['data-long'].value;
  document.getElementById('edit_short_message').value = $long;
  $short = e.relatedTarget.attributes['data-short'].value;
  document.getElementById('edit_long_message').value = $short;
  $id = e.relatedTarget.attributes['data-id'].value;
  $("#editquestionSubmitBtn").click(function(){
    $.ajax({
      url: '/question/updateQuestion',
      type: 'PUT',
      dataType: 'json',
      data: {
        "_token": $('#token').val(),
        "id_topic": $("#edit_topicSelected").val(),
        "id_question" : $id,
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
});

$('#editanswerModal').on('shown.bs.modal', function(e) {
  $message = e.relatedTarget.attributes['data-message'].value;
  document.getElementById('messageModal').value = $message;
  $id = e.relatedTarget.attributes['data-id'].value;
  $("#submitEditAnswerBtn").click(function(){
    $.ajax({
      url: '/answer/updateAnswer',
      type: 'PUT',
      dataType: 'json',
      data: {
        "_token": $('#token').val(),
        "id_answer": $id,
        "message": $("#messageModal").val()
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
});

$('#questionDelModal').on('shown.bs.modal', function(e) {
  $id = e.relatedTarget.attributes['data-id'].value;
  $("#submitDeleteQuestion").click(function(){

      $.ajax({
        url: '/topic/question/disable',
        type: 'PUT',
        dataType: 'json',
        data: {
          "_token": $('#token').val(),
          "id_question": $id
        }
    }).done(function (data) {
        console.log(data);
        location.reload();
    }).fail(function (data) {
      console.log(data);
    });
  });
});


$('#deleteAnswerModal').on('shown.bs.modal', function(e) {
  $id = e.relatedTarget.attributes['data-id'].value;
  $("#submitDeleteAnswer").click(function(){
      $.ajax({
        url: '/topic/question/answer/disable',
        type: 'PUT',
        dataType: 'json',
        data: {
          "_token": $('#token').val(),
          "id_answer": $id
        }
    }).done(function (data) {
        console.log(data);
        location.reload();
    }).fail(function (data) {
      console.log(data);
    });
  });
});


$("#question-follow-btn").click(function () {
  $html = "<div class=" + "about" + "><p> " + "Unfollow Question" + "</p></div>";
  document.getElementById("question-follow-btn").innerHTML = $html;
  $("#question-follow-btn").attr("id", "question-unfollow-btn");
  followQuestion();

  $("#question-unfollow-btn").unbind("click").click(function () {
    $html = "<div class=" + "about" + "><p> " + "Follow Question" + "</p></div>";
    document.getElementById("question-unfollow-btn").innerHTML = $html;
    $("#question-unfollow-btn").attr("id", "question-follow-btn"); 
    unfollowQuestion();

    $("#question-follow-btn").unbind("click").click(function () {
      $html = "<div class=" + "about" + "><p> " + "Unfollow Question" + "</p></div>";
      document.getElementById("question-follow-btn").innerHTML = $html;
      $("#question-follow-btn").attr("id", "question-unfollow-btn");
      followQuestion();
    
    });
  });

});


$("#question-unfollow-btn").click(function () {
  $html = "<div class=" + "about" + "><p> " + "Follow Question" + "</p></div>";
  document.getElementById("question-unfollow-btn").innerHTML = $html;
  $("#question-unfollow-btn").attr("id", "question-follow-btn");
  unfollowQuestion();

  $("#question-follow-btn").unbind("click").click(function () {
    $html = "<div class=" + "about" + "><p> " + "Unfollow Question" + "</p></div>";
    document.getElementById("question-follow-btn").innerHTML = $html;
    $("#question-follow-btn").attr("id", "question-unfollow-btn");
    followQuestion();

    $("#question-unfollow-btn").unbind("click").click(function () {
      $html = "<div class=" + "about" + "><p> " + "Follow Question" + "</p></div>";
      document.getElementById("question-unfollow-btn").innerHTML = $html;
      $("#question-unfollow-btn").attr("id", "question-follow-btn"); 
      unfollowQuestion();
    });  
  
  });
});







$('#reportModal').on('shown.bs.modal', function(e) {
  $id = e.relatedTarget.attributes['data-id'].value;
    $("#submitReportBtn").click(function(){
    //reason
    //reported user
    //reported question or answer
      window.alert("id " + $id);
      $.ajax({
        url: '/report/question',
        type: 'POST',
        dataType: 'json',
        data: {
          "_token": $('#token').val(),
          "id_question": $id,
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
});

$('#reportModalAnswer').on('shown.bs.modal', function(e) {
  $id = e.relatedTarget.attributes['data-id'].value;

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
  "id_answer": $id,
  "reason": $("#reasonAnswer").val()
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


$("#feedbtn").click(function(){
  //reason
  //reported user
  //reported question or answer
$.ajax({
url: '/feed/questions',
type: 'GET',
dataType: 'json',
data: {
  "_token": $('#token').val()
}
}).done(function (data) {
// do whatever u want if the request is ok

console.log(data);
}).fail(function (data) {
window.alert(data);
// do what ever you want if the request is not ok
console.log(data);
});
});



$("#buttonSearch").click(function(){
  console.log("btn search clicked " + $('#searchText').val());
  window.location.href="/search/" + $('#searchText').val();
});




});
