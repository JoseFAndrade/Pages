<?php 

    include "helpers/Helpers.php";
    echo ' <div class="SellingTable"  style="width:100%;">
            <table style="width: 100%;"> 
        
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
        ';

    if(strcmp($tableIn,"Brewing") == 0){
        echo '<tr> <td class="difficulty center" colspan="3"> <h1> Price Point: Low </h1>  </td></tr>';
        $result = getBrewingPricePointLow();
        $test = "no";
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $coffeeProduct = $row["CoffeeProduct"];
            $description = $row["desc"];
            $imageURl = $row["ImageURl"];
            echo "
            <tr>
                <td class=\"center\"> <a href = \"$coffeeProduct.php\"> <img src=\"$imageURl\";></a></td>
                <td class=\"Top-Left-In-Table\"> 
                <h1>$coffeeProduct</h1> 
                <p>
                   $description
                </p>
                </td>
            </tr>";
        }
        echo '<tr> <td class="difficulty center" colspan="3"> <h1> Price Point: Medium </h1>  </td></tr>';

        $result = getBrewingPricePointMedium();
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $coffeeProduct = $row["CoffeeProduct"];
            $description = $row["desc"];
            $imageURl = $row["ImageURl"];
            echo "
            <tr>
                <td class=\"center\"> <a href = \"$coffeeProduct.php\"> <img src=\"$imageURl\";></a></td>
                <td class=\"Top-Left-In-Table\"> 
                <h1>$coffeeProduct</h1> 
                <p>
                   $description
                </p>
                </td>
            </tr>";
        }
        echo '<tr> <td class="difficulty center" colspan="3"> <h1> Price Point: High </h1>  </td></tr>';

        $result = getBrewingPricePointHigh();
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $coffeeProduct = $row["CoffeeProduct"];
            $description = $row["desc"];
            $imageURl = $row["ImageURl"];
            echo "
            <tr>
                <td class=\"center\"> <a href = \"$coffeeProduct.php\"> <img src=\"$imageURl\";></a></td>
                <td class=\"Top-Left-In-Table\"> 
                <h1>$coffeeProduct</h1> 
                <p>
                   $description
                </p>
                </td>
            </tr>";
            echo '</table>';
            echo ' <p>Information obtained from: <a href="https://www.homegrounds.co/the-complete-guide-to-coffee-brewing-methods/?fbclid=IwAR3TXlyQmz6N6lewbbPOrzMKTBLjjEFxbchDwtKI_Vs-PbAxX6LEiPuOMx4">Here</a> </p>';

        }
    }
    else {
        //this means that it is the Coffee Bags

        $result = getCoffeeBagsLight();
        $test = "no";
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $coffeeProduct = $row["CoffeeProduct"];
            $description = $row["desc"];
            $imageURl = $row["ImageURl"];
            echo "
            <tr>
                <td class=\"center\"> <a href = \"$coffeeProduct.php\"> <img src=\"$imageURl\";></a></td>
                <td class=\"Top-Left-In-Table\"> 
                <h1>$coffeeProduct</h1> 
                <p>
                   $description
                </p>
                </td>
            </tr>";
        }

        
        $result = getCoffeeBagsMedium();
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $coffeeProduct = $row["CoffeeProduct"];
            $description = $row["desc"];
            $imageURl = $row["ImageURl"];
            echo "
            <tr>
                <td class=\"center\"> <a href = \"$coffeeProduct.php\"> <img src=\"$imageURl\";></a></td>
                <td class=\"Top-Left-In-Table\"> 
                <h1>$coffeeProduct</h1> 
                <p>
                   $description
                </p>
                </td>
            </tr>";
        }


        
        $result = getCoffeeBagsDark();
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $coffeeProduct = $row["CoffeeProduct"];
            $description = $row["desc"];
            $imageURl = $row["ImageURl"];
            echo "
            <tr>
                <td class=\"center\"> <a href = \"$coffeeProduct.php\"> <img src=\"$imageURl\";></a></td>
                <td class=\"Top-Left-In-Table\"> 
                <h1>$coffeeProduct</h1> 
                <p>
                   $description
                </p>
                </td>
            </tr>";
        }

        echo '</table>

        <p>Information obtained from: <a href="https://pinebrookroasters.com/blogs/happenings/coffee-roasting-explained">Pine Brook Roasters</a> </p>';
    }
?>