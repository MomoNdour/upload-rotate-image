<?php
// ROTATION DE L'IMAGE
function rotate_image()
{
        if(isset($_POST['rotate']))
        {
            // File and rotation
            $filename = $_POST['image_rotate'];
            $degrees = 90;

            // Content type
            header('Content-type: image/jpeg');

            // Load
            $source = imagecreatefromjpeg($filename);

            // Rotate
            $rotate = imagerotate($source, $degrees, 0);

            // Output
            imagejpeg($rotate);

            // Free the memory
            imagedestroy($source);
            imagedestroy($rotate);
        }
}

// UPLOAD AN IMAGE 
function upload_image()
{
        if(!empty($_FILES))
        {
            $file_name = $_FILES['file']['name'];
            $file_extension = strrchr($file_name, ".");

            $file_tmp_name = $_FILES['file']['tmp_name'];
            $file_dest = 'images/'.$file_name;

            $extensions_autorisees = array('.jpg', '.jpeg', '.JPG', '.JPEG', '.PNG', '.png', '.gif');
            
            if(in_array($file_extension, $extensions_autorisees))
            {
                if(move_uploaded_file($file_tmp_name, $file_dest))
                {
                    echo "<img src = 'images/".$file_name."'>";
                }
                else
                {
                    echo 'Une erreur est survenue lors de l\'envoi du fichier';
                }
            }
            else
            {
            echo 'Seuls les fichiers jpg, png, gif sont autorisées';
            }
        }
}
upload_image();


// UPLOAD AN IMAGE BY URL
function upload_image_url()
{
        // maximum execution time in seconds     
        // Pour limiter le temps d'execution du script   
        set_time_limit ( 24 * 60 * 60 ) ;
        if(!isset($_POST['submit'])) die() ;
            $destination_folder = 'image/';
            $url = $_POST['url'] ;
            $newfname = $destination_folder . basename ( $url ) ;
            $name = basename($newfname).PHP_EOL;
            $file = fopen ( $url , "rb" ) ;
        if($file ){
            $newf = fopen ( $newfname , "wb" ) ;
        }
        if ( $newf )
        {
            while ( ! feof ( $file ) )
            {
                fwrite ( $newf , fread ( $file , 1024 * 8 ) , 1024 * 8 ) ;
            }
        }

        if($file)
        {
            fclose ( $file ) ;
        }
        if($newf)
        {
            fclose ( $newf ) ;
        }

        rename("image/$name","image/$name/$titre.jpg");
    }
upload_image_url();
?>