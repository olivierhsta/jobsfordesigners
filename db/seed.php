<?php
require_once('.env.php');

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt insert query execution
$sql = "INSERT INTO cities
            (id,name,state,country)
        VALUES
            (1, 'Palo Alto',null,'USA'),
            (2, 'Austin',null,'USA'),
            (3, 'Madison', 'WI','USA'),
            (4, 'San Fransisco', 'CA','USA'),
            (5, 'Berlin', null,'GER'),
            (6, 'Remote', null,null),
            (7, 'Montreal', 'QC','CAN')
        ;";

if(mysqli_query($link, $sql)){
    echo "Table CITIES seeded successfully.\n";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Attempt insert query execution
$sql = "INSERT INTO companies
            (id,name)
        VALUES
            (1, 'Idean'),
            (2, 'EatStreet'),
            (3, 'NerdWallet'),
            (4, 'Zalando SE')
        ;";

if(mysqli_query($link, $sql)){
    echo "Table COMPANIES seeded successfully.\n";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Attempt insert query execution
$sql = "INSERT INTO emploi
            (title,company_id,city_id,teams_ind,date_posted)
        VALUES
            ('Visual Designer',1,1,1,'2020-02-12'),
            ('Senior Interaction Designer',1,2,1,'2020-02-12'),
            ('Senior VIsual Designer',1,1,1,'2020-02-12'),
            ('Web Designer',2,3,0,'2020-02-12'),
            ('Senior Product Designer',3,4,0,'2020-02-12'),
            ('Visual UI Designer',4,5,0,'2020-02-12'),
            ('Software Engineer',1,7,1,'2020-02-01'),
            ('Programmer',3,6,1,'2020-02-01'),
            ('Graphic Designer',2,6,0,'2020-02-01'),
            ('Quantum Physicist',2,7,1,'2020-02-01')
        ;";

if(mysqli_query($link, $sql)){
    echo "Table EMPLOI seeded successfully.\n";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
