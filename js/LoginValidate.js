$(document).ready(function() {

  if (window.location.href.indexOf('#loginModal') != -1) {
    $('#loginModal').modal('show');
  }

  $('#form1').validate({
    rules: {
      Name: {
        required: true,
      },
      Email: {

        required: true,
        email: true
      },
      password: {
        required: true,
        minlength: 6
      },
    },

    highlight: function(element) {
      $(element).closest('.form-group').addClass('has-error');

    },
    unhighlight: function(element) {
      $(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function(error, element) {
      if (element.parent('.input-group').length) {
        error.insertAfter(element.parent());
      } else {
        error.insertAfter(element);
      }
    },
    submitHandler: function(form) { // for demo
      window.location.href = 'feed.html';
      return false;
    }

  });

  $('#form2').validate({
    rules: {
      Name2: {
        required: true,
      },
      Email2: {

        required: true,
        email: true
      },
      password2: {
        required: true,
        minlength: 6
      },
      password_again2: {
        equalTo: "#password2"

      }
    },

    highlight: function(element) {
      $(element).closest('.form-group').addClass('has-error');

    },
    unhighlight: function(element) {
      $(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function(error, element) {
      if (element.parent('.input-group').length) {
        error.insertAfter(element.parent());
      } else {
        error.insertAfter(element);
      }
    },
    submitHandler: function(form) { // for demo
      window.location.href = 'feed.html';
      return false;
    }

  })
});