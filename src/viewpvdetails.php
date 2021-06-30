<?php

session_start();

if (isset($_SESSION['fname'])) {


    $pid = $_GET['pid'];
    $sno = $_SESSION['sno'];

    include 'connection.php';
    $query = "Select count(serial_no) from pvparticipate where pvid=" . $pid;
    $query1 = "select first_name ,last_name from user_data 
                    where 
                    serial_no in (Select serial_no from pvparticipate where pvid=" . $pid . ")";

    $result = $db->query($query1);
    // $row1 = $result->fetch_array();
    // echo $row1;

    // $db->close();
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Poll vote </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="welcome.css">
        <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.36/dist/web3.min.js" integrity="sha256-nWBTbvxhJgjslRyuAKJHK+XcZPlCnmIAAMixz6EefVk=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.36/dist/web3.min.js" integrity="sha256-nWBTbvxhJgjslRyuAKJHK+XcZPlCnmIAAMixz6EefVk=" crossorigin="anonymous"></script>
        <script src="./web3.min.js"></script>


        <!-- <script language="javascript" type="text/javascript" src="./abi.js"></script> -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
        <!-- Include fusion theme -->
        <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
    </head>

    <body>
        <script src="abi.js"></script>

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
        <script>
            var p = <?php echo $pid; ?>;
            window.addEventListener('load', async () => {

                let pollId;
                var votes;




                const startstopvoting = async (i) => {
                    const account = await getAccount();
                    contract = new web3.eth.Contract(abi, contractAddress);

                    await contract.methods.pvstartstopVoting(i).send({
                        from: account
                    }).then(function(result) {
                        console.log(result);
                    });

                }







                // connecttometamask();
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



                var message = await pvcontractMessage(<?php echo $pid; ?>);
                console.log(message);
                $("#question").html(message[1]);
                var ops = message[4].map(web3.utils.hexToUtf8);
                var votes = message[2];

                var chartData = [];

                for (i = 0; i < ops.length; i++) {
                    chartData.push({
                        "label": ops[i],
                        "value": votes[i]
                    })
                }

                //STEP 3 - Chart Configurations
                const chartConfig = {
                    type: 'column2d',
                    renderAt: 'chart-container',
                    width: '100%',
                    height: '300',
                    dataFormat: 'json',
                    dataSource: {
                        // Chart Configuration
                        "chart": {
                            "caption": message[1],
                            "subCaption": "",
                            "xAxisName": "Options",
                            "yAxisName": "(Number of votes)",
                            "numberSuffix": "",
                            "theme": "fusion",
                        },
                        // Chart Data
                        "data": chartData
                    }
                };
                FusionCharts.ready(function() {
                    var fusioncharts = new FusionCharts(chartConfig);
                    fusioncharts.render();
                });

                function changeStatus() {
                    pid = <?php echo $pid; ?>;
                    console.log(pid);
                    // await startstopvoting();
                }

                // $("#changeStatus").click(async function() {
                //     console.log("chksdhv");

                // });

                console.log(message[5]);
                if (message[5]) {
                    document.getElementById("change").innerHTML = "<h3> Voting is open  </h3><button id='changeStatus'   class='btn btn-danger' onclick='myfun()'>Stop voting</button>";
                    console.log("fhgj");
                } else {

                    document.getElementById("change").innerHTML = "<h3>currently the voting is closed </h3><button id='changeStatus' class='btn btn-success' onclick='myfun()' >Start voting</button>";
                }

            });

            async function myfun() {

                const account = await getAccount();
                var contract = new web3.eth.Contract(abi, contractAddress);


                var pid = <?php echo $pid;
                            ?>;
                if (acc === account) {
                    contract.methods.pvstartstopVoting(pid).send({
                        from: account
                    }).then(function(result) {

                        window.location.href = "viewpvdetails.php?pid=" + p;

                    });
                } else {
                    alert("Connect Address linked to this Platform")
                }
            }
        </script>
        <div>
            <div id="chart-container"></div>
        </div>
        <div>
            <h3>Lists Of participants</h3>
            <ol>
                <?php
                while ($row1 = $result->fetch_array()) {
                    echo "<li>" . $row1['first_name'] . " " . $row1['last_name'] . "</li>";
                }
                ?>
            </ol>
            <?php
            $db->close();
            ?>
        </div>
        <div id="change">

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