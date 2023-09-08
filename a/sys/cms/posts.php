<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <div id="editor">
        <h3>Напишите свои мысли...</h3>
        <h6>...чтобы потом их прочитали...</h6>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
    <script>
        let content;
        let helperEditor;

        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                helperEditor = editor;
            })
            .catch(error => {
                console.error(error);
            });

        function getPostContent(){
            content = helperEditor.getData();
            document.write('<?php phpGetPostContent("' + content + '"); ?>');
        }
    </script>
</body>

</html>

<?php

    echo('<input type="button" id="submit_post_btn" onclick="getPostContent()" value="Готово">');
    function phpGetPostContent(string $content){
        global $connection;
        $cnt = $content;

        $query = $connection->prepare("INSERT INTO posts (title) VALUES ('hi')");
        $query->execute();
        if($query){
            echo('good');
        }else{
            $connection->errorCode();
        }
    }

?>