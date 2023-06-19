<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            padding: 1em;
            column-count: 4;
        }

        img {
            width: 100%;
            margin-bottom: 1em;

        }

        @media(max-width: 800px) {
            .container {
                column-count: 3;
            }
        }

        @media(max-width: 600px) {
            .container {
                column-count: 2;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        $directory = "content/prog";
        $images = glob($directory . "/*");

        foreach ($images as $image) {
            echo '<div><img src="' . $image . '" alt=""></div>';
        }
        ?>
    </div>
</body>

</html>