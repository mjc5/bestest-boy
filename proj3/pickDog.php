<?php include 'header.php';?>
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
       $pets[$pet['id']] = $pet;
       }
       $count=$count+1;
    }
    return $pets;
 }
function getRandomBoy(){
    $arr = file("data/boys.txt") or die('ERROR: Cannot find file');
    $id=rand(1,(int)$arr[0]);
    $pets=readPetsFile();
    return $pets[$id];
 }
?>
<form method="post" enctype="multipart/form-data" action="processScore.php">
<h2>Who's a Good Boy?</h3>
<div id="picker">
<?php
$pet1=getRandomBoy();
$pet2=getRandomBoy();
while($pet1==$pet2)
{
    $pet2=getRandomBoy();
}
echo '<div>';
echo "<p>".$pet1['name']."<br>";
echo '<img style="height:30%    ;width:30%;"'."src='". $pet1['file'] ."'".'>';
echo '<input type="hidden", name ="id1", value="'.$pet1['id'].'">';
echo '<input type="submit", name="1">';
echo '</div>';
echo '<div>';
echo "<p>".$pet2['name']."<br>";
echo '<img style="height:30%;width:30%;"'."src='". $pet2['file'] ."'".'>';
echo '<input type="hidden", name ="id2", value="'.$pet2['id'].'">';
echo '<input type="submit", name="2">';
echo '</div>';
?>
</div>
</form>
</main>
</div>
</body>
</html>