<?php

session_start();

if(isset( $_SESSION['sno'])){




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $_SESSION['fname'] . "-Created";  ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  <!-- <link rel="stylesheet" href="welcome.css"> -->
  <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.36/dist/web3.min.js" integrity="sha256-nWBTbvxhJgjslRyuAKJHK+XcZPlCnmIAAMixz6EefVk=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="combine.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
</head>

<body>
  <!-- 
  <script src="web3.min.js"></script> -->

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.html" id="ht">Poll Creator</a>
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
  </nav><br>
  <!-- <h1>Welcome! <?php// echo $_SESSION['fname'];  ?></h1> -->
  <input type="hidden" id="hid" value="<?php echo $_SESSION['ethadd']; ?>" />
  <script>
    var acc = $("#hid").val();
    console.log(acc);
  </script>
  <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Public Polls</a>
      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Private Polls</a>

    </div>
  </nav>


  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
      <div id="vote_div">
        <div class="container">


          <table>


            <?php
            include 'connection.php';
            $data = "SELECT * FROM poll where serial_no =" . $_SESSION['sno'];
            $result = $db->query($data);

            $num = mysqli_num_rows($result);

            if ($num >= 1) {
              while ($row = $result->fetch_array()) {


            ?>




                <?php
                $qry = "SELECT first_name , last_name  FROM user_data WHERE serial_no =" . $row['serial_no'];
                $result1 = $db->query($qry);

                $row1 = $result1->fetch_array();

                ?>

                <tr>
                  <td>

                    <div class="row">
                      <div id="ques_container">
                        <div id="ques_div" class="col-sm-8">
                          <p id="ques"> <?php echo $row['ques']; ?></p>
                          <small id="auth_name"> Created BY <?php echo $row1['first_name'] . " " . $row1['last_name']; ?></small>
                        </div>
                        <div id="vote_btn_div" class="col-sm-4">
                          <div id="temp_row" class="row">
                            <div id="temp" class="col-lg-6"></div>
                            <div class="col-lg-6"> <button id="vote_btn" class="btn btn-success" onclick="voteclick(<?php echo $row['pid'] ?>)">View Details</button></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
            <?php

              }
            } else {
              echo "<h3>You have not created any polls</h3>";
              echo "<a href='createpoll1.php'><input class='btn btn-success' value='Create poll' /></a>";
            }
            ?>

          </table>

        </div>

      </div>
    </div>
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

      <div id="vote_div">
        <div class="container">


          <table>


            <?php
            include 'connection.php';
            $data = "SELECT * FROM pvpoll where serial_no =" . $_SESSION['sno'];
            $result = $db->query($data);

            $num = mysqli_num_rows($result);

            if ($num >= 1) {
              while ($row = $result->fetch_array()) {


            ?>




                <?php
                $qry = "SELECT first_name , last_name  FROM user_data WHERE serial_no =" . $row['serial_no'];
                $result1 = $db->query($qry);

                $row1 = $result1->fetch_array();

                ?>

                <tr>
                  <td>

                    <div class="row">
                      <div id="ques_container">
                        <div id="ques_div" class="col-sm-8">
                          <p id="ques"> <?php echo $row['ques']; ?></p>
                          <small id="auth_name"> Created BY <?php echo $row1['first_name'] . " " . $row1['last_name']; ?></small>
                        </div>
                        <div id="vote_btn_div" class="col-sm-4">
                          <div id="temp_row" class="row">
                            <div id="temp" class="col-lg-6"></div>
                            <div class="col-lg-6"> <button id="vote_btn" class="btn btn-success" onclick="pvvoteclick(<?php echo $row['pvid'] ?>)">View Details</button></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
            <?php

              }
            } else {
              echo "<h3>You have not created any polls</h3>";
              echo "<a href='createpoll1.php'><input class='btn btn-success' value='Create poll' /></a>";
            }
            ?>

          </table>

        </div>

      </div>
    </div>
  </div>









  <script>
    function voteclick(pid) {
      window.location.href = "viewdetails.php?pid=" + pid;
    }

    function pvvoteclick(pid) {
      window.location.href = "viewpvdetails.php?pid=" + pid;
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