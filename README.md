# FV Technical Assignment


## Challenge 1

To answer the first challenge , I have created 3 Table which consist below :  

```mysql
create table product
(
    id            bigint unsigned auto_increment
        primary key,
    product_name  varchar(50)   not null,
    product_qty   int           not null,
    product_price decimal(9, 2) not null,
    created_at    timestamp     null,
    updated_at    timestamp     null
)
    collate = utf8mb4_unicode_ci;
```

```mysql
create table `order`
(
    id         bigint unsigned auto_increment
        primary key,
    user       varchar(20)   not null,
    product_id int           not null,
    amount     decimal(9, 2) not null,
    qty        int           not null,
    created_at timestamp     null,
    updated_at timestamp     null
)
    collate = utf8mb4_unicode_ci;

create index order_product_id_index
    on `order` (product_id);

```

```mysql
create table items
(
    id         varchar(10) not null
        primary key,
    product_id int         not null,
    order_id   int         null,
    created_at timestamp   null,
    updated_at timestamp   null
)
    collate = utf8mb4_unicode_ci;

create index items_order_id_index
    on items (order_id);

create index items_product_id_index
    on items (product_id);


```

As you can see from the table above.

When the user click the checkout at the same time , the first thing the it will do is check if the 
current stock for the selected product is still available or not. If the stock is still available, then 
proceed to perform another checking which is if the requested quantity is available with the current stock.

If the requested quantity is more than the current stock , the checkout part will be stop here and return as 
Product stock is not enough.

If the requested quantity meets the requirement of the stock , then it will create one data in the Order table
and then will also update the Product table to reduce the current stock by the requested quantity. 

After the program update the Product stock, then based on how much the requested quantity is the Item table will
be updated , the logic is to get the list of item based on the selected product and mark it as sold by fill up the
Order ID in the column order_id on table Items.


## Usage

```bash
php artisan migrate

php artisan db:seed

./vendor/bin/phpunit --filter 'Tests\\Feature'

```

## Challenge 2

```mysql

select d.driver_id                                                           as driver_id,
       COUNT(CASE WHEN (state = 'COMPLETED') THEN 1 END)                     as number_of_completed_rides,
       COUNT(CASE WHEN (state like 'CANCELLED%') THEN 1 END)                 as number_of_cancelled_rides,
       COUNT(DISTINCT CASE WHEN (state = 'COMPLETED') THEN passenger_id END) as number_of_unique_passengers,
       SUM(CASE WHEN state = 'COMPLETED' THEN b.fare END) as total_fare,
       SUM(CASE WHEN state = 'COMPLETED' THEN ROUND((b.fare * 20)/100,2) END) as total_commission
from bookings as b
         join drivers d on b.driver_id = d.driver_id
where (email like 'fvdrive%' or email like 'fvtaxi%')
group by b.driver_id
;

```

Above are the SQL that I write to perform the test. I use `DB` facades and using `Query Builder` 
instead of the `Eloquent`

## Challenge 3

Regarding the challenge 3 , what I have done on the code is to combine all the addresses first,
and then divide by whitespace to an Array , and will input one by one to the specific Address array.

The test unit is written in the Feature folder.
