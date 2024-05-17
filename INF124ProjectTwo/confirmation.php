<head>
  <?php 
    include ('database/PhpScripts/QueryConstants.php');
    include ('helpers/DBLogin.php');
  
  ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <meta name="author" content="Your name here">
  <meta name="description" content="description of your page">
  <!-- you would link to an external stylesheet here! -->
  <link href="./style.css" type="text/css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Fjalla+One%7CNoto+Sans" rel="stylesheet">
  <title>Brew Growth</title>

</head>

<body>
    <?php

        echo '<div class="OutofPageNavigation">
        <ul>
        <li><a href="index.php">Home page</a></li>
        <li><a href="Coffee_Bags.php">Coffee Bags</a></li>
        <li><a href="Brewing.php">Brewing At Home</a><li>
        </ul>
        </div>';

        $servername = DB_SERVER_NAME;
        $username = DB_USER_NAME;
        $password = DB_PASSWORD;
        $dbname = DB_NAME;

        $error="";
        $line = "<br>";

        try 
        {
            // Make connection to db
            $conn = new PDO("mysql:host={$GLOBALS['servername']};dbname={$GLOBALS['dbname']}", $GLOBALS['username'], $GLOBALS['password']);
    
            // begin the transaction
            $conn->beginTransaction();
            

            //error checking
            foreach($_POST as $key => $value) {
                if(empty($value) && $key != "street2")
                {
                    $error = $error.$key." is empty".$line;
                }
                if($key == "state" || $key == "city")
                {
                    if(!preg_match("/^[A-Za-z]+$/", $value))
                    {
                        $error = $error.$key." must be letters only".$line;
                    }
                }
                if($key == "zip" || $key == "card_num")
                {
                    if(!preg_match("/^[0-9]+$/", $value))
                    {
                        $error = $error.$key." must be numbers only".$line;
                    }
                }
                if($key == "expire")
                {
                    if(!preg_match("/^(1[0-2]|0[4-9])\/2020$/", $value))
                    {
                        if(!preg_match("/^(1[0-2]|0[1-9])\/20[2-9][1-9]$/", $value))
                        {
                            $error = $error." Invalid $key".$line;
                        }
                    }
                }
            }
            $pro = $_POST['product'];
            $quer = $conn->query("SELECT P.StockQuantity FROM Products P WHERE P.SKU = "."'$pro'");
            while($col = $quer->fetch(PDO::FETCH_ASSOC)) {
                if($col['StockQuantity'] < $_POST['qty']) {
                    $error = $error."Insufficient Stock";
                }
            }
            if($error != "") {
                throw new Exception();
            }


            //Insert into Addresses
            $smst = $conn->prepare("INSERT INTO Addresses
                    (AddressLine1, AddressLine2, City, State, Zipcode, CreatedOn, ModifiedOn, IsDeleted)
                    VALUES
                        (
                            :addressline1,
                            :addressline2,
                            :city,
                            :state,
                            :zipCode,
                            NOW(), 
                            NOW(),
                            0
                        )");
            $smst->bindParam(':addressline1', $_POST['street']);
            $smst->bindParam(':addressline2', $_POST['street2']);
            $smst->bindParam(':city', $_POST['city']);
            $smst->bindParam(':state', $_POST['state']);
            $smst->bindParam(':zipCode', $_POST['zip']);
            //$smst->bindParam(':createdOn', NOW());
            //$smst->bindParam(':modOn', NOW());
            //$smst->bindParam(':isDeleted', 0);
            $smst->execute();
    
            
            //Insert into Users
            $addressId = $conn->lastInsertId();
            $smst = $conn->prepare("INSERT INTO Users
                        (Email, FirstName, LastName, PhoneNumber, AddressId, CreatedOn, ModifiedOn, IsDeleted)
                    VALUES
                        (
                            :email,
                            :fname,
                            :lname,
                            :phoneNumber,
                            $addressId,
                            NOW(), 
                            NOW(),
                            0
                        )");
            $smst->execute(array(
                ':email' => $_POST['email'],
                ':fname' => $_POST['firstName'],
                ':lname' => $_POST['lastName'],
                ':phoneNumber' => $_POST['phone'],
            //    ':addressID' => $addressId
            //    ':createdOn' => NOW(),
            //    ':modOn' => NOW(),
            //    ':isDeleted' => 0
            ));
    
    
            //Insert into PaymentInformation
            $userId = $conn->lastInsertId();
            $smst = $conn->prepare("INSERT INTO PaymentInformations
                        (NameOnCard, CardNumber, ExpirationDate, CVC)
                    VALUES
                        (
                            :nameOnCard,
                            :cardNumber,
                            :expirationDate,
                            :cvc
                        )");
            $smst->execute(array(
                ':nameOnCard' => $_POST['card_name'],
                ':cardNumber' => $_POST['card_num'],
                ':expirationDate' => $_POST['expire'],
                ':cvc' => $_POST['CVC']
            ));
    
    
            //Insert into Orders
            $paymentInformationId = $conn->lastInsertId();
            $smst = $conn->prepare("INSERT INTO Orders
                        (UserId, PaymentInformationId, ShippingMethod, CreatedOn, ModifiedOn, IsDeleted)
                    VALUES
                        (
                            :userId,
                            :paymentInformationId,
                            :shippingSpeed,
                            NOW(),
                            NOW(),
                            0
                        )");
            $smst->execute(array(
                ':userId' => $userId,
                ':paymentInformationId' => $paymentInformationId,
                ':shippingSpeed' => $_POST['speed']
                //':createdOn' => NOW(),
               // ':modOn' => NOW(),
                //':isDeleted' => 0
            ));
    
    
            //Insert into OrderProducts
            $orderId = $conn->lastInsertId();
            $smst = $conn->prepare("INSERT INTO OrderProducts
                        (OrderId, ProductId, Quantity)
                    VALUES
                        (
                            :orderId,
                            :productId,
                            :quantity
                        )");
            $smst->execute(array(
                ':orderId' =>  $orderId,
                ':productId' => $_POST['product'],
                ':quantity' => $_POST['qty']
            ));

            $qu = $_POST['qty'];
            $pro = $_POST['product'];
            $quer = "UPDATE Products SET stockquantity = stockquantity - ".$qu." WHERE SKU = "."'$pro'";
            $conn->query($quer);
    
    
            $conn->commit();
    
            // Return the order
            $count=1;
            echo "<h1>Confirmation Page</h1>";
            $smst = $conn->query("SELECT U.FirstName, U.LastName, U.PhoneNumber, A.AddressLine1, A.AddressLine2, A.City, A.State, A.Zipcode, P.CoffeeProduct, P.SKU, D.Quantity, O.ShippingMethod FROM Users U, Addresses A, Orders O, Orderproducts D, Products P WHERE U.id = A.id AND U.id = O.UserId AND O.Id = D.OrderId AND D.ProductId = P.SKU");
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th></th>";
            echo "<th>First Name</th>";
            echo "<th>Last Name</th>";
            echo "<th>Phone Number</th>";
            echo "<th>Address</th>";
            echo "<th>Address 2</th>";
            echo "<th>City</th>";
            echo "<th>State</th>";
            echo "<th>Zip Code</th>";
            echo "<th>Product</th>";
            echo "<th>Product Code</th>";
            echo "<th>Quantity</th>";
            echo "<th>Shipping</th>";
            echo "</tr>";
            while ($row =  $smst->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr><td>";
                echo ($count);
                echo ("</td><td>");
                echo ($row['FirstName']);
                echo ("</td><td>");
                echo ($row['LastName']);
                echo ("</td><td>");
                echo ($row['PhoneNumber']);
                echo ("</td><td>");
                echo ($row['AddressLine1']);
                echo ("</td><td>");
                echo ($row['AddressLine2']);
                echo ("</td><td>");
                echo ($row['City']);
                echo ("</td><td>");
                echo ($row['State']);
                echo ("</td><td>");
                echo ($row['Zipcode']);
                echo ("</td><td>");
                echo ($row['CoffeeProduct']);
                echo ("</td><td>");
                echo ($row['SKU']);
                echo ("</td><td>");
                echo ($row['Quantity']);
                echo ("</td><td>");
                echo ($row['ShippingMethod']);
                echo ("</td></tr>\n");
                $count += 1;
            }
            echo "</table";
            $conn = null;
        }
        catch(PDOException $e)
        {
            $conn->rollBack();
            $conn = null;
            echo "Error: " . $e->getMessage();
        }
        catch(Exception $e)
        {
            echo $error;
        }

    ?>
</body>
