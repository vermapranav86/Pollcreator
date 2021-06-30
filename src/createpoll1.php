<?php

session_start();

if(isset( $_SESSION['sno'])){



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Poll</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="welcome.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.36/dist/web3.min.js" integrity="sha256-nWBTbvxhJgjslRyuAKJHK+XcZPlCnmIAAMixz6EefVk=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
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
        <li class="nav-item">
          <a class="nav-link" href="welcome.php">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="createpoll1.php">Create Poll<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
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

  <!-- style=" margin-top: 5%;  width: 100%; border:  black;" -->
  <div style=" text-align: center; border: 1px solid black;width: 90%;
    margin:  5% 5% 2% 5%; padding:  5% 5% 2% 5%;">
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Public Poll</a>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Private Poll</a>

      </div>
    </nav>
    <h2>Create Poll</h2>


    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

        <div class="form-group ">

          <label><b>Question:</b></label>
          <input type="text" name="Question" id="Question" placeholder="Question" /><br>

          <label><b> Option1 : </b></label>
          <input type="text" name="option1" id="op1" placeholder="option1" /><br>

          <label><b> Option2 : </b></label>
          <input type="text" name="option2" id="op2" placeholder="option2" /><br>
          <span id="option3"></span>
          <span id="option4"></span>
          <button id="ao" class="btn btn-primary">Add more options</button><br />




        </div>
        <button id="button2" class="btn btn-secondary  mt-3 mb-3">create poll</button>


      </div>
      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">


        <div class="form-group ">


          <label><b>Question:</b></label>
          <input type="text" name="Question" id="pvQuestion" placeholder="Question" /><br>

          <label><b> Voter List : </b></label>
          <input type="textarea" name="voterlist" id="voterlist" placeholder="Voterlist" /><br>

          <label><b> Option1 : </b></label>
          <input type="text" name="option1" id="pvop1" placeholder="option1" /><br>

          <label><b> Option2 : </b></label>
          <input type="text" name="option2" id="pvop2" placeholder="option2" /><br>
          <span id="pvoption3"></span>
          <span id="pvoption4"></span>
          <button id="pvao" class="btn btn-primary">Add more options</button><br />


        </div>
        <button id="button3" class="btn btn-secondary  mt-3 mb-3">create poll</button>
      </div>

    </div>

  </div>
  <script>
    var i = 3;
    var pvi = 3;
    var op_count = 2;
    var pvop_count = 2;
    $("#ao").on("click", function() {

      if (i == 3) {
        $("#option3").html('<label><b> Option3 : </b></label>          <input type="text" name="option3" id="op3" placeholder="option3" /><br>');
        op_count += 1;
      } else if (i == 4) {
        $("#option4").html('<label><b> Option4 : </b></label>          <input type="text" name="option3" id="op4" placeholder="option3" /><br>');
        op_count += 1;
      } else {
        alert("no more option left");
      }

      i += 1;
    });
    $("#pvao").on("click", function() {

      if (pvi == 3) {
        $("#pvoption3").html('<label><b> Option3 : </b></label>          <input type="text" name="option3" id="pvop3" placeholder="option3" /><br>');
        pvop_count += 1;
      } else if (pvi == 4) {
        $("#pvoption4").html('<label><b> Option4 : </b></label>          <input type="text" name="option3" id="pvop4" placeholder="option4" /><br>');
        pvop_count += 1;
      } else {
        alert("no more option left");
      }

      pvi += 1;
    });

    function voteclick(pid) {
      window.location.href = "sample.php?pid=" + pid;
    }
    $("#logout").on("click", function() {

      window.location.href = 'logout.php';


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