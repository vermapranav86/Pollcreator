<?php 


session_start();  

if(isset( $_SESSION['sno'])){



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profile Page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.36/dist/web3.min.js" integrity="sha256-nWBTbvxhJgjslRyuAKJHK+XcZPlCnmIAAMixz6EefVk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="profile_page.css" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>


  <script src="abi.js"></script>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="welcome.php" id="ht">Poll Creator</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item ">
          <a class="nav-link" href="welcome.php">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="createpoll1.php">Create Poll<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown active">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Your Space
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="participate.php">Participated</a>
            <a class="dropdown-item" href="created.php">Created</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="profile_page.php">Profile</a>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link " id="logout" href="#" tabindex="-1" aria-disabled="true">Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <input type="hidden" id="hid" value="<?php echo $_SESSION['ethadd']; ?>" />
  <script>
    var acc = $("#hid").val();
    console.log(acc);
  </script>

  <div class="container">
    <div id="profile_page_container" class="row">
      <div id="img_container" class="col-md-4">
        <div id="img_inner_container">
          <img id="img_id" src="undraw_profile_pic_ic5t.svg" alt="">
          <p id="greeting">Hello! <?php echo $_SESSION['fname']; ?></p>
        </div>

      </div>


      <div id="data_container" class="col-md-8">
        <div id="data_inner_container">
          <p id="head_1">Personal Information</p>
          <hr>
          <p><b>First Name</b> : <?php echo $_SESSION['fname']; ?></p>
          <p><b>Last Name</b> : <?php echo $_SESSION['lname']; ?></p>
          <p><b>Email</b> : <?php echo $_SESSION['email']; ?></p>
          <p><b>Ethereum address</b> : <?php echo $_SESSION['ethadd']; ?></p>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Change Password
          </button>

        </div>

      </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <label>Old Password :</label><br>
              <input type="password" id="old_pass"><br>
              <span id="s2"></span><br>
              <label>New Password :</label><br>
              <input type="password" id="new_pass"><br><br>
              <label>Confirm New Password :</label><br>
              <input type="password" id="confirm_pass"><br><br>
              <span id="s1"></span>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" id="modal_submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- JQuery Part begins -->

  <script>
    $(document).ready(function() {

      $("#logout").on("click", function() {

        window.location.href = 'logout.php';

      });

      $("#modal_submit").on("click", function() {

        var old_pass = $("#old_pass").val();
        var new_pass = $("#new_pass").val();
        var confirm_pass = $("#confirm_pass").val();

        if (new_pass.length >= 8 && new_pass.length <= 15 && new_pass == confirm_pass) {
          $("#s1").html("");
          $("#s2").html("");
          $("#new_pass").css("border-color", "#000000");
          $("#confirm_pass").css("border-color", "#000000");
        }


        if (new_pass != confirm_pass) {
          $("#s1").html("Please make sure your passwords match!");
          $("#new_pass").css("border-color", "#ff0000");
          $("#confirm_pass").css("border-color", "#ff0000");
          $("#s1").css("color", "#ff0000");
        } else if (new_pass == "" || old_pass == "") {
          $("#s1").html("Please enter data in all the fields");
          $("#s1").css("color", "#ff0000");
        } else if (new_pass.length < 8 || new_pass.length > 15) {
          $("#s1").html("Please enter password between 8-15 characters!");
          $("#s1").css("color", "#ff0000");
        } else {

          $.ajax({
            type: "POST",
            url: "confirm_pass.php",
            data: {
              old_pass: old_pass,
              new_pass: new_pass,
              confirm_pass: confirm_pass,
            },

            success: function(data) {

              if (data == "1") {
                $("#s2").html("You have entered wrong password!");
                $("#old_pass").css("border-color", "#ff0000");
                $("#s2").css("color", "#ff0000");
              } else {
                alert(data);
                $("#old_pass").val("");
                $("#new_pass").val("");
                $("#confirm_pass").val("");
              }

            },
          });


        }




      });



    });
  </script>



</body>

</html>

<?php

  }
  else{

    ?>
<script>
window.location.href = 'logout.php';
</script>
<?php


  }

?>