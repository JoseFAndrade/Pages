-- Written by Kevin Ngo
-- kkngo3@uci.edu


CREATE TABLE `Users` (
  `Id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `Email` VARCHAR(2000),
  `FirstName` VARCHAR(2000),
  `LastName` VARCHAR(2000),
  `AddressId` INT,
  `CreatedOn` DATETIME,
  `ModifiedOn` DATETIME,
  `IsDeleted` bit
);

CREATE TABLE `Products` (
  `Id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `ProductTypeId` INT,
  `Name` VARCHAR(2000),
  `SKU` VARCHAR(2000),
  `Price` VARCHAR(2000),
  `StockQuantity` INT,
  `Description` VARCHAR(2000) COMMENT 'JSON format',
  `CreatedOn` DATETIME,
  `ModifiedOn` DATETIME,
  `IsDeleted` bit
);

CREATE TABLE `Addresses` (
  `Id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `AddressLine1` VARCHAR(2000),
  `AddressLine2` VARCHAR(2000),
  `City` VARCHAR(2000),
  `State` VARCHAR(2000),
  `Zipcode` VARCHAR(2000),
  `CreatedOn` DATETIME,
  `ModifiedOn` DATETIME,
  `IsDeleted` bit
);

CREATE TABLE `Carts` (
  `Id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `UserId` INT
);

CREATE TABLE `CartProducts` (
  `CartId` INT,
  `ProductId` INT,
  `CreatedOn` DATETIME,
  `ModifiedOn` DATETIME,
  `IsDeleted` bit
);

CREATE TABLE `PaymentInformations` (
  `Id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `NameOnCard` VARCHAR(2000),
  `CardNumber` VARCHAR(2000),
  `ExpirationDate` VARCHAR(2000),
  `CVC` VARCHAR(2000)
);

CREATE TABLE `Orders` (
  `Id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `PaymentInformationId` INT,
  `CreatedOn` DATETIME,
  `ModifiedOn` DATETIME,
  `IsDeleted` bit
);

CREATE TABLE `OrderProducts` (
  `OrderId` INT,
  `ProductId` INT
);

CREATE TABLE `ProductTypes` (
  `Id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `TypeName` VARCHAR(2000)
);

CREATE TABLE `ProductImages` (
	`ProductId` INT,
    `ImageUrl` VARCHAR(2000)
);

ALTER TABLE `ProductImages` ADD FOREIGN KEY (`ProductId`) REFERENCES `Products` (`Id`);

ALTER TABLE `Users` ADD FOREIGN KEY (`AddressId`) REFERENCES `Addresses` (`Id`);

ALTER TABLE `Products` ADD FOREIGN KEY (`ProductTypeId`) REFERENCES `ProductTypes` (`Id`);

ALTER TABLE `Carts` ADD FOREIGN KEY (`UserId`) REFERENCES `Users` (`Id`);

ALTER TABLE `CartProducts` ADD FOREIGN KEY (`CartId`) REFERENCES `Carts` (`Id`);

ALTER TABLE `CartProducts` ADD FOREIGN KEY (`ProductId`) REFERENCES `Products` (`Id`);

ALTER TABLE `Orders` ADD FOREIGN KEY (`PaymentInformationId`) REFERENCES `PaymentInformations` (`Id`);

ALTER TABLE `OrderProducts` ADD FOREIGN KEY (`OrderId`) REFERENCES `Orders` (`Id`);

ALTER TABLE `OrderProducts` ADD FOREIGN KEY (`ProductId`) REFERENCES `Products` (`Id`);

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
    
INSERT INTO products
	(ProductTypeId, Name, SKU, Price, StockQuantity, Description, CreatedOn, ModifiedOn, IsDeleted)
VALUES
	(1, 'Starbucks Verdana Blend', '01', 9.99, 100, 'This roast can be identified by its light color. The flavor profile is a toasted grain taste and pronounced acidity. The original flavor of the bean is kept much more than the other roasts. Because it does not get roasted for that long, this bean generally contains more caffeine. This may come as a surprise to many drinks of coffee because many people think that dark roast is the strongest, but its actually the weakest in terms of caffeine.', NOW(), NOW(), 0);

INSERT INTO products
	(ProductTypeId, Name, SKU, Price, StockQuantity, Description, CreatedOn, ModifiedOn, IsDeleted)
VALUES
	(2, 'Starbucks Pike Place Blend', '02', 12.99, 100, 'This roast can be identified by its medium brown color. They lack the grainy taste of light roasts, but it contains a more balanced flavor than the light roast. This has less caffeine than the light roast.', NOW(), NOW(), 0);

INSERT INTO products
	(ProductTypeId, Name, SKU, Price, StockQuantity, Description, CreatedOn, ModifiedOn, IsDeleted)
VALUES
	(3, 'Starbucks French Roast Blend', '03', 14.99, 100, 'These roast are darker in color and sometimes they can be the color of chocolate. This coffee will taste more bitter and even sometimes it will taste burnt and smokey. Dark roast go by many different names, but they are all the same as dark roast. This bean develops more oil on top of the bean because of the longer and hotter roast that it undergoes.', NOW(), NOW(), 0);
    
INSERT INTO products
	(ProductTypeId, Name, SKU, Price, StockQuantity, Description, CreatedOn, ModifiedOn, IsDeleted)
VALUES
	(4, 'French Press', '04', 20.00, 100, 'A french press is a coffee pot that uses pressure in order to force the coffee grounds to the bottom of the pot. This leads to the coffee flavor being concentrated at the bottom of the pot. The way it achieves this is by using the plunger made of fine mesh so that the coffee won't escape the bottom. Be aware that more finer grounds of coffee will not be able to be used on a french press because the fine mesh will not work on such fine grounds. Coarse grounds are the correct grounds that should be put into a french press.', NOW(), NOW(), 0);
    
INSERT INTO products
	(ProductTypeId, Name, SKU, Price, StockQuantity, Description, CreatedOn, ModifiedOn, IsDeleted)
VALUES
	(4, 'Automatic Drip Coffee', '05', 25.00, 100, 'A cooking appliance that is able to brew coffee. These will be found in majority of people's home due to how cheap and how easy it is to use this coffee maker. Some of these coffee makers come in with built in features such as: grinding coffe beans, keeping coffee warm, self-cleaning mode, flavor profile, etc. This is the typical coffee maker that you will remember from your childhood during those early mornings.', NOW(), NOW(), 0);

INSERT INTO products
	(ProductTypeId, Name, SKU, Price, StockQuantity, Description, CreatedOn, ModifiedOn, IsDeleted)
VALUES
	(4, 'Aeropress', '06', 25.00, 100, 'Aeropress is a device for brewing coffee where the coffee is steeped for 10-50 seconds. The time depends on the grind and the preferred strength. After it has steeped for that time, it is forced through a filter by pressing the plunger through the tube. The filter canbe either metal or paper filter. While it does sound a lot like a french press, the Aeropress is able to make stronger coffee due to being able to control the grind and preffered strength by changing the steeped time.', NOW(), NOW(), 0);

INSERT INTO products
	(ProductTypeId, Name, SKU, Price, StockQuantity, Description, CreatedOn, ModifiedOn, IsDeleted)
VALUES
	(5, 'Moka Pot', '07', 36.99, 100, 'The Moka pot is the first stove-top on this list. The Moka pot is divided up into three different compartments. The first compartment is where steaming water should be placed into. The second compartment will contain the grounds of the coffee. It will go on top of the first compartment. Lastly, the last compartment will be screwed on top. After this, the pot will be put on the stove and heated up to medium heat. Through the use of pressure as the bottom chamber approaches a boil, it will push a stream of coffee slowly up to the top chamber.', NOW(), NOW(), 0);

INSERT INTO products
	(ProductTypeId, Name, SKU, Price, StockQuantity, Description, CreatedOn, ModifiedOn, IsDeleted)
VALUES
	(5, 'Chemex', '08', 40.99, 100, 'The Chemex makes coffee similar to drip coffee in terms of body and taste. However, the filters used are more thicker than the other filters used in pourover methods. This results in the coffee being brewed slower which makes a richer cup of coffee. The thicker paper filters also remove majoirty of coffee oils which result in a more `leaner` coffee.', NOW(), NOW(), 0);

INSERT INTO products
	(ProductTypeId, Name, SKU, Price, StockQuantity, Description, CreatedOn, ModifiedOn, IsDeleted)
VALUES
	(5, 'Pod Machine', '09', 49.99, 100, 'A pod machine gets its name from the pods that need to be inserted in to the machine. The pod gets inserted into the machine where the machine will break through the seal in order to make a hole where it can run hot water through where the water is forced at extremely high pressure. This can mimic an expresso machine, but it won't be one. This is an extremely quick and easy machine that is the opposite of an automatic drip coffee.', NOW(), NOW(), 0);

INSERT INTO products
	(ProductTypeId, Name, SKU, Price, StockQuantity, Description, CreatedOn, ModifiedOn, IsDeleted)
VALUES
	(6, 'Espresso Machine', '10', 99.99, 100, 'This is the matchine that will mostly be found in a traditional coffee shop. There is a difference between espresso and coffee. The difference is the preparation between the two. Espressor beans are roasted for a longer amount of time and the beans are also grounded finer.', NOW(), NOW(), 0);