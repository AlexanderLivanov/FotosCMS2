<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
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

        // function getPostContent() {
        //     content = helperEditor.getData();
        //     sendPostContent(content);
        // }

        // function sendPostContent(content) {
        //     $.ajax({

        //         url: "content/generatePost.php",
        //         method: "POST",
        //         data: {
        //             "content": content
        //         },
        //         success: function(data) {
        //             console.log(data);
        //         }
        //     });
        // }
    </script>
</body>

</html>
