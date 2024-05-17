<?php 


$zip = $_GET["zip"];

$found = false;
if (($handle = fopen("zip_codes.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 29469, ",")) !== FALSE) {
        if($zip == $data[0]){
            $found = true;
            print "$data[1],$data[2]";
        }
    }
    fclose($handle);
    
    if($found == false)
        print "DataNotFound";
}
?>