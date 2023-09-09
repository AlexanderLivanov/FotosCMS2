<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/qz8i2t9v3yqmvp0hyjlv95kybrn89u3py39nj1efjraq0e9p/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <title>Создать запись</title>
    <style>
        #title input {
            width: 40%;
            margin: 1em;
            padding: .5;
            border: none;
            border-bottom: 1px solid grey;
            border-radius: 5px;
            outline: none;
            text-align: center;
        }

        #submit_post_btn {
            margin: 10px;
            color: white;
            width: 40%;
            height: 40px;
            text-align: center;
            vertical-align: middle;
            background-color: #0072ff;
            transition: all 0.3s;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #submit_post_btn:hover {
            color: white;
            width: 41%;
            height: 40px;
            text-align: center;
            vertical-align: middle;
            background-color: #59be6e;
            transition: all 0.3s;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <form method="post" action="content/create_post.php">
        <div id="title">
            <input type="text" name="post_title" id="post_title" placeholder="Название записи..." maxlength="255" required>
        </div>
        <textarea name="post_content" id="tiny">Начните писать здесь...</textarea>
        <input type="submit" id="submit_post_btn" value="Создать запись">
    </form>
    <script>
        tinymce.init({
            selector: '#tiny',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>
</body>

</html>