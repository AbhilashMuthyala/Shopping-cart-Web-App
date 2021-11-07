<?php
$blogdetails=array();
$blognames=array();
if(isset($_POST['blogname']))
{
$blogname=$_POST['blogname'];
}
else 
{
$blogname='';
}

if(isset($_POST['blogtitle']))
{
$blogtitle=$_POST['blogtitle'];
}
else {
$blogtitle='';
}

if(isset($_POST['blogdesc']))
{
$blogdesc=$_POST['blogdesc'];
}
else {
$blogdesc='';
}

$target_dir = "images/blog/";
$target_file = $target_dir . basename($_POST['blogname']);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
echo $imageFileType;
// Check if image file is a actual image or fake image
if(isset($_POST["blogimage"])) {
    $check = getimagesize($_FILES["blogimage"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["blogimage"]["tmp_name"], $target_dir.$_FILES["blogimage"]["name"])) {
            rename($target_dir.$_FILES["blogimage"]["name"],$target_dir.trim($_POST['blogname']).'.jpeg');
        echo "The file ". basename( $_FILES["blogimage"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
// Code to write the form data into a file
$blogfile = fopen("blog.txt", "a+") or die("Unable to open file!");
$txttowrite = $blogname.';'.$blogtitle.';'.$blogdesc.';'.date('m-d-y').'$';
fwrite($blogfile, $txttowrite);


header('Location: ' . 'admin.html', true);

?>