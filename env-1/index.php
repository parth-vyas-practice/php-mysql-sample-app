<?php

	$host       = getenv("DEMO_HOSTNAME");
        $username   = getenv("DEMO_USERNAME");
        $password   = getenv("DEMO_PASSWORD");
        $dbname     = getenv("DEMO_DBNAME");


echo nl2br ($host . "\n" );
echo nl2br ($dbname . "\n");
echo nl2br ($username);
?> 
