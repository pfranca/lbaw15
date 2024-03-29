


var dataSet = [
    ["212","Fashion", "Yes" , "<img id=\"removeBtn\" class=\" mouse-pointer img-fluid nav-img-profile \" src=\"../img/no.png\" alt=\"profilePic\" />"],
    ["412","Sports", "Yes" , "<img id=\"removeBtn\" class=\" mouse-pointer img-fluid nav-img-profile \" src=\"../img/no.png\" alt=\"profilePic\" />"],
    ["412","Ok", "Yes" , "<img id=\"removeBtn\" class=\" mouse-pointer img-fluid nav-img-profile \" src=\"../img/no.png\" alt=\"profilePic\" />"]
 ]; 

var dataSet2 = [
  ["Garrett Winters", "Accountant", "8422", "2011/07/25", "$170,750","$170,750", "<img id=\"removeBtn\" class=\" mouse-pointer img-fluid nav-img-profile \" src=\"../img/no.png\" alt=\"profilePic\" />"],
  [" Winters", "Bigode", "8422", "2011/07/25", "$170,750","$170,750", "<img id=\"removeBtn\" class=\" mouse-pointer img-fluid nav-img-profile \" src=\"../img/no.png\" alt=\"profilePic\" />"],
];

var dataSet4 = [
  ["23565", "Diogo Cunha", "<img id=\"removeBtn\" class=\" mouse-pointer img-fluid nav-img-profile \" src=\"../img/no.png\" alt=\"profilePic\" />"],
  ["12467", "Sergio Almeida", "<img id=\"removeBtn\" class=\" mouse-pointer img-fluid nav-img-profile \" src=\"../img/no.png\" alt=\"profilePic\" />"],
];

var dataSet5 = [
  ["23565", "Diogo" , "diogoCunha12" , "213","<img id=\"removeBtn\" class=\" mouse-pointer img-fluid nav-img-profile \" src=\"../img/no.png\" alt=\"profilePic\" />"],
   ["12467", "Sergio " , "sergio_12Almeida" , "22","<img id=\"removeBtn\" class=\" mouse-pointer img-fluid nav-img-profile \" src=\"../img/no.png\" alt=\"profilePic\" />"],
  
   ["34325", "Diogo" , "diogo123" , "15","<img id=\"removeBtn\" class=\" mouse-pointer img-fluid nav-img-profile \" src=\"../img/no.png\" alt=\"profilePic\" />"],
  
   ["77689", "Tiago" , "tiagoAlmeida111" , "213","<img id=\"removeBtn\" class=\" mouse-pointer img-fluid nav-img-profile \" src=\"../img/no.png\" alt=\"profilePic\" />"],
  
   ["34264", "Paula" , "Paulinha123_maria" , "4413","<img id=\"removeBtn\" class=\" mouse-pointer img-fluid nav-img-profile \" src=\"../img/no.png\" alt=\"profilePic\" />"],
  
];


$(document).ready(function() {
//var topic_data = document.getElementsByName('topics-input').value;
  
$.get('/admin/getAlltopics', function(data){
  var dataArray = [];
  for(var i=0; i < data.response.length; i++) {
    dataArray[i] = $.map(data.response[i], function(el) {return el});

    if(dataArray[i][3] == false){
      dataArray[i][3]="<img id=\"removeBtn\" onclick=\"removeTopic('" + dataArray[i][0] + "')\" class=\" mouse-pointer img-fluid nav-img-profile \" src=\"../images/ok.png\"/>"
    }
    else{
      dataArray[i][3]="<img id=\"removeBtn\" onclick=\"removeTopic('" + dataArray[i][0] + "')\" class=\" mouse-pointer img-fluid nav-img-profile \" src=\"../images/no.png\"/>"
    }
  }


  

  $('#theme').DataTable({
    //data: $('#topics-input').value,
    data: dataArray,
    columns: [{
        title: "id"
      },
      {
        title: "name"
      },
      {
        title: "img"
      },
      {
        title: "shown"
      }
    ]
  });
 });

 $.get('/admin/getAllquestions', function(data){

  var dataArray = [];
  for(var i=0; i < data.response.length; i++) {
    dataArray[i] = $.map(data.response[i], function(el) {return el});

    if(dataArray[i][7] == false){
      dataArray[i][7]="<img id=\"removeBtn\" onclick=\"removeQuestion('" + dataArray[i][0] + "')\" class=\" mouse-pointer img-fluid nav-img-profile \" src=\"../images/ok.png\"/>"
    }
    else{
      dataArray[i][7]="<img id=\"removeBtn\" onclick=\"removeQuestion('" + dataArray[i][0] + "')\" class=\" mouse-pointer img-fluid nav-img-profile \" src=\"../images/no.png\"/>"
    }

  }
  $('#question').DataTable({
    data: dataArray,
    columns: [{
        title: "id"
      },
      {
        title: "date"
      },
      {
        title: "karma"
      },
      {
        title: "short_message"
      },
      {
        title: "long_message"
      },
      {
        title: "id_author"
      },
      {
        title: "id_topic"
      },
      {
        title: "shown"
      }
    ]
  });
 });

  
  
 $.get('/admin/getAllanswer', function(data){
  var dataArray = [];
  for(var i=0; i < data.response.length; i++) {
    dataArray[i] = $.map(data.response[i], function(el) {return el});

    if(dataArray[i][6] == false){
      dataArray[i][6]="<img id=\"removeBtn\" onclick=\"removeAnswer('" + dataArray[i][0] + "')\" class=\" mouse-pointer img-fluid nav-img-profile \" src=\"../images/ok.png\"/>"
    }
    else{
      dataArray[i][6]="<img id=\"removeBtn\" onclick=\"removeAnswer('" + dataArray[i][0] + "')\" class=\" mouse-pointer img-fluid nav-img-profile \" src=\"../images/no.png\"/>"
    }

  }
  $('#answer').DataTable({
    data: dataArray,
    columns: [{
        title: "id"
      },
      {
        title: "date"
      },
      {
        title: "karma"
      },
      {
        title: "message"
      },
      {
        title: "id_author"
      },
      {
        title: "id_question"
      },
      {
        title: "disabled"
      }
    ]
  });
});

$.get('/admin/getAllmoderators', function(data){
  var dataArray = [];

  for(var i=0; i < data.response.length; i++) {
    dataArray[i] = $.map(data.response[i], function(el) {return el});
    dataArray[i][6]="<img id=\"removeBtn\" onclick=\"removeModeratorUser('" + dataArray[i][0] + "')\" class=\" mouse-pointer img-fluid nav-img-profile \" src=\"../images/ok.png\" alt=\"\" />"
  }

  
  $('#moderators').DataTable({
    data: dataArray,
    columns: [{
      title: "id"
    },
    {
      title: "username"
    },
    {
      title: "email"
    },
    {
      title: "name"
    },
    {
      title: "img"
    },
    {
      title: "bio"
    },
    {
      title: "activate"
    }
  ]
  });
});



$.get('/admin/getAllusers', function(data){
  var dataArray = [];
  for(var i=0; i < data.response.length; i++) {
    dataArray[i] = $.map(data.response[i], function(el) {return el});
    
   
    if(!dataArray[i][6]){
      dataArray[i][6]="<img id=\"removeBtn\" onclick=\"removeUser('" + dataArray[i][0] + "')\" class=\" mouse-pointer img-fluid nav-img-profile \" src=\"../images/ok.png\"/>"
    }
    else{
      dataArray[i][6]="<img id=\"removeBtn\" onclick=\"removeUser('" + dataArray[i][0] + "')\" class=\" mouse-pointer img-fluid nav-img-profile \" src=\"../images/no.png\"/>"
    }
  }
  $('#users').DataTable({
    data: dataArray,
    columns: [{
        title: "id"
      },
      {
        title: "username"
      },
      {
        title: "email"
      },
      {
        title: "name"
      },
      {
        title: "img"
      },
      {
        title: "bio"
      },
      {
        title: "shown"
      },
      {
        title: "type"
      }
    ]
  });
});


$.get('/admin/getAllreports', function(data){
  var dataArray = [];

  for(var i=0; i < data.response.length; i++) {
    dataArray[i] = $.map(data.response[i], function(el) {return el});
    dataArray[i][4]="<img id=\"removeBtn\" onclick=\"removeReport('" + dataArray[i][0] + "')\" class=\" mouse-pointer img-fluid nav-img-profile \" src=\"../images/no.png\" alt=\"\" />"
    dataArray[i][5]="<img id=\"removeBtn\" onclick=\"removeAnswerQuestion('" + dataArray[i][0] + "')\" class=\" mouse-pointer img-fluid nav-img-profile \" src=\"../images/no.png\" alt=\"\" />"
  }
  $('#reports').DataTable({
    data: dataArray,
    columns: [{
        title: "id"
      },
      {
        title: "reason"
      },
      {
        title: "id_user"
      },
      {
        title: "question/answer"
      },
      {
        title:"delete report"
      },
      {
        title:"remove answer/question"
      }
    ]
  });

});

$("#click_on_AddTopic").click(function(){
  $.post("/admin/addTopic",
    {
      "_token": $('#token').val(),
        "img": "1.jpg",
        "name": $("#nameTopic").val()
    },
    function(data, status){
        alert("Data: " + data + "\nStatus: " + status);
        //verificar se funcionou ou nao
        $("#nameTopic").val('');        
        $('#profileModal').modal('hide');
      }); 
    });

    $("#addModeratorBtn").click(function(){
      var m = $("#userSelected").val();
      var res = m.split("-");
      $.ajax({
        url: '/admin/addModerator',
        type: 'PUT',
        dataType: 'json',
        data: {
          "_token": $('#token').val(),
            "id":  res[1]
        }

    }).done(function (data) {
      //window.alert($("#userSelected").val());
        // do whatever u want if the request is ok
        $("#userSelected").val('');        
        $('#moderatorModal').modal('hide');
    }).fail(function (data) {
      //window.alert(data);

        // do what ever you want if the request is not ok

    });
  });
    
    
  
  if ($(window).width() > 540) {
    //if the window is greater than 440px wide then turn on jScrollPane..
    $("#sidebar").toggleClass("show");
    $("#bdAdmin").toggleClass("col-md-12 col-md-10");

  }

  if ($(window).height() >= 1024 ) {
    //if the window is greater than 440px wide then turn on jScrollPane..
     $("#adminBar").toggleClass("adminBar");

  }

});

$("#removeBtn" ).click(function() {
  window.alert( "Handler for .click() called." );
});

$("#showAdmin").click(adminExpander);


function removeQuestion(idQuestion) {

  $.ajax({
        url: '/admin/disableQuestion',
        type: 'PUT',
        dataType: 'json',
        data: {
          "_token": $('#token').val(),
            "id": idQuestion
        }
      }).done(function (data) {
        console.log(data)
    });
      location.reload();
}


function removeAnswer(idAnswer) {

  $.ajax({
        url: '/admin/disableAnswer',
        type: 'PUT',
        dataType: 'json',
        data: {
          "_token": $('#token').val(),
            "id": idAnswer
        }
      }).done(function (data) {
        console.log(data)
    });
      location.reload();
}



function removeTopic(idTopic) {

  $.ajax({
        url: '/admin/disableTopic',
        type: 'PUT',
        dataType: 'json',
        data: {
          "_token": $('#token').val(),
            "id": idTopic
        }
      });

  location.reload();
}

function removeModeratorUser(idUser){

  $.ajax({
        url: '/admin/removeModerator',
        type: 'PUT',
        dataType: 'json',
        data: {
          "_token": $('#token').val(),
            "id": idUser
        }
      });
  location.reload();
}

function adminExpander()
{
  if ($("#sidebar").hasClass("show")) {
    $("#bdAdmin").toggleClass("col-md-10 col-md-12");
    //$("#bdAdmin").toggleClass("col-md-12");

  } else {
    //$("#bdAdmin").toggleClass("col-md-10");
    $("#bdAdmin").toggleClass("col-md-12 col-md-10");
    
  }
  
}

function removeReport(idReport) {

  $.ajax({
        url: '/admin/removeReport',
        type: 'DELETE',
        dataType: 'json',
        data: {
          "_token": $('#token').val(),
            "id": idReport
        }
  }).done(function (data) {
    location.reload();
  }).fail(function (data) {
    //window.alert(data);
    console.log(data);
      // do what ever you want if the request is not ok

  });
}
function removeAnswerQuestion(idReport) {

  $.ajax({
        url: '/admin/removeAnswerQuestion',
        type: 'DELETE',
        dataType: 'json',
        data: {
          "_token": $('#token').val(),
            "id": idReport
        }
  }).done(function (data) {
    console.log(data);
    location.reload();
  }).fail(function (data) {
    //window.alert(data);
    console.log(data);
      // do what ever you want if the request is not ok

  });
}



function removeUser(idUser) {

  $.ajax({
        url: '/admin/disableUser',
        type: 'PUT',
        dataType: 'json',
        data: {
          "_token": $('#token').val(),
            "id": idUser
        }
  }).done(function (data) {
    location.reload();
  }).fail(function (data) {
    //window.alert(data);
    console.log(data);
      // do what ever you want if the request is not ok

  });
}

