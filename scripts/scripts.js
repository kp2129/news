$(document).ready(function () {

    $.get("libraries/session_status.php", function (data) {
        if (data === "active") {
            // Change the button's class name if the session is active
            button = document.getElementById("log-button");
            button.className = "logoff-button";
            button.innerText = "New Button Text";
        } else {
            // Change the button's class name if the session is inactive
            button = document.getElementById("log-button");
            button.className = "log-button";
            button.innerText = "New Button Text";
        }
    });

    $(".login").submit(function (e) {
        e.preventDefault();

        // Get form data
        var username = $("input[name='username']").val();
        var password = $("input[name='password']").val();

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
          password: password,
      };

      // Send data to the backend using AJAX
      $.ajax({
          method: "POST", // Use the appropriate HTTP method
          dataType: "json", // Expect JSON response
          url: "libraries/authentication.php", // Replace with your backend script URL
          data: data,
          success: function (response) {
              console.log(response);
              if (response.error) {
                  $(".err").text(response.error).css("color", "red");
              } else if (response.success) {
                  window.location.href = "index.php";
              }
          },
      });

  });

  var selectedArticleId = null;
  var titleInput = $('input[name="title"]');
  var imageInput = $('input[name="image_url"]');
  var authorInput = $('input[name="author"]');
  var contentTextarea = $('textarea[name="content"]');

$(".admin-button").click(function () {
    var buttonId = $(this).attr("id");
    console.log(buttonId);

    $.ajax({
        url: "libraries/admin.php",
        type: "POST",
        data: { buttonId: buttonId },
        dataType: "json",
        success: function (response) {
            // Handle the response from the server
            console.log(response);

            titleInput.val(response.title);
            imageInput.val(response.image_url);
            authorInput.val(response.author);
            contentTextarea.val(response.content);

            // Store the selected article's ID
            
            selectedArticleId = response.article_id;
            if (!$("#delete-article-button").length) {
                // Create the "Dzēst" button
                var deleteButton = $("<button>").addClass("edit-button button-style").text("Dzēst").attr("id", "delete-article-button");
                var newPostButton = $("<button>").addClass("edit-button button-style save-post").text("Saglabāt").attr("id", "edit-article-button");
                var cancelPostButton = $("<button>").addClass("edit-button button-style cancel-post").text("Atcelt").attr("id", "cancel-article-button");

                $(".edit-bottom-container").append(deleteButton, newPostButton, cancelPostButton);
                $(".edit-bottom-container .edit-button:first").hide();
            }
        },
        error: function (error) {
            // Handle any errors, if they occur
            console.log("Error: " + JSON.stringify(error));
        }
    });
});

// Event listener for the "Saglabāt" (Save) button
$(document).on("click", ".save-post", function () {
    if (selectedArticleId !== null) {
        var formData = {
            id: selectedArticleId,
            title: $('input[name="title"]').val(),
            image_url: $('input[name="image_url"]').val(),
            author: $('input[name="author"]').val(),
            content: $('textarea[name="content"]').val()
        };
        console.log(formData);
    }
});

// Event listener for the "Dzēst" (Delete) button
$(document).on("click", "#delete-article-button", function () {
    if (selectedArticleId !== null) {
      var data = {
        id: selectedArticleId,
        action: "delete"
    };
    
        $.ajax({

            method: "POST",
            dataType: "json",
            url: "libraries/authentication.php",
            data: data,

            type: "POST",

            url: "libraries/libary.php",
            data: selectedArticleId,


            success: function (response) {
                console.log(response);
                // $(".edit-bottom-container .edit-button").show();
                // $("#delete-article-button").remove();
                // $("#edit-article-button").remove();
                // $("#cancel-article-button").remove();
                
                // titleInput.val("");
                // imageInput.val("");
                // authorInput.val("");
                // contentTextarea.val("");
            },
            error: function (error) {
              // Handle any errors, if they occur
              console.log("Error: " + JSON.stringify(error));
            },
        });
    }
});

$(document).on("click", ".cancel-post", function () {
    if (selectedArticleId !== null) {
        $(".edit-bottom-container .edit-button").show();
        $("#delete-article-button").remove();
        $("#edit-article-button").remove();
        $("#cancel-article-button").remove();
        
        titleInput.val("");
        imageInput.val("");
        authorInput.val("");
        contentTextarea.val("");
    }
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
        console.log(response);
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
        }
      }
    });
  });



  $(".admin-button").click(function () {
    var buttonId = $(this).attr("id");
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
      },
    });
  });


  $(".register").submit(function (e) {
    e.preventDefault();


        // Get form data
        var username = $("input[name='username']").val();
        var email = $("input[name='email']").val();
        var password = $("input[name='password']").val();


    // Prepare data to send
    var data = {
      action: "signup",
      username: username,
      email: email,
      password: password,
    };


        // Send data to the backend using AJAX
        $.ajax({
            method: "POST",
            dataType: "json",
            url: "libraries/authentication.php",
            data: data,
            success: function (response) {
                console.log("success");
                if (response["error"]) {
                    $(".err").text(response["error"]).css("color", "red");
                } else if (response.success) {
                    window.location.href = "login.php";
                }
            },
            error: function (response) {
                console.log("error");
                console.log(responsea);
                if (response["error"]) {
                    $(".err").text(response["error"]).css("color", "red");
                } else if (response.success) {
                    window.location.href = "login.php";
                }
            },
        });
    });
  });


  $(".admin-button").click(function () {
    var editForm = document.getElementById("edit-form");
  });

    $(".logoff-button").click(function (e) {
        e.preventDefault();

        // Prepare data to send
        var data = {
            action: "logoff",
        };

        // Send data to the backend using AJAX
        $.ajax({
            method: "POST",
            dataType: "json",
            url: "libraries/authentication.php",
            data: data,
            success: function (response) {
                console.log("success");
                console.log(response);
                location.reload(true);
            },
            error: function (response) {
                console.log("error");
                console.log(response);
            },
        });
    });

});

$(".login-button").click(function () {
  window.location.href = "login.php";
});

function comment(post, user, date){
  let contest = $('#contest').val();
  let form = $('#comment-entry-container');

  $.ajax({
      url: "../libraries/comment.php",
      type: "POST",
      dataType: "json",
      data: {constest: contest, post: post},
      success: function(result){
          console.log(result);
          if(result.msg == ''){
            $('#errContest').text(result.errContest);
            $('#msg').text('');
          }else{
            $('#errContest').text('');
            $('#msg').text(result.msg);
            form.append(`
            <div class="comment-head">
              <p class="comment-author">`+user+`</p>
              <p class="comment-date">`+date+`</p>
            </div>
              <p class="comment-content">`+contest+`</p>
          `);
          }
      },
      error: function(error){
          console.log(error.responseText);
      }
  });
}