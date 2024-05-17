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

  <title>Brewing at home</title>
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



      <div>
        <h1>Brewing at home </h1>
        <p>This page contains some of the different ways that one can brew coffee at home. These different ways are organized by a Level of 
          difficulty. There is three levels: Low, Medium, and high. We recommend to start off at the low level if you are a beginner and 
          are getting into coffee making. Once you have experience with low level, we recommend starting to get  into the next tier levels. If not a beginner,
          start at the next level of what you have been using. By being able to get up into those higher tiers you will be able to make coffee more similar to that that you get at a coffee shop.
        </p>
      </div>

      <?php 
    $tableIn = "Brewing";
    include 'sellingTableDyn.php';
    ?>

    <!-- 
      <div class="SellingTable"  style="width:100%;">
        <table style="width: 100%;"> 

            <tr>
                <th></th>
                <th></th>
                <th></th>
            </tr>

            <tr> <td class="difficulty center" colspan="3"> <h1> Price Point: Low </h1>  </td></tr>

            <tr>
              <td class="center"> <a href = "French press.php"> <img src="french-press.jpg">  </a></td>
              <td class="Top-Left-In-Table"> 
                <h1>French Press</h1> 
                <p>A french press is a coffee pot that uses pressure in order to force the coffee grounds to 
                  the bottom of the pot. This leads to the coffee flavor being concentrated at the bottom
                  of the pot. The way it achieves this is by using the plunger made of fine mesh so that
                  the coffee won't escape the bottom. Be aware that more finer grounds of coffee will not be able
                  to be used on a french press because the fine mesh will not work on such fine grounds. Coarse grounds are the correct grounds that should be 
                  put into a french press. 
                  </p>
              </td>
            </tr>

            <tr>
              <td class="center"> <a href = "coffee-maker.html" > <img src="mr-coffee.jpeg">  </a></td>
              <td class="Top-Left-In-Table"> 
                <h1>
                  Automatic drip coffee
                </h1>
                <p>A cooking appliance that is able to brew coffee. These will be found in majority of people's home due to how cheap 
                  and how easy it is to use this coffee maker. Some of these coffee makers come in with built in features such as: 
                  grinding coffe beans, keeping coffee warm, self-cleaning mode, flavor profile, etc. 
                  This is the typical coffee maker that you will remember from your childhood during those early mornings. 
                </p>
              </td>
            </tr>

            
            <tr>
              <td class="center"> <a href="aeropress.html"> <img src="aeropress.jpg"> </a></td>
              <td class="Top-Left-In-Table">
                <h1>Aeropress</h1>
                <p>Aeropress is a device for brewing coffee where the coffee is steeped for 10-50 seconds. 
                  The time depends on the grind and the preferred strength. After it has steeped for that time, 
                  it is forced through a filter by pressing the plunger through the tube. The filter canbe either 
                  metal or paper filter. While it does sound a lot like a french press, the 
                  Aeropress is able to make stronger coffee due to being able to control the grind and preffered 
                  strength by changing the steeped time. 
                </p>
              </td>
            </tr>            
          
            <tr> <td class="difficulty center" colspan="3"> <h1> Price Point: Medium </h1>  </td></tr>

            <tr>
              <td class = "center"> <a href = "moka-pot.html">  <img src="moka-pot-bialetti.png"> </a></td>
              <td class="Top-Left-In-Table">
                <h1>
                  Moka Pot
                </h1> 
                <p>The Moka pot is the first stove-top on this list. The Moka pot is divided up into three different compartments. 
                  The first compartment is where steaming water should be placed into. The second compartment will contain 
                  the grounds of the coffee. It will go on top of the first compartment. 
                  Lastly, the last compartment will be screwed on top. 
                  After this, the pot will be put on the stove and heated up to medium heat. 
                  Through the use of pressure as the bottom chamber approaches a boil, 
                  it will push a stream of coffee slowly up to the top chamber. 
                </p>
                 </td>             
            </tr>

            <tr>
                <td class="center"><a href ="chemex.html"> <img src="chemex-bodum.png"> </a> </td>
                <td class="Top-Left-In-Table">
                  <h1>
                    Chemex
                  </h1>

                  <p>
                    The Chemex makes coffee similar to drip coffee in terms of body and taste. 
                    However, the filters used are more thicker than the other filters used in pourover methods. 
                    This results in the coffee being brewed slower which makes a richer cup of coffee. 
                    The thicker paper filters also remove majoirty of coffee oils which result in a more "cleaner" cofee. 
                  </p>
                </td>
            </tr>

            <tr>
              <td class="center"> <a href = "pod-machine.html"> <img src="keurig-pod-machine.jpg"> </a></td>
              <td class="Top-Left-In-Table"> 
              <h1>
                Pod Machines
              </h1>
              <p>
                A pod machine gets its name from the pods that need to be inserted in to the machine. 
                The pod gets inserted into the machine where the machine will break through the seal 
                in order to make a hole where it can run hot water through where the water is forced at extremely high pressure. 
                This can mimic an expresso machine, but it won't be one. This is an extremely quick and easy machine that is the 
                opposite of an automatic drip coffee.
              </p>
              </td>
            </tr>

           
            <tr> <td class="difficulty center" colspan="3"> <h1> Price Point: High </h1>  </td></tr>

            <tr>
              <td class="center"> <a href="espresso-machine.html"> <img src="espresso-machine.jpg"> </a></td>
              <td class="Top-Left-In-Table"> 
                <h1> 
                  Espresso Machine
                </h1>
                <p>
                  This is the matchine that will mostly be found in a traditional coffee shop. 
                  There is a difference between espresso and coffee. The difference is the preparation between the two. 
                  Espressor beans are roasted for a longer amount of time and the beans are also grounded finer. 
                </p>
              </td>
            </tr>

          </table>

        <p>Information obtained from: <a href="https://www.homegrounds.co/the-complete-guide-to-coffee-brewing-methods/?fbclid=IwAR3TXlyQmz6N6lewbbPOrzMKTBLjjEFxbchDwtKI_Vs-PbAxX6LEiPuOMx4">Here</a> </p>
        -->
      </div>

</body>
</html>
