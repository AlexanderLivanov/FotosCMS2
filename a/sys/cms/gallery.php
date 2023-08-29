<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <title></title>
    <style>
        .container {
            padding: 1em;
            column-count: 4;
        }

        .img-cont {
            position: relative;
            transition: all 0.3s;
        }

        .img-cont .img-button {
            position: absolute;
            transition: all 0.3s;
            display: none;
            filter: none;
        }

        .img-cont:hover .img-button {
            cursor: pointer;
            position: absolute;
            display: flex;
            transition: all 0.3s;
            top: 5%;
            right: 10%;
        }

        .img-cont:hover img {
            filter: blur(10px) grayscale(100%);
            transition: all 0.3s;
            border-radius: 10px;
            box-shadow: 0px 1px 2px 0px grey,
                1px 2px 4px 0px grey,
                2px 4px 8px 0px grey,
                2px 4px 16px 0px grey;
        }

        img {
            transition: all 0.3s;
            width: 100%;
            margin-bottom: 1em;
            border-radius: 10px;
            box-shadow: 0px 1px 2px 0px grey,
                1px 2px 4px 0px grey,
                2px 4px 8px 0px grey,
                2px 4px 16px 0px grey;
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

        #upload-form {
            text-align: center;
        }

        .input-file-row {
            display: inline-block;
            width: 100%;
        }

        .input-file {
            position: relative;
            display: inline-block;
            width: 75%;
        }

        .input-file span {
            position: relative;
            display: inline-block;
            cursor: pointer;
            outline: none;
            text-decoration: none;
            font-size: 14px;
            vertical-align: middle;
            color: rgb(255 255 255);
            text-align: center;
            border-radius: 5px;
            background-color: #0072ff;
            line-height: 22px;
            width: 60%;
            height: 40px;
            padding: 10px 20px;
            box-sizing: border-box;
            margin: 0;
            transition: all 0.3s;
        }

        @media(max-width: 800px) {
            .input-file span {
                position: relative;
                display: inline-block;
                cursor: pointer;
                outline: none;
                text-decoration: none;
                font-size: 14px;
                vertical-align: middle;
                color: rgb(255 255 255);
                text-align: center;
                border-radius: 5px;
                background-color: #0072ff;
                line-height: 22px;
                width: fit-content;
                height: 40px;
                padding: 10px 20px;
                box-sizing: border-box;
                margin: 0;
                transition: all 0.3s;
            }

            .input-file:hover span {
                background-color: #59be6e;
                width: fit-content;
                height: fit-content;
                transition: all 0.3s;
            }

            .input-file:active span {
                background-color: #2E703A;
                width: fit-content;
                height: fit-content;
            }
        }

        .input-file input[type=file] {
            position: absolute;
            z-index: -1;
            opacity: 0;
            display: block;
            width: 0;
            height: 0;
        }

        /* Focus */
        .input-file input[type=file]:focus+span {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
        }

        /* Hover/active */
        .input-file:hover span {
            background-color: #59be6e;
            width: 61%;
            transition: all 0.3s;
        }

        .input-file:active span {
            background-color: #2E703A;
        }

        /* Disabled */
        .input-file input[type=file]:disabled+span {
            background-color: #eee;
        }

        /* Список c превью */
        .input-file-list {
            padding: 10px 0;
        }

        .input-file-list-item {
            display: inline-block;
            margin: 0 15px 15px;
            width: 150px;
            vertical-align: top;
            position: relative;
        }

        .input-file-list-item img {
            width: 150px;
        }

        .input-file-list-name {
            text-align: center;
            display: block;
            font-size: 12px;
            text-overflow: ellipsis;
            overflow: hidden;
        }

        .input-file-list-remove {
            color: #fff;
            text-decoration: none;
            display: inline-block;
            position: absolute;
            padding: 0;
            margin: 0;
            top: 5px;
            right: 5px;
            background: #ff0202;
            width: 16px;
            height: 16px;
            text-align: center;
            line-height: 16px;
            border-radius: 50%;
        }

        #publish-button {
            color: white;
            width: 0.01px;
            height: 0.01px;
            text-align: center;
            vertical-align: middle;
            background-color: #0072ff;
            transition: all 0.3s;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #publish-button:hover {
            color: white;
            width: 155px;
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
    <h3>Добавить фото:</h3>
    <div id="content">
        <form id="upload-form" method="post" enctype="multipart/form-data">
            <div class="input-file-row">
                <label class="input-file">
                    <input type="file" name="file[]" multiple id="js-file" accept="image/*">
                    <span>Выберите файл</span>
                </label>
                <div class="input-file-list"></div>
                <input type="button" value="Опубликовать" id="publish-button" onclick="registerUploadClick()">
            </div>
        </form>

        <hr>
        <h3>Ваша галерея:</h3>
        <div class="container">
            <?php
            $directory = "content/" . $_SESSION['user_name'];
            $images = glob($directory . "/*");

            foreach ($images as $image) {
                echo '<div class="img-cont">
                    <img id="' . $image . '" class="gallery-img" src="' . $image . '" alt="">
                    <div class="img-button">
                        <a onclick="deleteThisPhoto(this.id)" id="' . $image . '" style="box-shadow: 0 0 15px grey; color: grey; background-color: rgba(255, 255, 255, 1); border: white; border-radius: 5px; padding: 2px; text-align: center; verticle-align: middle;">
                        <svg xmlns="http://www.w3.org/2000/svg" style="" class="icon icon-tabler icon-tabler-trash-filled" width="28" height="28" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16z" stroke-width="0" fill="currentColor"></path>
                            <path d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z" stroke-width="0" fill="currentColor"></path>
                            </svg>
                        </a>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>

    <script>
        var dt = new DataTransfer();

        $('.input-file input[type=file]').on('change', function() {
            let $files_list = $(this).closest('.input-file').next();
            $files_list.empty();

            for (var i = 0; i < this.files.length; i++) {
                let file = this.files.item(i);
                dt.items.add(file);

                let reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onloadend = function() {
                    let new_file_input = '<div class="input-file-list-item">' +
                        '<img class="input-file-list-img" src="' + reader.result + '">' +
                        '<span class="input-file-list-name">' + file.name + '</span>' +
                        '</div>';
                    $files_list.append(new_file_input);
                }
            };
            this.files = dt.files;
        });

        function removeFilesItem(target) {
            let name = $(target).prev().text();
            let input = $(target).closest('.input-file-row').find('input[type=file]');
            $(target).closest('.input-file-list-item').remove();
            for (let i = 0; i < dt.items.length; i++) {
                if (name === dt.items[i].getAsFile().name) {
                    dt.items.remove(i);
                }
            }
            input[0].files = dt.files;
        }

        function deleteThisPhoto(photoID) {
            document.getElementById(photoID).style.display = "none";
            jQuery.ajax({
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'html',
                url: 'content/delete.php?photoID=' + photoID,
                success: function(html) {
                    console.log('photo deleted');
                }
            });
        }

        function registerUploadClick() {
            var formData = imgObj.data;
            uploadImagesOnClick(formData);
        }

        var imgObj = {};

        $("#js-file").change(function() {
            if (window.FormData === undefined) {
                alert('В вашем браузере FormData не поддерживается')
            } else {
                getFileNameWithExt(event);
                var formData = new FormData();
                $.each($("#js-file")[0].files, function(key, input) {
                    formData.append('file[]', input);
                    imgObj.data = formData;
                    document.getElementById('publish-button').style.width = "155px";
                    document.getElementById('publish-button').style.height = "40px";
                });
            }
        });

        function getFileNameWithExt(event) {

            if (!event || !event.target || !event.target.files || event.target.files.length === 0) {
                return;
            }

            const name = event.target.files[0].name;
            const lastDot = name.lastIndexOf('.');

            const fileName = name.substring(0, lastDot);
            const ext = name.substring(lastDot + 1);

            if (ext != 'png' && ext != 'jpg' && ext != 'jpeg' && ext != 'gif' && ext != 'svg' && ext != 'mp4') {
                Toaster.error('Ошибка: файл ' + name + ' загрузить нельзя');
                setTimeout(function() {
                    window.location.reload(1);
                }, 1000);
            }
        }

        function uploadImagesOnClick(formData) {
            $.ajax({
                type: "POST",
                url: 'content/upload.php',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                dataType: 'json',
                success: function(data) {
                    data.forEach(function(msg) {
                        Toaster.toast("Файлы успешно загружены");
                    });
                    window.location.reload();
                }
            });
        }
    </script>

</body>

</html>