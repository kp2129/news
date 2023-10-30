$(document).ready(function () {
  $('.login-button').click(function () {
    window.location.href = 'login.php';
  });


  $(".login").submit(function (e) {
    e.preventDefault();

    // Clear previous error messages
    $(".error").text("");

    // Get form data
    var username = $("input[name='username']").val();
    var password = $("input[name='password']").val();

    // Prepare data to send
    var data = {
      action: "login",
      username: username,
      password: password
    };

    // Send data to the backend using AJAX
    $.ajax({
      type: "POST",
      url: "libraries/authentication.php", // Replace with your backend script URL
      data: data,
      success: function (response) {
        console.log(response)
        if (response.error) {
          if (response.errUser) {
            $(".errUser").text(response.errUser);
          }
          if (response.errPass) {
            $(".errPass").text(response.errPass);
          }
          if (response.errVeri) {
            $(".errVeri").text(response.errVeri);
          }
        } else {
        }
      }
    });
  });


  $(".register").submit(function (e) {
    e.preventDefault();

    // Clear previous error messages
    $(".error").text("");

    // Get form data
    var username = $("input[name='username']").val();
    var email = $("input[name='email']").val();
    var password = $("input[name='password']").val();

    // Prepare data to send
    var data = {
      action: "signup",
      username: username,
      email: email,
      password: password
    };

    // Send data to the backend using AJAX
    $.ajax({
      type: "POST",
      url: "libraries/authentication.php", // Replace with your backend script URL
      data: data,
      success: function (response) {
        console.log(response)
        if (response.error) {
          if (response.errUser) {
            $(".errUser").text(response.errUser);
          }
          if (response.errPass) {
            $(".errPass").text(response.errPass);
          }
          if (response.errVeri) {
            $(".errVeri").text(response.errVeri);
          }
        } else {
        }
      }
    });
  });

});