<?php include 'header.php'; ?>
<?php 
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["pet_name"];
    //move image from tmp directory to images
    //need to create this directory
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    $score=0;
    //create boys.txt if it doesn't exist
    $file = 'data/boys.txt';
    if(!is_file($file)) {
        file_put_contents($file, "1\n");
        $id=1;
    }
    else
    {
      $arr = file("data/boys.txt") or die('ERROR: Cannot find file');
      $id = ((int)$arr[0])+1;
      file_put_contents($file,"$id\n");
      $contents = file_get_contents($file);
      $count=0;
      foreach($arr as $line)
      {
        if($count!=0)
        {
          $contents .= $line;
        }
        $count=$count+1; 
      }
      file_put_contents($file,$contents);
    }
/*We get the current file contents and append the new pet data */
// Open the file to get existing content
$current = file_get_contents($file);

// Append a new pet to the file
$current .= "$id,$name,$score,$target_file\n";

// Write the contents back to the file
file_put_contents($file, $current);
/* end PHP and begin html */
?>
    <main id="main"> 
    <table>
      <caption>Dog Info</caption>
      <tr>
        <td>Name</td>    
        <td><?php echo $name; ?></td> 
      </tr>
      <tr>
        <td>Image</td>    
        <td style="height:500px;width:300px;"><?php echo "<img style='height: 100%; width: 100%; object-fit: contain' src='$target_file'>";?></td> 
      </tr>
    </table>
    <p><a href="viewAllDogs.php">All Dogs</a>
    
    <?php 
    /*this closes if request_method == POST */
    } 
    else {
        echo 'Sorry nothing to upload';
    }
  ?>
</main>       
</body>
</html>