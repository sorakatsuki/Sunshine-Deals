INSERT INTO LOCATIONS (LOC_NAME, LOC_STATE, LOC_ZIP) VALUES ('Union City','CA',94587);
INSERT INTO LOCATIONS (LOC_NAME, LOC_STATE, LOC_ZIP) VALUES ('Fremont','CA',94536);
INSERT INTO LOCATIONS (LOC_NAME, LOC_STATE, LOC_ZIP) VALUES ('Santa Clara','CA',95192);

INSERT INTO ACCOUNTS (ACCT_NAME, ACCT_PASS, ACCT_EMAIL, ACCT_SQUEST, ACCT_SANSER, ACCT_LOC) VALUES ('Bob',SHA1(MD5('magic133')), 'bob@se133.com', 'Who is your best friend?', SHA1(MD5('Google')), 1);
INSERT INTO ACCOUNTS (ACCT_NAME, ACCT_PASS, ACCT_EMAIL, ACCT_SQUEST, ACCT_SANSER, ACCT_LOC) VALUES ('Joe',SHA1(MD5('magic133')), 'joe@se133.com', 'Who is your best friend?', SHA1(MD5('Jane')), 2);
INSERT INTO ACCOUNTS (ACCT_NAME, ACCT_PASS, ACCT_EMAIL, ACCT_SQUEST, ACCT_SANSER, ACCT_LOC) VALUES ('Jane',SHA1(MD5('magic133')), 'jane@se133.com', 'Who is your best friend?', SHA1(MD5('Joe')), 2);
INSERT INTO ACCOUNTS (ACCT_NAME, ACCT_PASS, ACCT_EMAIL, ACCT_SQUEST, ACCT_SANSER, ACCT_LOC) VALUES ('Zelda',SHA1(MD5('magic133')), 'zelda@se133.com', 'Who is your best friend?', SHA1(MD5('No one')), 3);

INSERT INTO COUPONS (COUP_NAME, COUP_TOTAL, COUP_LEFT, COUP_PRICE, COUP_CATNAME, COUP_VENDOR, COUP_DESC, COUP_EXPR) VALUES ('Car Part',10,10,49.99,'Automotive','Vendor 1','Coupon desc goes here: It does something to someone that makes someone else happy or at least that someone hopes so!', '2012-05-30 23:59:59');
INSERT INTO COUPONS (COUP_NAME, COUP_TOTAL, COUP_LEFT, COUP_PRICE, COUP_CATNAME, COUP_VENDOR, COUP_DESC, COUP_EXPR) VALUES ('Baby Stuff',10,10,49.99,'Family Care','Vendor 2','Coupon desc goes here: It does something to someone that makes someone else happy or at least that someone hopes so!', '2012-05-30 23:59:59');
INSERT INTO COUPONS (COUP_NAME, COUP_TOTAL, COUP_LEFT, COUP_PRICE, COUP_CATNAME, COUP_VENDOR, COUP_DESC, COUP_EXPR) VALUES ('Travel Abroad',10,10,49.99,'Travel','Vendor 3','Coupon desc goes here: It does something to someone that makes someone else happy or at least that someone hopes so!', '2012-05-30 23:59:59');
INSERT INTO COUPONS (COUP_NAME, COUP_TOTAL, COUP_LEFT, COUP_PRICE, COUP_CATNAME, COUP_VENDOR, COUP_DESC, COUP_EXPR) VALUES ('Spicy Food Thingy',10,10,49.99,'Food','Vendor 4','Coupon desc goes here: It does something to someone that makes someone else happy or at least that someone hopes so!', '2012-05-30 23:59:59');
INSERT INTO COUPONS (COUP_NAME, COUP_TOTAL, COUP_LEFT, COUP_PRICE, COUP_CATNAME, COUP_VENDOR, COUP_DESC, COUP_EXPR) VALUES ('Sofas',10,10,49.99,'Living','Vendor 5','Coupon desc goes here: It does something to someone that makes someone else happy or at least that someone hopes so!', '2012-05-30 23:59:59');

INSERT INTO CART (CART_ID, CART_ACCT_ID, CART_COUP_ID, CART_NUMB) VALUES (0,1,3,4);
INSERT INTO CART (CART_ID, CART_ACCT_ID, CART_COUP_ID, CART_NUMB) VALUES (0,1,1,3);
INSERT INTO CART (CART_ID, CART_ACCT_ID, CART_COUP_ID, CART_NUMB) VALUES (1,2,1,2);
INSERT INTO CART (CART_ID, CART_ACCT_ID, CART_COUP_ID, CART_NUMB) VALUES (1,2,5,2);
INSERT INTO CART (CART_ID, CART_ACCT_ID, CART_COUP_ID, CART_NUMB) VALUES (2,3,2,6);
