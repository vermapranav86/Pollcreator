<?php

session_start();

if (isset($_SESSION['fname'])) {


  $pid = $_GET['pid'];
  //echo $pid;
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="welcome.css">
    <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.36/dist/web3.min.js" integrity="sha256-nWBTbvxhJgjslRyuAKJHK+XcZPlCnmIAAMixz6EefVk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
  </head>

  <body>
    <!-- 
  <script src="web3.min.js"></script> -->

    <script src="abi.js"></script>



    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.html" id="ht">Poll Creator</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="welcome.php">Home<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item ">
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
    </nav><input type="hidden" id="hid" value="<?php echo $_SESSION['ethadd']; ?>" />
    <script>
      var acc = $("#hid").val();
      console.log(acc);
    </script>

    <script>
      window.addEventListener('load', async () => {







        let web3Provider = null;
        if (window.ethereum) {
          web3Provider = window.ethereum;
          try {

            await window.ethereum.enable();

          } catch (error) {

            console.error("User denied account access")
          }
        } else if (window.web3) {
          web3Provider = window.web3.currentProvider;
        } else {
          web3Provider = new Web3.providers.HttpProvider('http://localhost:7545');
        }
        web3 = new Web3(web3Provider);


        //   var pcount = await pollcount()
        //  console.log("poll count is "+pcount);


        var polldetails = await contractMessage(<?php echo $pid; ?>);

        if (polldetails[4]) {
          $("#question").html(polldetails[1]);
          var ops = polldetails[3].map(web3.utils.hexToUtf8)
          console.log(ops);
          for (i = 0; i < ops.length; i++) {
            var tmpHTML = '<div class="form-check"> <input type="radio" class="form-check-input" name="option" value="' + i + '"> <label id="op' + i + '" class="form-check-lable">' + ops[i] + '</label>   </div>'
            $('#frm').append(tmpHTML);
          }
        } else {
          alert("Voting is closed for this Poll..");
          window.location.href = "welcome.php";
        }

        $("input[type='button']").click(async function() {
          const account = await getAccount();
          contract = new web3.eth.Contract(abi, contractAddress);

          let vote = $("input[name='option']:checked").val();

          var pid = <?php echo $pid; ?>;
          if (acc === account) {
            contract.methods.vote(parseInt(pid), vote).send({
              from: account
            }).then(async function(receipt) {
              window.location.href = "insertinparticipate.php?pid=" + pid;

            });
          } else {
            alert("Connect Address linked to this Platform")
          }

        });



      });
    </script>
    <div style="border: 1px solid black;width: 90%;
    margin:  5% 5% 2% 5%; padding:  5% 5% 2% 5%;">
      <div class="container Poll-detail">
        <h3 id="question"></h3>
        <form>
          <div id="frm">
          </div>

          <p> <input id="vote" type="button" class="btn btn-secondary mt-3 mb-3" value="Submit vote"></p>
        </form>

      </div>
    </div>

    <script>
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

} else {

?>
  <script>
    window.location.href = 'logout.php';
  </script>
<?php


}

?>