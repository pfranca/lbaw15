var dataSet = [
  ["Garrett Winters", "Accountant", "<img id=\"removeBtn\" class=\" mouse-pointer img-fluid nav-img-profile \" src=\"../img/no.png\" alt=\"profilePic\" />", "8422", "2011/07/25", "$170,750"],
  ["Linia Cox", "Junior Technical Author", "<img id=\"removeBtn\" class=\" mouse-pointer img-fluid nav-img-profile \" src=\"../img/no.png\" alt=\"profilePic\" />", "1562", "2009/01/12", "$86,000"],
  ["Minion", "Junior Author", "<img id=\"removeBtn\" class=\" mouse-pointer img-fluid nav-img-profile \" src=\"../img/no.png\" alt=\"profilePic\" />", "1562", "2009/01/12", "$86,000"],
  ["Ashton Cox", "Junior Technical ", "<img id=\"removeBtn\" class=\" mouse-pointer img-fluid nav-img-profile \" src=\"../img/no.png\" alt=\"profilePic\" />", "1562", "2009/01/12", "$86,000"],
  [" Cox", " Author", "<img id=\"removeBtn\" class=\" mouse-pointer img-fluid nav-img-profile \" src=\"../img/no.png\" alt=\"profilePic\" />", "1562", "2009/01/12", "$86,000"],
];


$(document).ready(function() {

  $('#theme').DataTable({
    data: dataSet,
    columns: [{
        title: "id"
      },
      {
        title: "name"
      },
      {
        title: "Remove"
      }
    ]
  });

  $('#question').DataTable({
    data: dataSet,
    columns: [{
        title: "id"
      },
      {
        title: "userId"
      },
      {
        title: "userName"
      },
      {
        title: "content"
      },
      {
        title: "date"
      }
    ]
  });

  $('#answer').DataTable({
    data: dataSet,
    columns: [{
        title: "id"
      },
      {
        title: "userId"
      },
      {
        title: "userName"
      },
      {
        title: "content"
      },
      {
        title: "date"
      }
    ]
  });

  $('#moderators').DataTable({
    data: dataSet,
    columns: [{
        title: "id"
      },
      {
        title: "userName"
      }
    ]
  });

  $('#users').DataTable({
    data: dataSet,
    columns: [{
        title: "id"
      },
      {
        title: "userName"
      }
    ]
  });

  $('#reports').DataTable({
    data: dataSet,
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