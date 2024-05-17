<?php

include 'helpers\Helpers.php';

// echo "test";
// Create the Database & Run the Initialization
initializeDatabase();

// // SAMPLE GET PRODUCTS - SEE PRODUCT TABLE
// $result = getBrewingAtHomeProducts();//getCoffeBagsProducts();
// $result = getBrewingPricePointHigh();
// //echo "$result";
// echo "test?";
// if($result->rowCount() > 0) {
//     while($row = $result->fetch(PDO::FETCH_ASSOC)) {
//         echo "Id: " . $row["SKU"] . " - Name: " . $row["CoffeeProduct"] ." Img:" .$row["ImageURl"]."<br>";
//     }
// }

?>