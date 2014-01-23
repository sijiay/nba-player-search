<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>NBA Player Search</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbotron-narrow.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="js/jquery.js" ></script>
    <script type="text/javascript">
      $('#refresh-btn').click( function() { alert("REFRESH"); } )
      $('td').click( function())
    </script>
  </head>

  <body>

    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="#">Home</a></li>
        </ul>
        <h3 class="text-muted">Assignment 1</h3>
      </div>

      <div class="jumbotron">
        <h1>Search a Player</h1>
        <p><a id="refresh-btn" href="/a1/index.php">Search Again</a></p>
      </div>

      <div class="row marketing">
        <div class="col-lg-6">
          <p>
          
            <?php
              try{
                $username = "info344user";
                $password = "";
                $name = $_GET["player"];
                $conn = new PDO('mysql:host=dbinstance.cwiftzyjqouk.us-west-2.rds.amazonaws.com;dbname=dbinstance', $username, $password);
                $stmt = $conn->prepare('SELECT * FROM  `tbl_name` WHERE  `COL 2` =  :name');
                $stmt->execute(array('name'=> $name));
                $result = $stmt->fetchAll();
              }catch(PDOException $e){
                echo 'ERROR: ' . $e->getMessage();    
              }
            ?>
            
          <?php
            if ( count($result))
            {
              ?>
              <h4><?php echo $name ?></h4>

          <table class="table table-striped">
          <?php
              foreach ($result as $row) {
                echo '<tr><td>GP: </td><td>'.$row['COL 6'].'</td>';
                echo '<tr><td>FGP: </td><td>'.$row['COL 10'].'</td>';
                echo '<tr><td>TTP: </td><td>'.$row['COL 13'].'</td>';
                echo '<tr><td>FTP: </td><td>'.$row['COL 16'].'</td>';
                echo '<tr><td>PPG: </td><td>'.$row['COL 25'].'</td>';
                

              }
            }else
            {
              echo "Player not found.";
          }
            ?>
          </table> 
         
        </div>

        <div class="col-lg-6">
          <p><a href="http://lmgtfy.com/">Can't find a player?</a></p>

        </div>
      </div>

      <div class="footer">
        <p>&copy; Company 2013</p>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
