<?php
require_once('.env.php');

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt create table query execution
$sql = "CREATE TABLE cities(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    state VARCHAR(30) NULL,
    country VARCHAR(30) NULL
)";

if(mysqli_query($link, $sql)){
    echo "Table CITIES created successfully.\n";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Attempt create table query execution
$sql = "CREATE TABLE companies(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL
)";

if(mysqli_query($link, $sql)){
    echo "Table COMPANIES created successfully.\n";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Attempt create table query execution
$sql = "CREATE TABLE emploi(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(30) NOT NULL,
    company_id INT NOT NULL,
    city_id INT NOT NULL,
    teams_ind TINYINT(1) NOT NULL,
    date_posted DATE NOT NULL DEFAULT sysdate(),

    FOREIGN KEY (company_id)
        REFERENCES companies(id)
        ON UPDATE CASCADE ON DELETE RESTRICT,

    FOREIGN KEY (city_id)
        REFERENCES cities(id)
        ON UPDATE CASCADE ON DELETE RESTRICT
)";

if(mysqli_query($link, $sql)){
    echo "Table EMPLOI created successfully.\n";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
