<?php
  require 'connection.php';
  if(isset($_POST["submit"])){
    $name = $_POST["name"];
      if($_FILES["image"]["error"] === 4){
        echo "<script> alert('Image Does Not Exist');</script>";
      } else {
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $tmpName = $_FILES['image']['tmp_name'];

        $validImageExtension = ['mp4'];
        $imageExtension = explode('.',$fileName);
        $imageExtension = strtolower(end($imageExtension));
        if(!in_array($imageExtension, $validImageExtension)) {
            echo "<script> alert('Invalid Image Extension');</script>";
        } else if($fileSize > 1000000000){
            echo "<script> alert('Image Size is Too Large');</script>";
        } else {
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;

            move_uploaded_file($tmpName, 'multimedia/video/'. $newImageName);
            $query = "INSERT INTO multimedia VALUEs('$name','$newImageName','')";
            mysqli_query($conn,$query);
            echo "
               <script> 
                   alert('Successfully Uploaded');
                   document.location.href = 'video.html';
               </script>
            ";
        }
      }
  }
?>