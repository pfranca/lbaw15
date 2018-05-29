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
              document.getElementById($id).style.background='white';
          
          }else{
            document.getElementById($id).value = "Unfollow";
            document.getElementById($id).innerHTML = "Unfollow";
            document.getElementById($id).style.background='#e6f2ff';
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
      $karma = document.getElementById("question_karma"+id_question).innerHTML;
      if( $("#upvote_button"+id_question).css("color") !=  "rgb(0, 153, 204)"){
        if( $("#downvote_button"+id_question).css("color") !=  "rgb(0, 153, 204)"){
          $karma++;
        }else{
          $karma++;
          $karma++;
        }
      
    $.ajax({
      url: '/setUpvoteQuestion',
      type: 'PUT',
      dataType: 'json',
      data: {
        "_token": $('#token').val(),
        "id_question": id_question
      }
      }).done(function (data) {
            $("#downvote_button"+id_question).css({ 'color': "grey" });
            $("#question_karma"+id_question).html($karma);
            $("#upvote_button"+id_question).css({ 'color': "#0099cc" });
      }).fail(function (data) {
      });
    }else{
      $karma--;
      $("#upvote_button"+id_question).css({ 'color': "grey" });
      $("#question_karma"+id_question).html($karma);
      $("#downvote_button"+id_question).css({ 'color': "grey" });
      
    }
  }

function actionDownvoteQuestion(id_question){
  if($("#downvote_button"+id_question).css("color") != "rgb(0, 153, 204)"){
    $karma = document.getElementById("question_karma"+id_question).innerHTML;
    if( $("#upvote_button"+id_question).css("color") !=  "rgb(0, 153, 204)"){
        $karma--;
      }else{
        $karma--;
        $karma--;
      }
    
  $.ajax({
    url: '/setDownvoteQuestion',
    type: 'PUT',
    dataType: 'json',
    data: {
      "_token": $('#token').val(),
      "id_question": id_question
    }
    }).done(function (data) {
        $("#question_karma"+id_question).html($karma);
        $("#upvote_button"+id_question).css({ 'color': "grey" });
        $("#downvote_button"+id_question).css({ 'color': "#0099cc" });
    }).fail(function (data) {
    });
  }else{
    $karma++;
    $("#question_karma"+id_question).html($karma);
    $("#downvote_button"+id_question).css({ 'color': "grey" });
    $("#upvote_button"+id_question).css({ 'color': "grey" });
  }
}

function actionUpvoteAnswer(id_answer){
  $karma = document.getElementById("answer_karma"+id_answer).innerHTML;
  if( $("#upvote_button_answer"+id_answer).css("color") !=  "rgb(0, 153, 204)"){
    if( $("#downvote_button_answer"+id_answer).css("color") !=  "rgb(0, 153, 204)"){
      $karma++;
    }else{
      $karma++;
      $karma++;
    }
  
  $.ajax({
    url: '/setUpvoteAnswer',
    type: 'PUT',
    dataType: 'json',
    data: {
      "_token": $('#token').val(),
      "id_answer": id_answer
    }
    }).done(function (data) {
          $("#answer_karma"+id_answer).html($karma);
          $("#upvote_button_answer"+id_answer).css({ 'color': "#0099cc" });
          $("#downvote_button_answer"+id_answer).css({ 'color': "grey" });
    }).fail(function (data) {
    });
  }else{
    $karma--;
    $("#upvote_button_answer"+id_answer).css({ 'color': "grey" });
    $("#downvote_button_answer"+id_answer).css({ 'color': "grey" });
    $("#answer_karma"+id_answer).html($karma);
  }
}

function actionDownvoteAnswer(id_answer){
  $allgrey = false;
  $karma = document.getElementById("answer_karma"+id_answer).innerHTML;
  if( $("#downvote_button_answer"+id_answer).css("color") !=  "rgb(0, 153, 204)"){
    if( $("#upvote_button_answer"+id_answer).css("color") !=  "rgb(0, 153, 204)"){
        $karma--;
      }else{
        $karma--;
        $karma--;
      }
   
  $.ajax({
    url: '/setDownvoteAnswer',
    type: 'PUT',
    dataType: 'json',
    data: {
      "_token": $('#token').val(),
      "id_answer": id_answer
    }
    }).done(function (data) {
          $("#answer_karma"+id_answer).html($karma);
          $("#upvote_button_answer"+id_answer).css({ 'color': "grey" });
          $("#downvote_button_answer"+id_answer).css({ 'color': "#0099cc" });
    }).fail(function (data) {
    });
   }else{
      $karma++;
      $("#downvote_button_answer"+id_answer).css({ 'color': "grey" });
      $("#upvote_button_answer"+id_answer).css({ 'color': "grey" });
      $("#answer_karma"+id_answer).html($karma);
    }
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

function followQuestion(id_question){
 console.log("id_question " + id_question);
 $html =  "<div class=\"about txt-color\">Unfollow</div>";
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
        document.getElementById(id_question).value = "Unfollow";
        document.getElementById(id_question).innerHTML = $html;
}).fail(function (data) {
  console.log(data);
});
}

function unfollowQuestion(id_question){
  console.log("id_question " + id_question);
  $html =  "<div class=\"about txt-color\">Follow</div>";
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
    document.getElementById(id_question).value = "Follow";
    document.getElementById(id_question).innerHTML = $html;
    console.log(data);
}).fail(function (data) {
  console.log(data);
});
}

$("#followAnswer").click(function(event) { 
  document.getElementById("followAnswer").value="Unfollow"; 
});

function actionFllQuestion(id_question){
  $id = "fllQuestion"+id_question;
  if(document.getElementById($id).value == "Unfollow"){
    unfollowQuestion($id);
  }else{
    followQuestion($id)
  }
}

$("#unfollowAnswer").click(function(event) { 
  document.getElementById("unfollowAnswer").value="Follow"; 
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
/*
  $('#profileModal').on('shown.bs.modal', function(e) {
    $id = e.relatedTarget.attributes['data-id'].value;
   $("#submitionEdit").click(function(){
      var usr_name = $('#usernameEdit').val()
      var new_name = $('#usr').val()
      var new_email = $('#emailToChange').val()
      var new_bio = $('#bio').val()
      var file = $("#profileImg").get(0).files;
      console.log($file);
      
      $.ajax({
        url: '/user/'+usr_name+'/edit',
        type: 'PUT',
        dataType: 'json',
        data: {
          "_token": $('#token').val(),
          "name": new_name,
          "email" : new_email,
          "bio" : new_bio,
          "user_id" : $id,
          "pic" : $file

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
*/
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
       //   location.reload();
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
