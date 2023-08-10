<?php

namespace cli;
require 'config/define.php';

spl_autoload_register(function ($name) {
    $name = ltrim($name, "\\");
    $name = str_replace("\\", "/", $name);
    $filepath = $name . '.php';
    if (file_exists( ROOT . $filepath)) {
        require_once ROOT . $filepath;
    } 
    else {
        echo "class не обнаружен {$filepath}";
    }
});

//'php cli/cli.php --filename="UserTable" -c="create"'  
//'php cli/cli.php --filename="UserTable" -c="update"'  
$short_options = "f:c:"; //: обязательно  :: не обязательно
$long_options = ["filename:", "command:"];
$options = getopt($short_options, $long_options);
if (isset($options["f"]) || isset($options["filename"])) {
    $filename = isset($options["f"]) ? $options["f"] : $options["filename"];
}
if (isset($options["c"]) || isset($options["command"])) {
    $command = isset($options["c"]) ? $options["c"] : $options["command"];
}

if ($filename && file_exists(__DIR__ . "/" . $filename . '.php')) {
    $class = "\\cli\\" . $filename;
    $i = new $class();
    if (method_exists($i, $command)) {
        if ($i->$command()) {
            echo "class {$filename} method {$command} выполнен успешно \n";
        }
    } else {
        echo "class {$filename} method {$command} отсутстувет ";
    }
} else {
    echo "class {$filename} не обнаружен";
}
