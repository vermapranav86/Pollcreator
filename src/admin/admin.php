<?php

session_start();

if (isset($_SESSION['key'])) {

  include 'connection.php';
  $query = "SELECT COUNT(serial_no) from user_data";
  $result = $db->query($query);
  $row = $result->fetch_array();
  $query1 = "SELECT COUNT(pid) from poll";
  $result1 = $db->query($query1);
  $row1 = $result1->fetch_array();

  $query2 = "SELECT COUNT(pvid) from pvpoll";
  $result2 = $db->query($query2);
  $row2 = $result2->fetch_array();


?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" />


    <script>
      $(document).ready(function() {
        show();
        pollshow();
        pollpvshow();
      });

      function show() {
        $.ajax({
          url: "show.php",
          type: "POST",
          data: {},
          success: function(data) {
            $("#t1").html(data);
          },
        });
      }

      function pollshow() {
        $.ajax({
          url: "pollshow.php",
          type: "POST",
          data: {},
          success: function(data) {
            $("#t2").html(data);
          },
        });
      }

      function pollpvshow() {
        $.ajax({
          url: "pollpvshow.php",
          type: "POST",
          data: {},
          success: function(data) {
            $("#t3").html(data);
          },
        });
      }

      function delete1(sno) {
        var x = sno;

        $.ajax({
          url: "delete.php",
          type: "POST",
          data: {
            sno: x,
          },
          success: function(data) {
            alert("Record Deleted");
            show();
          },
        });
      }

      function getsno(sno) {
        $("#h").val(sno);
        // $("#fname").html(fname);


      }

      function update1() {



        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var email = $("#email").val();
        var y = $("#h").val();


        $.ajax({

          url: "update.php",
          type: "POST",
          data: {
            fname: fname,
            lname: lname,
            email: email,
            sno: y
          },
          success: function(data) {
            show();
          }

        });

      }
    </script>

  </head>

  <body>


    <!-- Navbar -->


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.html" id="ht">Poll Creator</a>
      <!-- <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button> -->

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <!-- <li class="nav-item">
                  <a class="nav-link" href="#">Log Out</a>
                </li> -->
        </ul>
      </div>
    </nav>

    <div class="container-fluid">


      <!-- Modal -->

      <div class="modal fade" id="updatem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Update Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" id="fname" class="form-control">
              </div>
              <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="email" id="lname" class="form-control">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" onclick="update1()" class="btn btn-primary" data-dismiss="modal">Save changes</button>

              <input type="hidden" id="h">
            </div>
          </div>
        </div>
      </div>




      <div class="row">
        <div class="col-3" id="co1">
          <h5 id="h">Dashboard</h5>

          <div class="nav flex-column nav-tabs" id="nav-tabs-tab" role="tablist" aria-orientation="vertical">
            <a href="#v-tabs-home" class="nav-link active" id="v-tabs-home-tab" data-toggle="pill" role="tab">Home</a>

            <a href="#v-tabs-about" class="nav-link" id="v-tabs-about-tab" data-toggle="pill" role="tab">User Details</a>

            <a href="#v-tabs-poll" class="nav-link" id="v-tabs-contact-tab" data-toggle="pill" role="tab">Poll Details</a>

            <a href="logout-admin.php" class="nav-link" role="tab">Logout</a>
          </div>
        </div>
        <div class="col-9" id="co2">
          <div class="tab-content v-tabs-tabContent">
            <div class="tab-pane fade show active" id="v-tabs-home" role="tabpanel">
              <div class="row">
                <div id="cards" class="col">
                  <div class="card" style="width: 18rem">
                    <div class="card-body">
                      <h5 class="card-title">Total Users</h5>
                      <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                      <p class="card-text">
                      <h1><?php echo $row['0']; ?></h1>
                      </p>
                    </div>
                  </div>
                </div>

                <div id="cards" class="col">
                  <div class="card" style="width: 18rem">
                    <div class="card-body">
                      <h5 class="card-title">Public Polls</h5>
                      <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                      <p class="card-text">
                      <h1><?php echo $row1['0']; ?></h1>
                      </p>
                    </div>
                  </div>
                </div>

                <div id="cards" class="col">
                  <div class="card" style="width: 18rem">
                    <div class="card-body">
                      <h5 class="card-title">Private Polls</h5>
                      <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                      <p class="card-text">
                      <h1><?php echo $row2['0']; ?></h1>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="v-tabs-about" role="tabpanel">
              <div class="row">
                <h1>User Data</h1>

                <table id="t1" class="table"></table>
              </div>
            </div>

            <div class="tab-pane fade" id="v-tabs-poll" role="tabpanel">
              <h1>Poll Details</h1>
              <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Public Polls</a>
                  <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Private Polls</a>

                </div>
              </nav>


              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                  <table id="t2" class="table">

                  </table>
                </div>

                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                  <table id="t3" class="table">

                  </table>

                </div>
              </div>


              <!-- <div class="tab-pane fade" id="v-tabs-contact" role="tabpanel">
              Contact tab
            </div> -->
            </div>
          </div>
        </div>
      </div>

  </body>

  </html>

<?php

} else {

?>
  <script>
    window.location.href = "admin-login.html";
  </script>

<?php

}

?>