<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="img/icon.png" />
  <title>FotosCMS</title>
</head>

<body>
  <?php require_once('a/sys/header.php');
        require_once('a/sys/preloader.php');
  ?>
  <div id="wrapper">
    <div class="content">
      <h2>Последние посты</h2>
      <div class="post">
        <div class="post-img">
          <img src="img/icon.png" class="left-photo" />
          <div class="post-info">
            <h3>Заголовок поста</h3>
            <p class="post-text">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Suscipit harum officia tempora possimus? Officia a consectetur
              accusamus reiciendis tempore aut facilis perspiciatis fugit,
              error corrupti consequatur eum itaque laudantium doloribus.
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Tenetur, accusamus, dolorem quis esse commodi totam qui
              excepturi adipisci architecto ut molestias eveniet quae sit ad!
              Nihil porro eligendi doloribus eum! Lorem ipsum dolor, sit amet
              consectetur adipisicing elit. Porro, aspernatur fuga excepturi,
              nobis unde ratione voluptates rerum sunt at molestias eaque
              temporibus? Totam nulla nobis pariatur eligendi consectetur quos
              debitis?
            </p>
          </div>
        </div>
      </div>

      <div class="post">
        <div class="post-img">
          <img src="img/icon.png" class="left-photo" />
          <div class="post-info">
            <h3>Заголовок поста</h3>
            <p class="post-text">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Suscipit harum officia tempora possimus? Officia a consectetur
              accusamus reiciendis tempore aut facilis perspiciatis fugit,
              error corrupti consequatur eum itaque laudantium doloribus.
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Tenetur, accusamus, dolorem quis esse commodi totam qui lol
              excepturi adipisci architecto ut molestias eveniet quae sit ad!
              Nihil porro eligendi doloribus eum! Lorem ipsum dolor, sit amet
              consectetur adipisicing elit. Porro, aspernatur fuga excepturi,
              nobis unde ratione voluptates rerum sunt at molestias eaque
              temporibus? Totam nulla nobis pariatur eligendi consectetur quos
              debitis?
            </p>
          </div>
        </div>
      </div>

      <div class="post">
        <div class="post-img">
          <img src="img/icon.png" class="left-photo" />
          <div class="post-info">
            <h3>Заголовок поста 2</h3>
            <p class="post-text">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Suscipit harum officia tempora possimus? Officia a consectetur
              accusamus reiciendis tempore aut facilis perspiciatis fugit,
              error corrupti consequatur eum itaque laudantium doloribus.
            </p>
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