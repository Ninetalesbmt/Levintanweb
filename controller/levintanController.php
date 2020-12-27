<?php

require ("model/levintanmodel.php");

//Contains non-database related function for the Coffee page
class levintanController {

    function CreatelevintanDropdownList() {
        $levintanModel = new levintanModel();
        $result = "<form action = '' method = 'post' width = '200px'>
                    Please select a type: 
                    <select name = 'types' >
                        <option value = '%' >All</option>
                        " . $this->CreateOptionValues($levintanModel->GetlevintanTypes()) .
                "</select>
                     <input type = 'submit' value = 'Search' />
                    </form>";

        return $result;
    }

    function CreateOptionValues(array $valueArray) {
        $result = "";

        foreach ($valueArray as $value) {
            $result = $result . "<option value='$value'>$value</option>";
        }

        return $result;
    }
    
    function CreatelevintanTables($types)
    {
        $levintanModel = new levintanModel();
        $levintanArray = $levintanModel->GetlevintanByType($types);
        $result = "";
        
        //Generate a coffeeTable for each coffeeEntity in array
        foreach ($levintanArray as $key => $levintan) 
        {
            $result = $result .
                    "<table class = 'levintanTable'>
                        <tr>
                            <th rowspan='6' width = '150px' ><img runat = 'server' src = '$levintan->image' /></th>
                            <th width = '75px' >Name: </th>
                            <td>$levintan->name</td>
                        </tr>
                        
                        <tr>
                            <th>Type: </th>
                            <td>$levintan->type</td>
                        </tr>
                        
                        <tr>
                            <th>Year: </th>
                            <td>$levintan->year</td>
                        </tr>
                        
                        <tr>
                            <th>Origin: </th>
                            <td>$levintan->country</td>
                        </tr>
                        
                        <tr>
                            <td colspan='2' >$levintan->review</td>
                        </tr>                      
                     </table>";
        }        
        return $result;
        
    }

    function GetImages()
    {
        $handle = opendir("levintanImages/levintan");
        
                //Read all files and store names in array
        while ($image = readdir($handle)) {
            $images[] = $image;
        }

        closedir($handle);

        //Exclude all filenames where filename length < 3
        $imageArray = array();
        foreach ($images as $image) {
            if (strlen($image) > 2) {
                array_push($imageArray, $image);
            }
        }

        //Create <select><option> Values and return result
        $result = $this->CreateOptionValues($imageArray);
        return $result;
    }
    
    function Insertlevintan()
    {
        $name = $_POST["txtName"];
        $type = $_POST["ddlType"];
        $year = $_POST["txtyear"];
        $country = $_POST["txtCountry"];
        $image = $_POST["ddlImage"];
        $review = $_POST["txtReview"];

        $levintan = new levintanentities(-1, $name, $type, $year, $country, $image, $review);
        $levintanModel = new levintanModel();
        $levintanModel->Insertlevintan($levintan);
    }
    
    function Updatelevintan($id)
    {
        
    }
    
    function Deletelevintan($id)
    {
        
    }
    
    function GetlevintanById($id)
    {
        $levintanModel = new levintanModel();
        return $levintanModel->GetlevintanById($id);
    }
    
    function GetlevintanByType($type)
    {
        $levintanModel = new levintanModel();
        return $levintanModel->GetlevintanByType($type);
    }
    
    function GetlevintanTypes()
    {
        $levintanModel = new levintanModel();
        return $levintanModel->GetlevintanTypes();
    }
    
}

?>
