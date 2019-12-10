<?php include 'header.php' ?>
<?php
//read pets file
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
?>
<div class="container text-center mt-5">
    <div class="row">
<?php
        $pets = readPetsFile();
        foreach ($pets as $pet) {
echo '<div class="col-sm-3">';
echo '<div class="card cabinet mb-3">';
echo '<img src="'. $pet['file'] .'" style="height: 253px;width: 253px;">';
echo '<h5 class="card-title">' . $pet['name'] . '</h5>';   
echo '<p class="card-text">' . $pet['score'] . '</p>';
echo '</div>';        
echo '</div>';
        }
?>
</div>
</div>
</main>
</body>

</html>