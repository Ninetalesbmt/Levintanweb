<?php

require 'controller/levintanController.php';
$levintanController = new levintanController();

if(isset($_POST['types']))
{
    //Fill page with coffees of the selected type
    $levintanTables = $levintanController->CreatelevintanTables($_POST['types']);
}
else 
{
    //Page is loaded for the first time, no type selected -> Fetch all types
    $levintanTables = $levintanController->CreatelevintanTables('%');
}

//Output page data
$title = 'levintan overview';
$content = $levintanController->CreatelevintanDropdownList(). $levintanTables;

include 'template.php';
?>