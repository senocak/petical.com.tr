<?php
session_start();

// Including the plugin config file, don't delete the following row!
require(__DIR__ . '/pluginconfig.php');

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Image Browser :: Delete</title>
    <script src="dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
</head>
<body>

<?php

if(isset($_SESSION['username'])){

    $imgSrc = $_GET["img"];

    // ckeck if file exists
    if(file_exists($imgSrc)){
        // check if file is available to delete
        if (is_writable($imgSrc)) {
            // check if file is a sytem file
            $imgBasepath = pathinfo($imgSrc);
            $imgBasename = $imgBasepath['basename'];
            if(!in_array($imgBasename, $sy_icons)){
                // check if the selected file is in the upload folder
                $imgDirname = $imgBasepath['dirname'];
                $preExamplePath = "$useruploadpath/test.txt";
                $tmpUserUPath = pathinfo($preExamplePath);
                $useruploadpathDirname = $tmpUserUPath['dirname'];
                if($imgDirname == $useruploadpathDirname){
                    // check if file is an image
                    $a = getimagesize($imgSrc);
                    $image_type = $a[2];
                    if(in_array($image_type , array(IMAGETYPE_GIF , IMAGETYPE_JPEG , IMAGETYPE_PNG , IMAGETYPE_ICO))) {
                        unlink($imgSrc);
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                    } else {
                        echo '
                            <script>
                            swal({
                              title: "Hata Meydana Geldi.",
                              text: "Yalnızca resim silebilirsiniz.  Lütfen tekrar deneyin veya başka resim seçin.",
                              type: "error",
                              closeOnConfirm: false
                            },
                            function(){
                              history.back();
                            });
                            </script>
                        ';
                    }
                } else {
                    echo '
                        <script>
                        swal({
                              title: "Hata Meydana Geldi.",
                          text: "Silmek istediğiniz dosya klasörde seçili değil.",
                          type: "error",
                          closeOnConfirm: false
                        },
                        function(){
                          history.back();
                        });
                        </script>
                    ';
                }
            } else {
                echo '
                    <script>
                    swal({
                              title: "Hata Meydana Geldi.",
                      text: "Sistem dosyasını silemezsiniz.  Lütfen tekrar deneyin veya başka resim seçin.",
                      type: "error",
                      closeOnConfirm: false
                    },
                    function(){
                      history.back();
                    });
                    </script>
                ';
            }
        } else {
            echo '
                <script>
                swal({
					title: "Hata Meydana Geldi.",
                  text: "Seçili dosya silenemez. Lütfen tekrar deneyin veya başka resim seçin. Not: Serverınızda imageuploader a CHMOD yazılabilirlik iznini (0777) olarak ayarlamayı unutmayın.",
                  type: "error",
                  closeOnConfirm: false
                },
                function(){
                  history.back();
                });
                </script>
            ';
        }
    } else {
        echo '
            <script>
            swal({
					title: "Hata Meydana Geldi.",
              text: "Silmek istediğiniz dosya bulunamadı. Lütfen tekrar deneyin veya başka resim seçin.",
              type: "error",
              closeOnConfirm: false
            },
            function(){
              history.back();
            });
            </script>
        ';
    }

}

?>

</body>
</html>
