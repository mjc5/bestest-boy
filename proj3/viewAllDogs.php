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
<table class="table table-striped mt-5">
    <thead>
    <tr>
        <th>Name</th>
        <th>Score</th>
        <th>Picture</th>
    </tr>
    </thead>
    <tbody>
    <?php  
        $pets = readPetsFile();
        foreach ($pets as $pet) {
            echo '<tr>';
            echo '<td> '. $pet['name'] . '</td>';
            echo '<td>' . $pet['score'] . '</td>';
            echo '<td style="height:400px;width:400px;">'."<img style='height: 100%; width: 100%' src='". $pet['file'] ."'".'></td>'; 
            echo '</tr>';    
        } 
    ?>            
    </tbody>
</table>
</main>
</body>
</html>