DROP DATABASE IF EXISTS SUNSHINEDEALS;
DROP DATABASE IF EXISTS sunshinedeals;

CREATE DATABASE sunshinedeals;
CREATE USER 'shinetheweb'@'localhost' IDENTIFIED BY 'urmysunshine';

USE sunshinedeals;
GRANT ALL ON sunshinedeals.* TO 'shinetheweb'@'localhost';

DROP TABLE IF EXISTS ACCOUNTS;
DROP TABLE IF EXISTS CART;
DROP TABLE IF EXISTS PURCHASES;
DROP TABLE IF EXISTS LOCATIONS;
DROP TABLE IF EXISTS COUPONS;

CREATE TABLE ACCOUNTS (
	ACCT_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	ACCT_NAME VARCHAR(50) UNIQUE,
	ACCT_PASS varchar(40),
	ACCT_EMAIL varchar(32) UNIQUE,
	ACCT_SQUEST varchar(100),
	ACCT_SANSER varchar(100),
	ACCT_TYPE INT NOT NULL,
	ACCT_JOIN TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE COUPONS (
	COUP_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	COUP_NAME varchar(50) UNIQUE,
	COUP_TOTAL INT,
	COUP_LEFT INT,
	COUP_PRICE DECIMAL(15,2),
	COUP_CATNAME VARCHAR(30),
	COUP_VENDOR VARCHAR(50),
	COUP_DESC VARCHAR(1000),
	COUP_IMGLOC VARCHAR(200),
	COUP_START TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	COUP_EXPR TIMESTAMP
);

CREATE TABLE CART (
	CART_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	CART_ACCT_ID INT NOT NULL,
	CART_COUP_ID INT NOT NULL,
	CART_QUAN INT,
	CART_DATE TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE PURCHASES (
	PUR_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	PUR_ACCT_ID INT NOT NULL,
	PUR_VENDNAME VARCHAR(50) NOT NULL,
	PUR_COUP_ID INT NOT NULL,
	PUR_QUAN INT NOT NULL,
	PUR_PRICE DECIMAL(15,2) NOT NULL,
	PUR_PAID DECIMAL(15,2) NOT NULL,
	PUR_DATE TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	PUR_BADD varchar(50) NOT NULL,
	PUR_BCTY varchar(30) NOT NULL,
	PUR_BSTA char(2) NOT NULL,
	PUR_BZIP char(5) NOT NULL,
	PUR_BNAME varchar(50) NOT NULL,
	PUR_CCN varchar(50) NOT NULL,
	PUR_CCLFN char(5) NOT NULL,
	PUR_CCEX DATE NOT NULL,
	PUR_CCSN varchar(50) NOT NULL
);

CREATE UNIQUE INDEX ACCT_INDEX ON ACCOUNTS(ACCT_ID, ACCT_NAME);
CREATE UNIQUE INDEX COUP_INDEX ON COUPONS(COUP_ID, COUP_NAME);
CREATE INDEX CART_INDEX ON CART(CART_ID ASC);
CREATE INDEX PUR_INDEX ON PURCHASES(PUR_ID ASC);

ALTER TABLE CART ADD CONSTRAINT CARTFK_ACCT FOREIGN KEY(CART_ACCT_ID) REFERENCES ACCOUNTS(ACCT_ID);
ALTER TABLE CART ADD CONSTRAINT CARTFK_COUP FOREIGN KEY(CART_COUP_ID) REFERENCES COUPONS(COUP_ID);
ALTER TABLE PURCHASES ADD CONSTRAINT PURFK_ACCT FOREIGN KEY(PUR_ACCT_ID) REFERENCES ACCOUNTS(ACCT_ID);
ALTER TABLE PURCHASES ADD CONSTRAINT PURFK_COUP FOREIGN KEY(PUR_COUP_ID) REFERENCES COUPOUNS(COUP_ID);

INSERT INTO ACCOUNTS (ACCT_NAME, ACCT_PASS, ACCT_EMAIL, ACCT_SQUEST, ACCT_SANSER, ACCT_TYPE)
	VALUES ('Lamborghini',SHA1(MD5('Aventador')), 'lambo@lamborghini.com', 'What is your logo?', SHA1(MD5('A Bull.')), 1);
INSERT INTO ACCOUNTS (ACCT_NAME, ACCT_PASS, ACCT_EMAIL, ACCT_SQUEST, ACCT_SANSER, ACCT_TYPE)
	VALUES ('Michelin',SHA1(MD5('the wheel')), 'tires@michelin.com', 'Who need us?', SHA1(MD5('Things that move')), 1);
INSERT INTO ACCOUNTS (ACCT_NAME, ACCT_PASS, ACCT_EMAIL, ACCT_SQUEST, ACCT_SANSER, ACCT_TYPE)
	VALUES ('Ikea',SHA1(MD5('HomeLiving')), 'products@ikea.com', 'What is my nationality?', SHA1(MD5('Swiss')), 1);
INSERT INTO ACCOUNTS (ACCT_NAME, ACCT_PASS, ACCT_EMAIL, ACCT_SQUEST, ACCT_SANSER, ACCT_TYPE)
	VALUES ('Johnson & Johnson Baby',SHA1(MD5('Adorable')), 'baby@jsandjs.com', 'Who do we tailor for?', SHA1(MD5('Babies')), 1);
INSERT INTO ACCOUNTS (ACCT_NAME, ACCT_PASS, ACCT_EMAIL, ACCT_SQUEST, ACCT_SANSER, ACCT_TYPE)
	VALUES ('Boeing',SHA1(MD5('BuyA747')), 'buyaplane@boeing.com', 'What do we make?', SHA1(MD5('We make planes')), 1);
INSERT INTO ACCOUNTS (ACCT_NAME, ACCT_PASS, ACCT_EMAIL, ACCT_SQUEST, ACCT_SANSER, ACCT_TYPE)
	VALUES ('Hawaiian Airlines',SHA1(MD5('vacation')), 'flyaa@ha.com', 'Who do we serve?', SHA1(MD5('People who travel')), 1);
INSERT INTO ACCOUNTS (ACCT_NAME, ACCT_PASS, ACCT_EMAIL, ACCT_SQUEST, ACCT_SANSER, ACCT_TYPE)
	VALUES ('Krispy Kreme',SHA1(MD5('Doughnuts')), 'doughnuts@krispyk.com', 'Who loves us?', SHA1(MD5('The Police')), 1);
INSERT INTO ACCOUNTS (ACCT_NAME, ACCT_PASS, ACCT_EMAIL, ACCT_SQUEST, ACCT_SANSER, ACCT_TYPE)
	VALUES ('Nintendo',SHA1(MD5('Legend')), 'gaming@nintendo.com', 'Whats our motto?', SHA1(MD5('Wii Like to Play')), 1);
INSERT INTO ACCOUNTS (ACCT_NAME, ACCT_PASS, ACCT_EMAIL, ACCT_SQUEST, ACCT_SANSER, ACCT_TYPE)	
	VALUES ('Epic Games',SHA1(MD5('WARS')), 'gaming@egames.com', 'What are we selling?', SHA1(MD5('Gears of War')), 1);
INSERT INTO ACCOUNTS (ACCT_NAME, ACCT_PASS, ACCT_EMAIL, ACCT_SQUEST, ACCT_SANSER, ACCT_TYPE)
	VALUES ('Scientists',SHA1(MD5('LHC')), 'LHC@science.com', 'Whats out purpose?', SHA1(MD5('Build the universe')), 1);
INSERT INTO ACCOUNTS (ACCT_NAME, ACCT_PASS, ACCT_EMAIL, ACCT_SQUEST, ACCT_SANSER, ACCT_TYPE)
	VALUES ('General Dynamics Land Systems',SHA1(MD5('Abrams')), 'tanks@gdls.mil', 'What are we selling?', SHA1(MD5('Machines of War')), 1);
INSERT INTO ACCOUNTS (ACCT_NAME, ACCT_PASS, ACCT_EMAIL, ACCT_SQUEST, ACCT_SANSER, ACCT_TYPE)
	VALUES ('Lockheed Martin',SHA1(MD5('WARS')), 'fjets@lockheedmartin.mil', 'What are we selling?', SHA1(MD5('Fighter Jets')), 1);
INSERT INTO ACCOUNTS (ACCT_NAME, ACCT_PASS, ACCT_EMAIL, ACCT_SQUEST, ACCT_SANSER, ACCT_TYPE)
	VALUES ('Northrop Grumman Shipbuilding',SHA1(MD5('WARS')), 'aircraftcarriers@northropgrumman.mil', 'What are we selling?', SHA1(MD5('Superior Carriers')), 1);
INSERT INTO ACCOUNTS (ACCT_NAME, ACCT_PASS, ACCT_EMAIL, ACCT_SQUEST, ACCT_SANSER, ACCT_TYPE)
	VALUES ('Hasselblad USA',SHA1(MD5('Camera')), 'prophoto@Hasselblad.com', 'What are we selling?', SHA1(MD5('Professional Cameras')), 1);





INSERT INTO COUPONS (COUP_NAME, COUP_TOTAL, COUP_LEFT, COUP_PRICE, COUP_CATNAME, COUP_VENDOR, COUP_DESC, COUP_IMGLOC, COUP_EXPR)
	VALUES ('Lamborgini Aventador LP700-4',10,10,380000.00,'Automotive','Lamborghini','The Lamborgini Aventador is a two-door, two-seater supercar. Named after a champion bull, the Aventador is serious because it is powered by a 6.5L V12 that generates a mind-blowing 690 BHP and 690 Nm of torque. 0 to 60 only takes 2.9 seconds and has an estimated top speed of 217 MPH. Original Price is $400,000. Do you think you can grab this bull by its horns?', '../images/coupons/aventador.jpg', '2012-06-05 11:59PM');
INSERT INTO COUPONS (COUP_NAME, COUP_TOTAL, COUP_LEFT, COUP_PRICE, COUP_CATNAME, COUP_VENDOR, COUP_DESC, COUP_IMGLOC, COUP_EXPR)
	VALUES ('Michelin Tires',80,80,85.00,'Automotive','Michelin','If it was not obvious already, we make tires for anything and everything, including but not limited to automobiles, motorcycles, aircrafts, and the Space Shuttle. Our specially made tires are <i>green</i> which reduce fuel consumption, increases life expectancy, and better grip on any terrain. Safe, long lasting, and fairly cheap, what are you waiting for? Original Price: $100.00. Buy Michelin Defender Tires.', '../images/coupons/michelindefender.jpg', '2012-06-05 11:59PM');
INSERT INTO COUPONS (COUP_NAME, COUP_TOTAL, COUP_LEFT, COUP_PRICE, COUP_CATNAME, COUP_VENDOR, COUP_DESC, COUP_IMGLOC, COUP_EXPR)
	VALUES ('Folldal Bed',50,50,899.00,'Home','Ikea','The Folldal bed comes with a bed frame in Grann white and a king mattress. The Bed comes comes with soft, hardwearing, and simple maintenance leather that lasts long and easy to maintain. Just wipe clean with a damp cloth and it will be good as new.  The bed sides are also adjustable to allow mattresses of different shapes and heights to comfortable fit inside. Some Assembly Required. Original Price: $999.00. Sleep in comfort now.', '../images/coupons/folldalbed.jpg', '2012-06-05 11:59PM');
INSERT INTO COUPONS (COUP_NAME, COUP_TOTAL, COUP_LEFT, COUP_PRICE, COUP_CATNAME, COUP_VENDOR, COUP_DESC, COUP_IMGLOC, COUP_EXPR)
	VALUES ('Johnson & Johnson Baby Lotion',1500,1500,3.99,'Baby','Johnson & Johnson Baby','The new Johnson and Johnson Baby Lotion is the number 1 choice in hospitals and moms everywhere. It has the unmistakable baby fresh scent that is gentle, mild on the skin, and pleasant for babies. Its fast absorbing formula leaves the skin feeling soft and smooth, not oily or slippery. Instructions: gently apply the lotion on the baby. Original Price: $5.99. Make your baby feel soft!', '../images/coupons/jandjbl.jpg', '2012-06-05 11:59PM');
INSERT INTO COUPONS (COUP_NAME, COUP_TOTAL, COUP_LEFT, COUP_PRICE, COUP_CATNAME, COUP_VENDOR, COUP_DESC, COUP_IMGLOC, COUP_EXPR)
	VALUES ('Boeing 747-8F',3,3,319000000.00,'Travel','Boeing','Ever been to the airport and got tired of waiting in long lines to check in? Are you finding it hard to find timing that work around your schedule?  WELL DO NOT WORRY! The iconic Boeing 747 is 42 years old. This new 747-8F is a fuel-efficient and maneuverable aircraft. Since you own it, you no longer have to worry about tickets or timings. Simply call your pilot and tell him or her that you need to be somewhere now. The 747-8F is large and spacious so you can take anything with you. Original Price: $320 million. Fly like POTUS and the Space Shuttle.', '../images/coupons/boeing747.jpg', '2012-06-05 11:59PM');
INSERT INTO COUPONS (COUP_NAME, COUP_TOTAL, COUP_LEFT, COUP_PRICE, COUP_CATNAME, COUP_VENDOR, COUP_DESC, COUP_IMGLOC, COUP_EXPR)
	VALUES ('Flight to Hawaii',35,35,199.99,'Travel','Hawaiian Airlines','Are you getting bored and/or tired of work? Then you need a Vacation! Fly Hawaiian Airlines to Hawaii with your family for ten days of relaxation and fun. We are fast, friendly, and cheap so join us on your trip to Hawaii. Other companies get you there but we get you there without hassle, your choice. Other offers: 299.99. Fly Hawaiian Airlines Now!', '../images/coupons/hawaiianair.jpg', '2012-06-05 11:59PM');
INSERT INTO COUPONS (COUP_NAME, COUP_TOTAL, COUP_LEFT, COUP_PRICE, COUP_CATNAME, COUP_VENDOR, COUP_DESC, COUP_IMGLOC, COUP_EXPR)
	VALUES ('Krispy Kreme Glazed Doughnuts',75,75,5.99,'Food','Krispy Kreme','Are you hungry? Yes, skip a few sentences. No, continue reading. Krispy Kreme has been making doughnuts since 1937. We know how to make them doughnuts. We make them doughnuts delicious, mouth-watering, and warm. Are you hungry now? I hope so because we have two dozen Krispy Kreme glazed doughnuts for a discounted price. Available for everyone including the Police. Original Price: $7.99 each. Come and get your doughnuts.', '../images/coupons/kkd.jpg', '2012-06-05 11:59PM');
INSERT INTO COUPONS (COUP_NAME, COUP_TOTAL, COUP_LEFT, COUP_PRICE, COUP_CATNAME, COUP_VENDOR, COUP_DESC, COUP_IMGLOC, COUP_EXPR)
	VALUES ('The Legend of Zelda',20,20,19.99,'Gaming','Nintendo','Love games? Have no life? I guess not because you are reading this description. Kidding aside, Zelda is a classic Japanese RPG that has touched the hearts of many generations worldwide. We here with a classic Zelda game remake for the 3DS platform at a exclusive price for those young and old to reminisce.', '../images/coupons/lozelda.jpg', '2012-06-05 11:59PM');
INSERT INTO COUPONS (COUP_NAME, COUP_TOTAL, COUP_LEFT, COUP_PRICE, COUP_CATNAME, COUP_VENDOR, COUP_DESC, COUP_IMGLOC, COUP_EXPR)
	VALUES ('Gears of War 3',25,25,17.99,'Gaming','Epic Games','Is it the end of the world? Are muscular monsters with rifles knocking on your front door? Well great, we have just the game for you to immerse yourself in a reality of gory action where you either brutally kill monsters or get brutally killed.', '../images/coupons/gow3.jpg', '2012-06-05 11:59PM');
INSERT INTO COUPONS (COUP_NAME, COUP_TOTAL, COUP_LEFT, COUP_PRICE, COUP_CATNAME, COUP_VENDOR, COUP_DESC, COUP_IMGLOC, COUP_EXPR)
	VALUES ('Large Hadron Collider',1,1,9000000000.00,'Science','Scientists','Did you ever want to win the science fair? Have you ever wondered what would happen if you smashed multiple particles together at an extremely high velocity? Well now, you can! The Large Hadron Collider that you purchase will be an exact replica of the LHC built and operated by the European Organization for Nuclear Research (CERN). The LHC will lie in a tunnel that is 27 kilometers in circumference. Note that the LHC operates at operates at approximately 1.12 microjoules per nucleon. Original Price: Contact us for details. Buy an LHC and become the next famous scientist.', '../images/coupons/hadroncollider.jpg', '2012-06-05 11:59PM');
INSERT INTO COUPONS (COUP_NAME, COUP_TOTAL, COUP_LEFT, COUP_PRICE, COUP_CATNAME, COUP_VENDOR, COUP_DESC, COUP_IMGLOC, COUP_EXPR)
	VALUES ('M1A2 TUSK Abrams Tank',12,12,6100000.00,'Military','General Dynamics Land Systems','Named after General Creighton Abrams, the M1 is a highly mobile and heavily armored third generation main battle tank. Weighing at nearly 62 metric tons and a maximum speed of 35mph, this colossal beast can quickly change the outcome on a battlefield. Its primary and secondary armaments include a 105mm rifled cannon, 120mm smoothbore cannon, .50-cal machine gun that makes most enemies back down without a fight. Background checks may apply. Original price: $6.21 million. Get this and win some more battles.', '../images/coupons/m1abrams.png', '2012-06-05 11:59PM');
INSERT INTO COUPONS (COUP_NAME, COUP_TOTAL, COUP_LEFT, COUP_PRICE, COUP_CATNAME, COUP_VENDOR, COUP_DESC, COUP_IMGLOC, COUP_EXPR)
	VALUES ('F-22 Raptor',15,15,145000000,'Military','Lockheed Martin','The F-22 Raptor is a Stealth Air Superiority Strike Fighter that dominates the sky, war or not. Its stealth armor prevents most enemies to know what is happening until its already too late. Its thrust vectoring makes the F-22 Raptor outmaneuvers any and all other fighter jets. Its top speed of Mach 2.25 (1500 mph) and multiple armaments means that it has very little competition. Background checks required. Original price: $150 million. Get it now and own the sky!', '../images/coupons/f22.jpg', '2012-06-05 11:59PM');
INSERT INTO COUPONS (COUP_NAME, COUP_TOTAL, COUP_LEFT, COUP_PRICE, COUP_CATNAME, COUP_VENDOR, COUP_DESC, COUP_IMGLOC, COUP_EXPR)
	VALUES ('USS John F. Kennedy CVN-79',1,1,9000000000.00,'Military',' Northrop Grumman Shipbuilding','We sell the F-22 to dominate the skies. We sell the M1A2 Abrams to dominate the land. Now we are pleased to announce that we are selling the new Ford-class super aircraft super carrier, USS <i>John F. Kennedy</i>. Weighing in at 100,000 tons, this behemoth is powered by two nuclear reactors that moves it at approx. 30 knots and almost unlimited range and can hold more than 75 aircrafts. Its armaments include surface-to-air missiles and other close-in weapons systems, details are classified. Background checks required. Original price: $14 million. Get it now and own the seas!', '../images/coupons/cvn78.jpg', '2012-06-05 11:59PM');
INSERT INTO COUPONS (COUP_NAME, COUP_TOTAL, COUP_LEFT, COUP_PRICE, COUP_CATNAME, COUP_VENDOR, COUP_DESC, COUP_IMGLOC, COUP_EXPR)
	VALUES ('Hasselblad H4D-60',4,4,39995,'Photography','Hasselblad USA','The Hasselblad H4D-60 is probably the most expensive digital camera in the world. This DSLR camera has an astonishing 60 megapixel 40 x 54 mm sensor. Aided by the Absolute Position Lock processor, Hasselblad&apos;s True Focus system allows the photographer to focus on the composition without constantly fiddling with the focus. The camera has a capture rate of 1.4 seconds per capture and shutter speed ranges from an 800th of a second to 32 seconds. Original Price: $41,995', '../images/coupons/hasselbladH4D-60.jpg', '2012-06-05 11:59PM');







