<?php include 'header.php'; ?>
<?php 
    function readPetsFile() {
        // read the file into memory; if there is an error then stop processing
        $arr = file("data/boys.txt") or die('ERROR: Cannot find file');
        // our data is comma-delimited
        $delimiter = ','; 
        $count=0;
        // loop through each line of the file
        foreach ($arr as $line) {  
           // explode returns an array of strings where each element in the array
           // corresponds to each substring between the delimiters
           if($count!=0){
           $splitcontents = explode($delimiter, $line);       
           $pet = array();
           $pet['id'] = $splitcontents[0];
           $pet['name'] = $splitcontents[1];
           $pet['score'] = $splitcontents[2];
           $pet['file'] = $splitcontents[3];
           // add pet to array of pets
           //when you add an element to an array in php, if you don't
           //give it an index or key, it just adds it to the end
           $pets[$pet['name']] = $pet;
           }
           $count=$count+1;
        }
        return $pets;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['1']))
    {
        $id=$_POST["id1"];
    }
    else
    {
        $id=$_POST["id2"];
    }
    echo $id;
    $file = 'data/boys.txt';
    $pets=readPetsFile();
    $arr = file("data/boys.txt") or die('ERROR: Cannot find file');
    $num = $arr[0];
    file_put_contents($file,$num);
    $contents = file_get_contents($file);
    foreach($pets as $pet)
    {
        if($pet['id']==$id)
        {
            $score=((int)$pet['score'])+1;
            $contents.=$pet['id'].",".$pet['name'].",".$score.",".$pet['file']; 
        }
        else
        {
            $contents.=$pet['id'].",".$pet['name'].",".$pet['score'].",".$pet['file'];
        }
    }
    file_put_contents($file,$contents);
}
?>
<a href="viewAllDogs.php">All Dogs</a>
</main>
</body>
</html>