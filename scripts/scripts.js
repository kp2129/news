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

        // Prepare data to send
        var data = {
            action: "login",
            username: username,
            password: password,
        };

        // Send data to the backend using AJAX
        $.ajax({
            method: "POST",
            dataType: "json",
            url: "libraries/authentication.php",
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

    $(".admin-button").click(function () {
        var buttonId = $(this).attr("id");
        alert(buttonId);
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
