<?php
require './Controller/levintanController.php';
$levintanController = new levintanController();

$title = "Add a new paint";

$content ="<form action='' method='post'>
    <fieldset>
        <legend>Add a new paint</legend>
        <label for='name'>Name: </label>
        <input type='text' class='inputField' name='txtName' /><br/>

        <label for='type'>Type: </label>
        <select class='inputField' name='ddlType'>
            <option value='%'>All</option>"
        .$levintanController->CreateOptionValues($levintanController->GetlevintanTypes()).
        "</select><br/>

        <label for='year'>year: </label>
        <input type='text' class='inputField' name='txtyear' /><br/>

        <label for='country'>Country: </label>
        <input type='text' class='inputField' name='txtCountry' /><br/>

        <label for='image'>Image: </label>
        <select class='inputField' name='ddlImage'>"
        .$levintanController->GetImages().
        "</select></br>

        <label for='review'>Review: </label>
        <textarea cols='70' rows='12' name='txtReview'></textarea></br>

        <input type='submit' value='Submit'>
    </fieldset>
</form>";


if(isset($_POST["txtName"]))
{
    $levintanController->Insertlevintan();
}
include './Template.php';
?>
