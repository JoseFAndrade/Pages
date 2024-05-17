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

  <title>Coffee Bags</title>
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
        <h1>Coffee Bags </h1>
        <p>This page contains some of the different types of roasts that there is in coffee. We will show only 3 which are light roast, medium roast, and dark roast. 
            There is also medium-dark roast, but we haven't really started aquiring that kind of roast yet. The roast depends on how long the beans 
            have been roasted for. It is one of the main factors that determine the taste of the coffee. It can be thought of as the base layer for the flavor of a because many more thigns
            determine the flavors of a bean, more <a href="https://pinebrookroasters.com/blogs/happenings/coffee-roasting-explained">information can be found here</a>.  
        </p>
      </div>

      <?php 
    $tableIn = "Coffee_Bags";
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

            <tr>
              <td class="center"> <a href = "lightRoast.html"> <img src="LR1.jpg">  </a></td>
              <td class="Top-Left-In-Table"> 
                <h1>Light Roast</h1> 
                <p>
                    This roast can be identified by its light color. The flavor profile is a toasted grain taste and pronounced acidity. The original flavor of the bean is kept much more
                    than the other roasts. Because it does not get roasted for that long, this bean generally contains more caffeine. This may come as a surprise to 
                    many drinks of coffee because many people think that dark roast is the strongest, but its actually the weakest in terms of caffeine. 
                  </p>
              </td>
            </tr>

            <tr>
              <td class="center"> <a href = "mediumRoast.html" > <img src="mr1.jpg">  </a></td>
              <td class="Top-Left-In-Table"> 
                <h1>
                  Medium Roast
                </h1>
                <p>
                    This roast can be identified by  its medium brown color. They lack the grainy taste of light roasts, but it contains a more balanced flavor than the light roast.
                    This has less caffeine than the light roast. 
                </p>
              </td>
            </tr>

            
            <tr>
              <td class="center"> <a href="darkRoast.html"> <img src="dr1.jpg"> </a></td>
              <td class="Top-Left-In-Table">
                <h1>Dark Roast</h1>
                <p>
                    These roast are darker in color and sometimes they can be the color of chocolate. This coffee will taste more bitter and even sometimes it will taste burnt and smokey.
                    Dark roast go by many different names, but they are all the same as dark roast. This bean develops more oil on top of the bean because of the longer and hotter roast that it undergoes

                </p>
              </td>
            </tr>            
        </table>

        <p>Information obtained from: <a href="https://pinebrookroasters.com/blogs/happenings/coffee-roasting-explained">Pine Brook Roasters</a> </p>
        -->
      </div>

</body>
</html>
