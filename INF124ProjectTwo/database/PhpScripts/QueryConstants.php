<!-- Written by Kevin Ngo
kkngo3@uci.edu -->


<?php

define("CREATE_DATABASE_QUERY", "
    CREATE DATABASE CoffeeDB;
");

define("INITIALIZE_DATABASE_QUERY","
create table addresses
(
    Id           int auto_increment
        primary key,
    AddressLine1 varchar(2000) null,
    AddressLine2 varchar(2000) null,
    City         varchar(2000) null,
    State        varchar(2000) null,
    Zipcode      varchar(2000) null,
    CreatedOn    datetime      null,
    ModifiedOn   datetime      null,
    IsDeleted    bit           null
);

/* ---- */

create table cartproducts
(
	CartId int null,
	ProductId varchar(500) null,
	CreatedOn datetime null,
	ModifiedOn datetime null,
	IsDeleted bit null
	    /*
	constraint cartproducts_ibfk_1
		foreign key (CartId) references carts (Id),
	constraint cartproducts_products_SKU_fk
		foreign key (ProductId) references products (SKU)*/
);

create index CartId
	on cartproducts (CartId);

/* ---- */
create table carts
(
	Id int auto_increment
		primary key,
	UserId int null
	/*
	constraint carts_ibfk_1
		foreign key (UserId) references users (Id)*/
);

create index UserId
	on carts (UserId);

/* ---- */

create table `coffee-product-types`
(
	type varchar(200) not null primary key,
	`desc` varchar(2000) not null
);




/* ---- */
create table orderproducts
(
	OrderId int null,
	ProductId varchar(500) null,
	Quantity int null
	/*
	constraint orderproducts_ibfk_1
		foreign key (OrderId) references orders (Id),
	constraint orderproducts_products_SKU_fk
		foreign key (ProductId) references products (SKU)*/
);

create index OrderId
	on orderproducts (OrderId);

/* ---- */
create table orders
(
	Id int auto_increment
		primary key,
	UserId int null,
	PaymentInformationId int null,
	ShippingMethod varchar(2000) null,
	CreatedOn datetime null,
	ModifiedOn datetime null,
	IsDeleted bit null
	/*
	constraint orders_ibfk_1
		foreign key (PaymentInformationId) references paymentinformations (Id),
	constraint orders_ibfk_2
		foreign key (UserId) references users (Id)*/
);

create index PaymentInformationId
	on orders (PaymentInformationId);

create index UserId
	on orders (UserId);
/* ---- */
create table paymentinformations
(
	Id int auto_increment
		primary key,
	NameOnCard varchar(2000) null,
	CardNumber varchar(2000) null,
	ExpirationDate varchar(2000) null,
	CVC varchar(2000) null
);

/* ---- */
create table products
(
	CoffeeProduct varchar(200) null,
	SKU varchar(500) not null primary key,
	Price varchar(2000) not null,
	StockQuantity int not null,
	CreatedOn datetime null,
	ModifiedOn datetime null,
	IsDeleted bit null,
	ProductTypeId int null,
	ImageURl varchar(500) null
	/*constraint products_producttypes_Id_fk foreign key (ProductType) references producttypes (Id)*/
);

/* ---- */
create table producttypes
(
	Id int auto_increment
		primary key,
	TypeName varchar(2000) null
);

/* ---- */
create table users
(
	Id int auto_increment
		primary key,
	Email varchar(2000) null,
	FirstName varchar(2000) null,
	LastName varchar(2000) null,
	AddressId int null,
	PhoneNumber varchar(2000) null,
	CreatedOn datetime null,
	ModifiedOn datetime null,
	IsDeleted bit null
	/*
	constraint users_ibfk_1
		foreign key (AddressId) references addresses (Id)*/
);

create index AddressId
	on users (AddressId);

/* CONSTRAINTS WILL ALL GO INTO THIS SCRIPT */


ALTER TABLE cartproducts
    ADD constraint cartproducts_ibfk_1
		foreign key (CartId) references carts (Id),
	ADD constraint cartproducts_products_SKU_fk
		foreign key (ProductId) references products (SKU);

ALTER TABLE carts
    ADD constraint carts_ibfk_1
            foreign key (UserId) references users (Id);

ALTER TABLE orderproducts
    ADD constraint orderproducts_ibfk_1
		foreign key (OrderId) references orders (Id),
	ADD constraint orderproducts_products_SKU_fk
		foreign key (ProductId) references products (SKU);


ALTER TABLE orders
    ADD constraint orders_ibfk_1
		foreign key (PaymentInformationId) references paymentinformations (Id),
	ADD constraint orders_ibfk_2
		foreign key (UserId) references users (Id);

ALTER TABLE products
    ADD constraint products_producttypes_Id_fk
		foreign key (ProductTypeId) references producttypes (Id),
    ADD   constraint `products_coffee-product-types_type_fk`
        foreign key (CoffeeProduct) references `coffee-product-types` (type);

ALTER TABLE users
    ADD constraint users_ibfk_1
		foreign key (AddressId) references addresses (Id);

INSERT INTO producttypes
        (TypeName)
    VALUES
        ('LightRoast');

    INSERT INTO producttypes
        (TypeName)
    VALUES
        ('MediumRoast');

    INSERT INTO producttypes
        (TypeName)
    VALUES
        ('DarkRoast');

    INSERT INTO producttypes
        (TypeName)
    VALUES
        ('PotPricePointLow');

    INSERT INTO producttypes
        (TypeName)
    VALUES
        ('PotPricePointMedium');

    INSERT INTO producttypes
        (TypeName)
    VALUES
        ('PotPricePointHigh');

    INSERT INTO `coffee-product-types` (type, `desc`) VALUES ('French Press','A french press is a coffee pot that uses pressure in order to force the coffee grounds to the bottom of the pot. This leads to the coffee flavor being concentrated at the bottom of the pot. The way it achieves this is by using the plunger made of fine mesh so that the coffee won''t escape the bottom. Be aware that more finer grounds of coffee will not be able to be used on a french press because the fine mesh will not work on such fine grounds. Coarse grounds are the correct grounds that should be put into a french press.');

    INSERT INTO `coffee-product-types` (type, `desc`) VALUES ('Automatic Drip Coffee','A cooking appliance that is able to brew coffee. These will be found in majority of people''s home due to how cheap and how easy it is to use this coffee maker. Some of these coffee makers come in with built in features such as: grinding coffe beans, keeping coffee warm, self-cleaning mode, flavor profile, etc. This is the typical coffee maker that you will remember from your childhood during those early mornings.');

    INSERT INTO `coffee-product-types` (type, `desc`) VALUES ('Aeropress','Aeropress is a device for brewing coffee where the coffee is steeped for 10-50 seconds. The time depends on the grind and the preferred strength. After it has steeped for that time, it is forced through a filter by pressing the plunger through the tube. The filter canbe either metal or paper filter. While it does sound a lot like a french press, the Aeropress is able to make stronger coffee due to being able to control the grind and preffered strength by changing the steeped time.');

    INSERT INTO `coffee-product-types` (type, `desc`) VALUES ('Moka Pot','The Moka pot is the first stove-top on this list. The Moka pot is divided up into three different compartments. The first compartment is where steaming water should be placed into. The second compartment will contain the grounds of the coffee. It will go on top of the first compartment. Lastly, the last compartment will be screwed on top. After this, the pot will be put on the stove and heated up to medium heat. Through the use of pressure as the bottom chamber approaches a boil, it will push a stream of coffee slowly up to the top chamber.');

    INSERT INTO `coffee-product-types` (type, `desc`) VALUES ('Chemex','The Chemex makes coffee similar to drip coffee in terms of body and taste. However, the filters used are more thicker than the other filters used in pourover methods. This results in the coffee being brewed slower which makes a richer cup of coffee. The thicker paper filters also remove majoirty of coffee oils which result in a more \"cleaner\" coffee.');

    INSERT INTO `coffee-product-types` (type, `desc`) VALUES ('Pod Machine','A pod machine gets its name from the pods that need to be inserted in to the machine. The pod gets inserted into the machine where the machine will break through the seal in order to make a hole where it can run hot water through where the water is forced at extremely high pressure. This can mimic an expresso machine, but it won''t be one. This is an extremely quick and easy machine that is the opposite of an automatic drip coffee.');

    INSERT INTO `coffee-product-types` (type, `desc`) VALUES ('Espresso Machine','This is the matchine that will mostly be found in a traditional coffee shop. There is a difference between espresso and coffee. The difference is the preparation between the two. Espressor beans are roasted for a longer amount of time and the beans are also grounded finer.');

    INSERT INTO `coffee-product-types` (type, `desc`) VALUES ('Light Roast','This roast can be identified by its light color. The flavor profile is a toasted grain taste and pronounced acidity. The original flavor of the bean is kept much more than the other roasts. Because it does not get roasted for that long, this bean generally contains more caffeine. This may come as a surprise to many drinks of coffee because many people think that dark roast is the strongest, but its actually the weakest in terms of caffeine.');

    INSERT INTO `coffee-product-types` (type, `desc`) VALUES ('Medium Roast','This roast can be identified by its medium brown color. They lack the grainy taste of light roasts, but it contains a more balanced flavor than the light roast. This has less caffeine than the light roast.');

    INSERT INTO `coffee-product-types` (type, `desc`) VALUES ('Dark Roast','These roast are darker in color and sometimes they can be the color of chocolate. This coffee will taste more bitter and even sometimes it will taste burnt and smokey. Dark roast go by many different names, but they are all the same as dark roast. This bean develops more oil on top of the bean because of the longer and hotter roast that it undergoes');

    INSERT INTO products (CoffeeProduct, SKU, Price, StockQuantity, CreatedOn, ModifiedOn, IsDeleted, ProductTypeId, ImageUrl)
    VALUES ('Light Roast','LR1','8','100',NOW(),NOW(),0,1,'LR1.jpg');

    INSERT INTO products (CoffeeProduct, SKU, Price, StockQuantity, CreatedOn, ModifiedOn, IsDeleted, ProductTypeId, ImageUrl)
    VALUES ('Medium Roast','MR1','11.41','100',NOW(),NOW(),0,2,'mr1.jpg');

    INSERT INTO products (CoffeeProduct, SKU, Price, StockQuantity, CreatedOn, ModifiedOn, IsDeleted, ProductTypeId, ImageUrl)
    VALUES ('Dark Roast','DR1','10.20','100',NOW(),NOW(),0,3,'dr1.jpg');

    INSERT INTO products (CoffeeProduct, SKU, Price, StockQuantity, CreatedOn, ModifiedOn, IsDeleted, ProductTypeId, ImageUrl)
    VALUES ('French Press','FP1','25','100',NOW(),NOW(),0,4,'french-press.jpg');

    INSERT INTO products (CoffeeProduct, SKU, Price, StockQuantity, CreatedOn, ModifiedOn, IsDeleted, ProductTypeId, ImageUrl)
    VALUES ('French Press','FP2','28','100',NOW(),NOW(),0,4,'fp2.jpg');

    INSERT INTO products (CoffeeProduct, SKU, Price, StockQuantity, CreatedOn, ModifiedOn, IsDeleted, ProductTypeId, ImageUrl)
    VALUES ('French Press','FP3','26','100',NOW(),NOW(),0,4,'fp3.jpg');

    INSERT INTO products (CoffeeProduct, SKU, Price, StockQuantity, CreatedOn, ModifiedOn, IsDeleted, ProductTypeId, ImageUrl)
    VALUES ('Automatic Drip Coffee','DP1','20','100',NOW(),NOW(),0,4,'mr-coffee.jpeg');

    INSERT INTO products (CoffeeProduct, SKU, Price, StockQuantity, CreatedOn, ModifiedOn, IsDeleted, ProductTypeId, ImageUrl)
    VALUES ('Automatic Drip Coffee','DP2','28','100',NOW(),NOW(),0,4,'dp2.jpg');

    INSERT INTO products (CoffeeProduct, SKU, Price, StockQuantity, CreatedOn, ModifiedOn, IsDeleted, ProductTypeId, ImageUrl)
    VALUES ('Automatic Drip Coffee','DP3','25','100',NOW(),NOW(),0,4,'dp3.jpg');

    INSERT INTO products (CoffeeProduct, SKU, Price, StockQuantity, CreatedOn, ModifiedOn, IsDeleted, ProductTypeId, ImageUrl)
    VALUES ('Aeropress','AE1','31','100',NOW(),NOW(),0,4,'aeropress.jpg');

    INSERT INTO products (CoffeeProduct, SKU, Price, StockQuantity, CreatedOn, ModifiedOn, IsDeleted, ProductTypeId, ImageUrl)
    VALUES ('Moka Pot','MK1','33','100',NOW(),NOW(),0,5,'moka-pot-bialetti.png');

    INSERT INTO products (CoffeeProduct, SKU, Price, StockQuantity, CreatedOn, ModifiedOn, IsDeleted, ProductTypeId, ImageUrl)
    VALUES ('Chemex','CH1','43.50','100',NOW(),NOW(),0,5,'chemex-bodum.png');

    INSERT INTO products (CoffeeProduct, SKU, Price, StockQuantity, CreatedOn, ModifiedOn, IsDeleted, ProductTypeId, ImageUrl)
    VALUES ('Pod Machine','PM1','103','100',NOW(),NOW(),0,5,'keurig-pod-machine.jpg');

    INSERT INTO products (CoffeeProduct, SKU, Price, StockQuantity, CreatedOn, ModifiedOn, IsDeleted, ProductTypeId, ImageUrl)
    VALUES ('Pod Machine','PM2','70','100',NOW(),NOW(),0,5,'pm2.jpg');

    INSERT INTO products (CoffeeProduct, SKU, Price, StockQuantity, CreatedOn, ModifiedOn, IsDeleted, ProductTypeId, ImageUrl)
    VALUES ('Pod Machine','PM3','169','100',NOW(),NOW(),0,5,'pm3.jpg');

    INSERT INTO products (CoffeeProduct, SKU, Price, StockQuantity, CreatedOn, ModifiedOn, IsDeleted, ProductTypeId, ImageUrl)
    VALUES ('Espresso Machine','EM1','449','100',NOW(),NOW(),0,6,'espresso-machine.jpg');

");

#region PRODUCTS
#region GET PRODUCT BY TYPE

define("GET_LIGHT_ROAST_QUERY", "
SELECT p.CoffeeProduct,p.ImageURl,Cpt.`desc`,p.ProductTypeId,p.SKU
from products p 
JOIN `coffee-product-types` Cpt 
ON Cpt.type = p.CoffeeProduct 
WHERE p.ProductTypeId in (1) group by CoffeeProduct;
");

define("GET_MEDIUM_ROAST_QUERY", "
SELECT p.CoffeeProduct,p.ImageURl,Cpt.`desc`,p.ProductTypeId,p.SKU
from products p 
JOIN `coffee-product-types` Cpt 
ON Cpt.type = p.CoffeeProduct 
WHERE p.ProductTypeId in (2) group by CoffeeProduct;
");

define("GET_DARK_ROAST_QUERY", "
SELECT p.CoffeeProduct,p.ImageURl,Cpt.`desc`,p.ProductTypeId,p.SKU
from products p 
JOIN `coffee-product-types` Cpt 
ON Cpt.type = p.CoffeeProduct 
WHERE p.ProductTypeId in (3) group by CoffeeProduct;
");

define("GET_COFFEE_BAG_PRODUCTS_QUERY", "
SELECT p.CoffeeProduct,p.ImageURl,Cpt.`desc`,p.ProductTypeId,p.SKU
from products p 
JOIN `coffee-product-types` Cpt 
ON Cpt.type = p.CoffeeProduct 
WHERE p.ProductTypeId in (1,2,3) group by CoffeeProduct;
");

define("GET_BREWING_AT_HOME_PRODUCTS_QUERY", "
SELECT p.CoffeeProduct,p.ImageURl,Cpt.`desc`,p.ProductTypeId,p.SKU
from products p 
JOIN `coffee-product-types` Cpt 
ON Cpt.type = p.CoffeeProduct 
WHERE p.ProductTypeId in (4,5,6) group by CoffeeProduct;
");

define("GET_BREWING_PRICE_LOW", "
SELECT p.CoffeeProduct,p.ImageURl,Cpt.`desc`,p.ProductTypeId,p.SKU
from products p 
JOIN `coffee-product-types` Cpt 
ON Cpt.type = p.CoffeeProduct 
WHERE p.ProductTypeId in (4) group by CoffeeProduct;
");

define("GET_BREWING_PRICE_MEDIUM", "
SELECT p.CoffeeProduct,p.ImageURl,Cpt.`desc`,p.ProductTypeId,p.SKU
from products p 
JOIN `coffee-product-types` Cpt 
ON Cpt.type = p.CoffeeProduct 
WHERE p.ProductTypeId in (5) group by CoffeeProduct;
");

define("GET_BREWING_PRICE_HIGH", "
SELECT p.CoffeeProduct,p.ImageURl,Cpt.`desc`,p.ProductTypeId,p.SKU
from products p 
JOIN `coffee-product-types` Cpt 
ON Cpt.type = p.CoffeeProduct 
WHERE p.ProductTypeId in (6) group by CoffeeProduct;
");

#endregion
#endregion
?>