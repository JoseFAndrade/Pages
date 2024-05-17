<!doctype html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <meta name="author" content="">
  <meta name="description" content="description of your page">
  <!-- you would link to an external stylesheet here! -->
  <link href="./style.css" type="text/css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Fjalla+One%7CNoto+Sans" rel="stylesheet">
  <script src="form.js"></script>

  <title>Automatic Drip Coffee</title>
</head>

<body>
  <!-- navigation to my other website pages -->
  <div class="OutofPageNavigation">
        <ul>
          <li><a href="index.php">Home page</a></li>
          <li><a href="Coffee_Bags.php">Coffee Bags</a></li>
          <li><a href="Brewing.php">Brewing At Home</a><li>
        </ul>
      </div>


      <div class="ItemPage">
        <h1>Automatic Drip Coffee </h1>
      </div>

      <div class="ItemPage">
        <div>
         <table class="table-of-variety">
             <tr>
                 <!-- sources for pics 
                 https://www.amazon.com/Mr-Coffee-4-Cup-Switch-Maker/dp/B000FTNEGS
                 https://www.amazon.com/Mr-Coffee-12-Cup-Programmable-Maker/dp/B005MLB2S6/ref=sr_1_10?dchild=1&keywords=coffee+maker&qid=1587524095&s=home-garden&sr=1-10
                 
                 -->
                 <td> <img src="mr-coffee.jpeg" alt=""> <p>Item Code: DP1 $20 dollars</p> </td>
                 <td> <img src="dp2.jpg" alt=""> <p>Item Code: DP2 $28 dollars</p> </td>
                 <td> <img src="dp3.jpg" alt=""> <p>Item code: DP3 $25 dollars</p></td>
             </tr>
         </table>
        </div>

      <div class="form">

        <form action="confirmation.php" method="post" name="OrderForm" onsubmit="return checkform()">
          <fieldset>
            <legend><h2>Order Form</h2></legend>
            <label>
              Product: <select name="product">
                <option value="DP1" selected="selected">Automatic Drip Coffee - DP1</option>
                <option value="DP2">Automatic Drip Coffee - DP2</option>
                <option value="DP3">Automatic Drip Coffee - DP3</option>
              </select>
            </label>
            <p><h2>Shipping Information</h2></p>
            <label>
            First Name: <input type="text" id="First name" name="firstName">
            </label>
            <label>
            Last Name: <input type="text" id="Last name" name="lastName"> 
            </label>
            <label for="email">Email: <input type="email" id="Email" name="email"></label>
            <br><br>
            <label>
            Address Line 1: <input type="text" id="Shipping address" name="street" size="40">
            </label>
            <label>
            Phone Number: <input type="tel" id="Phone number" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" maxlength="12" size="12"><br>
            <small style="margin-left:119px">Street address, P.O. box, company name, c/o</small>
            <small style="margin-left:131px">Format: 012-345-6789</small><br>
            </label>
            <br>
            <label>
            Address Line 2: <input type="text" id="Shipping address 2" name="street2" size="40"><br>
            <small style="margin-left:119px">Apartment, suite, unit, building, floor, etc.</small>
            </label>
            <br><br>
            <label>
            City: <input type="text" id="City name" name="city">
            </label>
            <label>
            State: <input type="text" id="State code" name="state" minlength="2" maxlength="2" size="2">
            </label>
            <label>
            Zip Code: <input type="text" id="Zip code" name="zip" minlength="5" maxlength="5" size="5">
            </label>
            <br><br>
            <label>
            Quantity: <select name="qty" style="margin-right:30px">
              <option value="1" selected="selected">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select>
            </label>
            <label>
            Shipping Speed:
            <input type="radio" id="overnight" name="speed" value="overnight" checked="checked">
            <label for="overnight">Overnight</label><br>
            <input type="radio" id="expedited" name="speed" value="expedited" style="margin-left:293px">
            <label for="expedited">2-Days Expedited</label><br>
            <input type="radio" id="ground" name="speed" value="ground" style="margin-left:293px">
            <label for="ground">6-Days Ground</label>
            </label><br>

            <p><h2>Payment Information</h2></p>
            <label>Name on Card: <input type="text" id="Name on card" name="card_name" size="19"></label><br><br>
            <label>Card Number: <input type="text" id="Card number" name="card_num" minlength="16" maxlength="16"size="20"></label>
            <label>Expiration Date: <input type="text" id="Expiration date" name="expire" placeholder="MM/YYYY" minlength="7" maxlength="7" size="7"></label>
            <label>CVC: <input type="text" id="CVC" name="CVC" minlength="3" maxlength="4" size="4"></label>
            

            <br><br>
            <input type="submit" value="Order">
          </fieldset>
        </form>
      </div>


</body>
</html>
