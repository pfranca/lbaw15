


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
        title: "disabled"
      }
    ]
  });
 });

 $.get('/admin/getAllquestions', function(data){
  var dataArray = [];
  for(var i=0; i < data.response.length; i++) {
    dataArray[i] = $.map(data.response[i], function(el) {return el});
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
        title: "disabled"
      }
    ]
  });
 });

  
  
 $.get('/admin/getAllanswer', function(data){
  var dataArray = [];

  for(var i=0; i < data.response.length; i++) {
    dataArray[i] = $.map(data.response[i], function(el) {return el});
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
  }
  console.log(data.response);
  
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
      title: "disabled"
    }
  ]
  });
});



$.get('/admin/getAllusers', function(data){
  var dataArray = [];
  for(var i=0; i < data.response.length; i++) {
    dataArray[i] = $.map(data.response[i], function(el) {return el});
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
        title: "disabled"
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
  }
  $('#reports').DataTable({
    data: dataArray,
    columns: [{
        title: "id"
      },
      {
        title: "person"
      },
      {
        title: "type"
      }
    ]
  });

});

$("#click_on_AddTopic").click(function(){
  var img = "1.jpg";
  console.log("helllo");  
  $.post("/admin/addTopic",
    {
      "_token": $('#token').val(),
        "img": "1.jpg",
        "name": $("#nameTopic").val()
    },
    function(data, status){
        alert("Data: " + data + "\nStatus: " + status);
        console.log(data);
        $("#nameTopic").val('');        
        $('#profileModal').modal('hide');
      }); 
    });

    $("#addModeratorBtn").click(function(){
      $.ajax({
        url: '/admin/addModerator',
        type: 'PUT',
        dataType: 'json',
        data: {
          "_token": $('#token').val(),
            "id": $("#userSelected").val()
        }

    }).done(function (data) {
      window.alert($("#userSelected").val());
        // do whatever u want if the request is ok
        $("#userSelected").val('');        
        $('#moderatorModal').modal('hide');
    }).fail(function (data) {
      window.alert(data);

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
  alert( "Handler for .click() called." );
});

$("#showAdmin").click(adminExpander);

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

