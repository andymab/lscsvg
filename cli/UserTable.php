<?php

namespace cli;

use libs\Database;

class UserTable extends Database
{
    public function create()
    {
        $sql = "CREATE TABLE Users (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            email VARCHAR(50),
            psswd VARCHAR(255),
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
        return $this->command($sql, 'create');
    }

    public function drop()
    {
        $sql = "DROP TABLE MyGuests";
        return $this->command($sql, 'drop');
    }

}
