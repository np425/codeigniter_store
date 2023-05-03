<?=$this->include('_partials/header')?>

<h1>Project made with CodeIgniter 4 by Nerijus Pocevičius</h1>

<h2>Sql Code</h2>
<pre>
create table products
(
    id          int auto_increment
        primary key,
    name        varchar(24) charset utf8mb3                            not null,
    brand       varchar(100) charset utf8mb3  default 'No brand'       not null,
    description varchar(1024) charset utf8mb3 default 'No description' not null,
    cost        decimal(10, 2)                                         not null,
    amount      int                           default 1                not null,
    category    varchar(50) charset utf8mb3   default 'No category'    not null,
    check (`cost` >= 0),
    check (`amount` >= 0)
);

create index amount
    on products (amount);

create index brand
    on products (brand);

create index category
    on products (category);

create index cost
    on products (cost);

create index description
    on products (description);

create table users
(
    id       int auto_increment
        primary key,
    name     varchar(1024) charset utf8mb3 not null,
    email    varchar(1024) charset utf8mb3 not null,
    password varchar(1024) charset utf8mb3 not null,
    money    decimal(10, 2)                null,
    check (`money` >= 0)
);

create table orders
(
    id             int auto_increment
        primary key,
    user_id        int                                                      not null,
    product_id     int                                                      not null,
    product_cost   decimal(10, 2)                                           not null,
    product_amount int                                                      not null,
    order_date     datetime                     default current_timestamp() not null,
    order_state    varchar(100) charset utf8mb3 default 'Reserved'          not null,
    constraint orders_ibfk_1
        foreign key (user_id) references users (id),
    constraint orders_orders__fk
        foreign key (product_id) references products (id),
    check (`product_cost` >= 0),
    check (`product_amount` > 0)
);

create index order_date
    on orders (order_date);

create index order_state
    on orders (order_state);

create index user_id
    on orders (user_id, product_id);

create definer = np@localhost trigger delete_orders_update_money
    before delete
    on orders
    for each row
    UPDATE users u SET u.money = u.money + OLD.product_amount * OLD.product_cost WHERE u.id = OLD.user_id;

create definer = np@localhost trigger delete_orders_update_products
    before delete
    on orders
    for each row
    UPDATE products p SET p.amount = p.amount + OLD.product_amount WHERE p.id = OLD.product_id;

create definer = np@localhost trigger insert_orders_update_money
    before insert
    on orders
    for each row
    UPDATE users u SET u.money = u.money - NEW.product_amount * NEW.product_cost WHERE u.id = NEW.user_id;

create definer = np@localhost trigger insert_orders_update_products
    before insert
    on orders
    for each row
    UPDATE products p SET p.amount = p.amount - NEW.product_amount WHERE p.id = NEW.product_id;

create definer = np@localhost trigger update_orders_update_money
    before update
    on orders
    for each row
BEGIN
    UPDATE users u SET u.money = u.money + OLD.product_amount * OLD.product_cost WHERE u.id = OLD.user_id;
    UPDATE users u SET u.money = u.money - NEW.product_amount * NEW.product_cost WHERE u.id = NEW.user_id;
end;

create definer = np@localhost trigger update_orders_update_products
    before update
    on orders
    for each row
BEGIN
    UPDATE products p SET p.amount = p.amount + OLD.product_amount WHERE p.id = OLD.product_id;
    UPDATE products p SET p.amount = p.amount - NEW.product_amount WHERE p.id = NEW.product_id;
END;

create table shopping_carts
(
    id             int auto_increment
        primary key,
    user_id        int not null,
    product_id     int not null,
    product_amount int not null,
    constraint product_id
        unique (product_id, user_id),
    constraint shopping_carts_ibfk_1
        foreign key (user_id) references users (id),
    constraint shopping_carts_ibfk_2
        foreign key (product_id) references products (id),
    check (`product_amount` > 0)
);

create index user_id
    on shopping_carts (user_id, product_id);

create index email
    on users (email);

create index money
    on users (money);

create index name
    on users (name);
</pre>

<?=$this->include('_partials/footer')?>
