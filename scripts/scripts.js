$(document).ready(function () {



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

  $(".admin-button").click(function () {
    var buttonId = $(this).attr("id");
    alert(buttonId)
    $.ajax({
      url: "libraries/admin.php", // Specify the URL of your backend script
      type: "POST",
      data: { buttonId: buttonId }, // Send the button's id as POST data
      success: function (response) {
        // Handle the response from the server, if needed
        console.log(response);
      },
      error: function (error) {
        // Handle any errors, if they occur
        console.log("Error: " + JSON.stringify(error));
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


  $(".admin-button").click(function () {
    var editForm = document.getElementById("edit-form");
  });
});


$(".login-button").click(function () {
  window.location.href = "login.php";

});
