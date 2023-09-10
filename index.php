<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="img/icon.png" />
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/search.css">
<title>FotosWorld</title>
</head>

<body>
  <?php 
  
  require_once('a/sys/header.php');
  require_once('a/sys/preloader.php');

  require_once('a/sys/cfg.php');

  $query = $connection->prepare("SELECT * FROM posts");
  $query->execute();
  $result = $query->fetch(PDO::FETCH_ASSOC);
  ?>
  <div id="wrapper">
    <div class="content">
      <h2>Последние посты</h2>
      <div class="post">
        <div class="post-img">
          <div class="post-author">
            <h4><?php echo $result['user_name'] . ' | ' . $result['pub_date']; ?></h4>
          </div>
          <!-- <img src="img/icon.png" class="left-photo" /> -->
          <div class="post-info">
            <h3><?php echo $result['title']; ?></h3>
            <p class="post-text">
              <?php echo $result['content']; ?>
            </p>
          </div>
        </div>
      </div>

      
      </div>
    </div>
  </div>

  <?php require_once('a/sys/footer.php') ?>

  <script>
    window.onload = function() {
      document.body.classList.add('loaded_hiding');
      window.setTimeout(function() {
        document.body.classList.add('loaded');
        document.body.classList.remove('loaded_hiding');
      }, 500);
    }
  </script>
</body>

</html>