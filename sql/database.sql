create database login_register;
Use login_register;

create table users(
    id int auto_increment primary key,
    name varchar(50) not null,
    username varchar(50) not null unique,
    email varchar(255) not null unique,
    password varchar(255) not null,
    created_at timestamp default current_timestamp 
);