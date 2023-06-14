<?php

$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername,$username,$password);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE DATABASE jojoe";
if (mysqli_query($conn, $sql)) {
  echo "Database Jojoe created successfully";
} else {
  echo "Error creating database: " . mysqli_error($conn);
}

require_once("config.php");

$user = "CREATE TABLE user(
    user_id VARCHAR(10) NOT NULL,
    user_email VARCHAR(40),
    user_name VARCHAR(30),
    user_phonenumber VARCHAR(12),
    user_matricno VARCHAR(10),
    user_address VARCHAR(30),
    user_level INT(3) NOT NULL,
    user_password VARCHAR(20) NOT NULL,
    CONSTRAINT user_pk PRIMARY KEY(user_id))";

$menu = "CREATE TABLE menu(
    menu_img MEDIUMBLOB NOT NULL,
    menu_code VARCHAR(10) NOT NULL,
    menu_name VARCHAR(30) NOT NULL,
    menu_price FLOAT(8) NOT NULL,
    menu_description VARCHAR(200) NOT NULL,
    CONSTRAINT menu_pk PRIMARY KEY(menu_code))";

$payment = "CREATE TABLE payment(
  order_no VARCHAR(8) NOT NULL,
  user_id VARCHAR(10) NOT NULL,
  payment_no VARCHAR(10) NOT NULL,
  payment_status VARCHAR(15) NOT NULL,
  payment_amount FLOAT(8) NOT NULL,
  payment_date DATE NOT NULL,
  CONSTRAINT makeorder_pk PRIMARY KEY(order_no),
  CONSTRAINT mo_fk FOREIGN KEY (user_id) REFERENCES user(user_id))";

$orders = "CREATE TABLE orders(
    order_no VARCHAR(8) NOT NULL,
    order_date DATE NOT NULL,
    menu_code VARCHAR(4) NOT NULL,
    order_quantity INT(4) NOT NULL,
    total_price FLOAT(8) NOT NULL,
    delivery_date DATE NOT NULL,
    delivery_status VARCHAR(15) NOT NULL,
    CONSTRAINT order_pk PRIMARY KEY(order_no, menu_code),
    CONSTRAINT od_fk FOREIGN KEY (menu_code) REFERENCES menu(menu_code),
    CONSTRAINT order_fk FOREIGN KEY (order_no) REFERENCES payment(order_no))";



if (mysqli_query($conn, $user)) {
    echo "Table user created successfully";
  } else {
    echo "Error creating table: " . mysqli_error($conn);
  }

if (mysqli_query($conn, $menu)) {
    echo "Table menu created successfully";
  } else {
    echo "Error creating table: " . mysqli_error($conn);
  }
 
  if (mysqli_query($conn, $payment)) {
    echo "Table payment created successfully";
  } else {
    echo "Error creating table: " . mysqli_error($conn);
  }

if (mysqli_query($conn, $orders)) {
    echo "Table order created successfully";
  } else {
    echo "Error creating table: " . mysqli_error($conn);
  }

 
  
mysqli_close($conn);
?>