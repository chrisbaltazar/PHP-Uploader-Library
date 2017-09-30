<?php 
    require_once('uploader.php');

    if(!empty($_FILES)){
        $uploader = new Uploader($_FILES, "uploaded/", Uploader::HASH_NAME);
        $uploader->setAllowed(array("pdf", "txt", "jpg"));
        if($uploader->Upload()){
            $results = $uploader->getUploaded(0);
        }
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Uploader Demo</title>
        <link type ="text/css" rel ="stylesheet" href="assets/bootstrap.css">
    </head>
    <body>
        <div class="jumbotron">
            <h2>PHP Uploader Class Demo</h2>
        </div>
        
        <?if($results){?>
        <div class="alert alert-danger alert-dismissable">
            <h3>Upload results</h3>
            <h5>File name: <?=$results->FILE?></h5>
            <h5>File path: <?=$results->PATH?></h5>
            <h5>File type: <?=$results->EXT?></h5>
        </div>
        <?}?>
        
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Please select your file to upload</label>
                <br>
                <input type="file" name="myfile">
                <br>
                <input type="submit" class="btn btn-primary" value="Upload file">
            </div>
        </form>
    </body>
</html>
