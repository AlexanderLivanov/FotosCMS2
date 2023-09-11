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
  <style>
    .l_post_id {
      color: #0072ff;
      font-family: sans-serif;
      vertical-align: middle;
      padding: 1em;
      cursor: pointer;
    }

    .l_post_id svg {
      color: #0072ff;
    }

    .l_post_id svg:hover {
      color: #0072ff;
      fill: #0072ff;
      transform: rotate(360deg);
      transition: all .2s;
    }

    .l_post_id svg:active {
      color: #0072ff;
      fill: #0072ff;
      transition: all .2s;
    }
  </style>
</head>

<body>
  <?php

  require_once('a/sys/header.php');
  require_once('a/sys/preloader.php');
  require_once('a/sys/cfg.php');

  $query = $connection->prepare("SELECT * FROM `posts` ORDER BY `pub_date` DESC");
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  ?>
  <div id="wrapper">
    <div class="content">
      <h2>Последние посты</h2>
      <?php

      foreach ($result as $res) {
        if (!empty($_SESSION['user_name'])) {
          $likes = '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 20l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.96 6.053"></path>
                    <path d="M16 19h6"></path>
                    <path d="M19 16v6"></path>
                  </svg>' . $res['likes'];
        } else {
          $likes = 'Войдите, чтобы оценивать записи...';
        }
        echo ('
          <div class="post">
            <div class="post-img">
                <div class="post-author">
                  <h4>' . $res['user_name'] . " | " . $res['pub_date'] . '</h4>
                </div>
                  <!-- <img src="img/icon.png" class="left-photo" /> -->
                <div class="post-info">
                  <h3>' . $res['title'] . '</h3>
                  <p class="post-text">' . $res['content'] . '</p>
                </div>
              </div>
            </div>
        ');
      }

      ?>
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