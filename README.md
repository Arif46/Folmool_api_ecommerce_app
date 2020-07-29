## Create New Category

**Endpoint:** http://127.0.0.1:8000/api/create_category
**Description:** After hitting the URL using POST method in postman set respective key and value pairs:
- name (text)
- description (text)
- is_available (boolean)
- thumbnail (file)
If everything is okay then it store the newly created category to the database.
=================================================================================================
## View Category list
**Endpoint:** http://127.0.0.1:8000/api/category_list
**Description:** After hitting the URL using GET method in postman.
        If everything is okay then it show the all category list.
=============================================================================================

## Edit Category
**Endpoint:** http://127.0.0.1:8000/api/category_edit/{id}
**Description:** After hitting the URL using POST method in postman set respective key and value pairs:
- name (text)
- description (text)
- is_available (boolean)
- thumbnail (file)
 If everything is okay then it update  category to the database.
================================================================================

## delete Category
 Endpoint:** http://127.0.0.1:8000/api/category_Delete/{id}
 **Description:** After hitting the URL using delete method in postman .
 If everything is okay then it delete category to the database.

=================================================================================================
## Create product class
 **Endpoint:** http://127.0.0.1:8000/api/productclass_create
**Description:** After hitting the URL using POST method in postman set respective key and value pairs:
- category_id (integer)
- name (text)
- description(text)
- is_available (boolean)
- thumbnail (file)
- is_in_stock(boolean)
If everything is okay then it store the newly created product class to the database.
=================================================================================================
## View Category list
**Endpoint:** http://127.0.0.1:8000/api/productclass_View/{id}
**Description:** After hitting the URL using GET method in postman
        If everything is okay then it show the all product class list

=================================================================================================

## Edit product class
 **Endpoint:** http://127.0.0.1:8000/api/productclass_edit/{id}
**Description:** After hitting the URL using POST method in postman set respective key and value pairs:
- category_id (integer)
- name (text)
- description(text)
- is_available (boolean)
- thumbnail (file)
- is_in_stock(boolean)
If everything is okay then it updated product class to the database.

=================================================================================================

## delete Category
 Endpoint:** http://127.0.0.1:8000/api/productclass_Delete/{id}
 **Description:** After hitting the URL using delete method in postman
 If everything is okay then it delete product class to the database.

=================================================================================================

## Create product
 **Endpoint:** http://127.0.0.1:8000/api/product_create

**Description:** After hitting the URL using POST method in postman set respective key and value pairs:
- product_class_id (integer)
- name (text)
- description(text)
- is_available (boolean)
- thumbnail (file)
- is_in_stock(boolean)
- available_stock(boolean)

If everything is okay then it store the newly created product to the database.

=================================================================================================

## View product list
**Endpoint:** http://127.0.0.1:8000/api/product_View/{id}

**Description:** After hitting the URL using GET method in postman
        If everything is okay then it show the all product list

=================================================================================================

## Edit product
 **Endpoint:** http://127.0.0.1:8000/api/product_edit/{id}

**Description:** After hitting the URL using POST method in postman set respective key and value pairs:
- product_class_id (integer)
- name (text)
- description(text)
- is_available (boolean)
- thumbnail (file)
- is_in_stock(boolean)
- available_stock(boolean)

If everything is okay then it update product to the database.
=================================================================================================

## delete product
 Endpoint:** http://127.0.0.1:8000/api/product_Delete/{id}
 **Description:** After hitting the URL using delete method in postman
 If everything is okay then it delete product  to the database.
=================================================================================================

## Create item category
 **Endpoint:** http://127.0.0.1:8000/api/itemcategory_create

**Description:** After hitting the URL using POST method in postman set respective key and value pairs:

- name (text)
If everything is okay then it store the newly created item category to the database.
=================================================================================================

## View item category list
**Endpoint:** http://127.0.0.1:8000/api/itemcategory_View

**Description:** After hitting the URL using GET method in postman
        If everything is okay then it show the all item category  list
=================================================================================================

## Edit item category
 **Endpoint:** http://127.0.0.1:8000/api/itemcategory_edit/{id}

**Description:** After hitting the URL using POST method in postman set respective key and value pairs:

- name (text)
If everything is okay then it update item category to the database.
=================================================================================================

## delete item category
 Endpoint:** http://127.0.0.1:8000/api/itemcategory_Delete/{id}
 **Description:** After hitting the URL using delete method in postman
 If everything is okay then it delete item category  to the database.
=================================================================================================

## Create item
 **Endpoint:** http://127.0.0.1:8000/api/item_create

**Description:** After hitting the URL using POST method in postman set respective key and value pairs:

- product_id(integer)
- item_category_id(integer)
- details(text)
- old_price(integer)
- new_price(integer)
-  is_available (boolean)
- is_in_stock(boolean)
If everything is okay then it store the newly created item  to the database.

=================================================================================================

## View item  list
**Endpoint:** http://127.0.0.1:8000/api/item_View/{id}

**Description:** After hitting the URL using GET method in postman.
        If everything is okay then it show the all item  list
=================================================================================================

## Edit item
 **Endpoint:** http://127.0.0.1:8000/api/item_edit/{id}

**Description:** After hitting the URL using POST method in postman set respective key and value pairs:

- product_id(integer)
- item_category_id(integer)
- details(text)
- old_price(integer)
- new_price(integer)
-  is_available (boolean)
- is_in_stock(boolean)
If everything is okay then it update item  to the database.
=================================================================================================
## delete item
 Endpoint:** http://127.0.0.1:8000/api/item_delete/{id}
 **Description:** After hitting the URL using delete method in postman .
 If everything is okay then it delete item   to the database.
=================================================================================================
## Address create

Endpoint: **http://127.0.0.1:8000/api/address_create
**Description:** After hitting the URL using POST method in postman set respective key and value pairs:

- user_id(integer)
- address(string)
- city(string)
- postal_code(integer)
- zone(string)
If everything is okay then it store the newly created address  to the database.
=====================================================================================================
## View address

**Endpoint:** http://127.0.0.1:8000/api/address/{id}

**Description:** After hitting the URL using GET method in postman. and id = user_id
        If everything is okay then it show the all address list
=============================================================================================
## referral create

Endpoint: **http://127.0.0.1:8000/api/referral_create

**Description:** After hitting the URL using POST method in postman set respective key and value pairs:

- title(string)
- amount(integer)
- code(integer)
- user_id_from(string)
- user_id_to(string)
-  is_valid(integer)
If everything is okay then it store the newly created referral code  to the database.
=================================================================================================
##  referral view

**Endpoint:** http://127.0.0.1:8000/api/referral/{id}

**Description:** After hitting the URL using GET method in postman.
        If everything is okay then it show the all referral list
=============================================================================================
## payment create

Endpoint: **http://127.0.0.1:8000/api/payment_create

**Description:** After hitting the URL using POST method in postman set respective key and value pairs:

- payment_method(string)
-payment_status(integer)
- payment_time(integer)
If everything is okay then it store the newly created payment to the database.
===================================================================================================
##  payment view

**Endpoint:** http://127.0.0.1:8000/api/payment/{id}

**Description:** After hitting the URL using GET method in postman.
        If everything is okay then it show the all payment list
=================================================================================================
## shipment create

Endpoint: **http://127.0.0.1:8000/api/shipment_create

**Description:** After hitting the URL using POST method in postman set respective key and value pairs:

- order_id(integer)
-name(string)
- phone(text)
- email(email)
If everything is okay then it store the newly created shipment to the database.
==================================================================================================
##  shipment view

**Endpoint:** http://127.0.0.1:8000/api/shipment/{id}

**Description:** After hitting the URL using GET method in postman.
        If everything is okay then it show the all shipment list
=====================================================================================================
## Order create

Endpoint: **http://127.0.0.1:8000/api/order_create

**Description:** After hitting the URL using POST method in postman set respective key and value pairs: The order table and the order_item table will create data together
 **order table**
- customer_id(integer)
-payment_id(integer)
- sub-total(integer)
- vat(integer)
- referral_code(integer)
 - promo_code(integer)
- shipping_charge(integer)
 - delivery_man_id(integer)
 - notes(string)
 - shipping_id(integer)
- shipping_date(date_time)
- delivery_date(email)
- status(string)
- date_time(date_time)
**order_items table**
- order_id(integer)
- item_id(integer)
- quantity(integer)
-
If everything is okay then it store the newly created order and order_item to the database.

=====================================================================================================
## Pending-Order
Endpoint: **http://127.0.0.1:8000/api/pending-order/{id}

**Description:** After hitting the URL using GET method in postman.
If you search here with delivery_man_id, you will find the pending order
        If everything is okay then it show the all pending-order list
=================================================================================================
## complete-Order

Endpoint: **http://127.0.0.1:8000/api/complete-order/{id}
**Description:** After hitting the URL using GET method in postman.
If you search here with delivery_man_id, you will find the complete order
        If everything is okay then it show the all complete-order list
==================================================================================================
## total deliveries,Area,cash to collect

Endpoint: **http://127.0.0.1:8000/api/total-deliveriesAreacash/{delivery_man_id}

**Description:** After hitting the URL using GET method in postman.
If you search here with delivery_man_id, you can find out how many deliveries, how many places have been delivered, how much money is being collected for a Delivery Man.
        If everything is okay then it show the total deliveries,total Area,total cash collect

====================================================================================================
## delivery_date
Endpoint: ** http://127.0.0.1:8000/api/delivery_date/{id}
**Description:** After hitting the URL using GET method in postman.
If you search with delivery date, you will see what date the order was placed
        If everything is okay then it show the all order
=====================================================================================================
## collection

Endpoint: ** http://127.0.0.1:8000/api/collection/{id}

**Description:** After hitting the URL using GET method in postman.
If you search with delivery_man_id,shows the total field with delivery date
If everything is okay then it show the  order table total field and delivery_date
===========================================================================
