<!-- Written by Kevin Ngo
kkngo3@uci.edu -->

<?php

include 'database/PhpScripts/QueryConstants.php';
include 'helpers/DBLogin.php';

$servername = DB_SERVER_NAME;
$username = DB_USER_NAME;
$password = DB_PASSWORD;
$dbname = DB_NAME;

function initializeDatabase() {
    try 
    {
        // Allow access to global variable
        $conn = new PDO("mysql:host={$GLOBALS['servername']}", $GLOBALS['username'], $GLOBALS['password']);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create the database
        $sql = CREATE_DATABASE_QUERY;
        $conn->exec($sql);
        //echo "Database created successfully<br>";

        // Initialize the database
        $conn = new PDO("mysql:host={$GLOBALS['servername']};dbname={$GLOBALS['dbname']}", $GLOBALS['username'], $GLOBALS['password']);
        $sql = INITIALIZE_DATABASE_QUERY;
        $conn->exec($sql);
        echo "Database initialized successfully<br>";
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
        $conn = null;
    }

    $conn = null;
}

function submitOrder(
    $fname,
    $lname,
    $email,
    $addressline1,
    $addressline2,
    $phoneNumber,
    $zipCode,
    $city,
    $state,
    $quantity,
    $shippingSpeed,
    $nameOnCard,
    $cardNumber,
    $expirationDate,
    $cvc,
    $productId) 
{    
    try 
    {
        // Make connection to db
        $conn = new PDO("mysql:host={$GLOBALS['servername']};dbname={$GLOBALS['dbname']}", $GLOBALS['username'], $GLOBALS['password']);

        // begin the transaction
        $conn->beginTransaction();
        
        $sql = "INSERT INTO Addresses
                (AddressLine1, AddressLine2, City, State, Zipcode, CreatedOn, ModifiedOn, IsDeleted)
                VALUES
                    (
                        {$addressline1},
                        {$addressline2},
                        {$city},
                        {$state},
                        {$zipCode},
                        NOW(), 
                        NOW(),
                        0
                    );";
        $conn->exec($sql);
        $addressId = $conn->lastInsertId();

        $sql = "INSERT INTO Users
                    (Email, FirstName, LastName, PhoneNumber, AddressId, CreatedOn, ModifiedOn, IsDeleted)
                VALUES
                    (
                        {$email},
                        {$fname},
                        {$lname},
                        {$phoneNumber},
                        {$addressId},
                        NOW(),
                        NOW(),
                        0
                    );";
        $conn->exec($sql);
        $userId = $conn->lastInsertId();

        $sql = "INSERT INTO PaymentInformations
                    (NameOnCard, CardNumber, ExpirationDate, CVC)
                VALUES
                    (
                        {$nameOnCard},
                        {$cardNumber},
                        {$expirationDate},
                        {$cvc}
                    );";
        $conn->exec($sql);
        $paymentInformationId = $conn->lastInsertId();
        
        $sql = "INSERT INTO Orders
                    (UserId, PaymentInformationId, ShippingMethod, CreatedOn, ModifiedOn, IsDeleted)
                VALUES
                    (
                        {$userId},
                        {$paymentInformationId},
                        {$shippingSpeed},
                        NOW(),
                        NOW(),
                        0
                    );";
        $conn->exec($sql);
        $orderId = $conn->lastInsertId();

        $sql = "INSERT INTO OrderProducts
                    (OrderId, ProductId, Quantity)
                VALUES
                    (
                        {$orderId},
                        {$productId},
                        {$quantity}
                    );";
        
        $conn->commit();

        // Return the order
        $sql = "SELECT * FROM Orders WHERE Id = {$orderId}";
        $order = $conn->query($sql);
        $conn = null;
        return $order;
    }
    catch(PDOException $e)
    {
        $conn->rollBack();
        $conn = null;
        echo "Error: " . $e->getMessage();
    }
}

function getOrderConfirmationDetailsById($orderId) 
{
    try 
    {
        $conn = new PDO("mysql:host={$GLOBALS['servername']};dbname={$GLOBALS['dbname']}", $GLOBALS['username'], $GLOBALS['password']);
        $sql = "SELECT * FROM Orders WHERE Id = {$orderId}";
        $order = $conn->query($sql);
        $conn = null;
        return $order;

    } 
    catch(PDOException $e)
    {
        $conn = null;
        echo "Error: " . $e->getMessage();
    }
}

function getCoffeBagsProducts() 
{
    try 
    {
        $conn = new PDO("mysql:host={$GLOBALS['servername']};dbname={$GLOBALS['dbname']}", $GLOBALS['username'], $GLOBALS['password']);
        $sql = GET_COFFEE_BAG_PRODUCTS_QUERY;
        $result = $conn->query($sql);
        $conn = null;
        return $result;

    } 
    catch(PDOException $e)
    {
        $conn = null;
        echo "Error: " . $e->getMessage();
    }
}

function getBrewingAtHomeProducts() 
{
    try 
    {
        $conn = new PDO("mysql:host={$GLOBALS['servername']};dbname={$GLOBALS['dbname']}", $GLOBALS['username'], $GLOBALS['password']);
        $sql = GET_BREWING_AT_HOME_PRODUCTS_QUERY;
        $result = $conn->query($sql);
        $conn = null;
        return $result;

    } 
    catch(PDOException $e)
    {
        $conn = null;
        echo "Error: " . $e->getMessage();
    }
}

function getBrewingPricePointLow(){
    try 
    {
        $conn = new PDO("mysql:host={$GLOBALS['servername']};dbname={$GLOBALS['dbname']}", $GLOBALS['username'], $GLOBALS['password']);
        $sql = GET_BREWING_PRICE_LOW;
        $result = $conn->query($sql);
        $conn = null;
        return $result;

    } 
    catch(PDOException $e)
    {
        $conn = null;
        echo "Error: " . $e->getMessage();
    }
}

function getBrewingPricePointMedium(){
    try 
    {
        $conn = new PDO("mysql:host={$GLOBALS['servername']};dbname={$GLOBALS['dbname']}", $GLOBALS['username'], $GLOBALS['password']);
        $sql = GET_BREWING_PRICE_MEDIUM;
        $result = $conn->query($sql);
        $conn = null;
        return $result;

    } 
    catch(PDOException $e)
    {
        $conn = null;
        echo "Error: " . $e->getMessage();
    }
}

function getBrewingPricePointHigh(){
    try 
    {
        $conn = new PDO("mysql:host={$GLOBALS['servername']};dbname={$GLOBALS['dbname']}", $GLOBALS['username'], $GLOBALS['password']);
        $sql = GET_BREWING_PRICE_HIGH;
        $result = $conn->query($sql);
        $conn = null;
        return $result;

    } 
    catch(PDOException $e)
    {
        $conn = null;
        echo "Error: " . $e->getMessage();
    }
}


function getCoffeeBagsLight() 
{
    try 
    {
        $conn = new PDO("mysql:host={$GLOBALS['servername']};dbname={$GLOBALS['dbname']}", $GLOBALS['username'], $GLOBALS['password']);
        $sql = GET_LIGHT_ROAST_QUERY;
        $result = $conn->query($sql);
        $conn = null;
        return $result;

    } 
    catch(PDOException $e)
    {
        $conn = null;
        echo "Error: " . $e->getMessage();
    }
}

function getCoffeeBagsMedium() 
{
    try 
    {
        $conn = new PDO("mysql:host={$GLOBALS['servername']};dbname={$GLOBALS['dbname']}", $GLOBALS['username'], $GLOBALS['password']);
        $sql = GET_MEDIUM_ROAST_QUERY;
        $result = $conn->query($sql);
        $conn = null;
        return $result;

    } 
    catch(PDOException $e)
    {
        $conn = null;
        echo "Error: " . $e->getMessage();
    }
}

function getCoffeeBagsDark() 
{
    try 
    {
        $conn = new PDO("mysql:host={$GLOBALS['servername']};dbname={$GLOBALS['dbname']}", $GLOBALS['username'], $GLOBALS['password']);
        $sql = GET_DARK_ROAST_QUERY;
        $result = $conn->query($sql);
        $conn = null;
        return $result;

    } 
    catch(PDOException $e)
    {
        $conn = null;
        echo "Error: " . $e->getMessage();
    }
}


?>