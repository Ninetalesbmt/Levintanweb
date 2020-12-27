<?php

require ("entities/levintanEntities.php");

class levintanModel
{
    function GetlevintanTypes ()
    {
        require 'credential.php';
        
        $host = 'localhost';
        $user = 'root';
        $passwd = '';
        $database0 = 'levintanpaint';
        
        $con = mysqli_connect($host, $user, $passwd) or die(mysqli_error($con));
        mysqli_select_db($con, $database0);
        $result = mysqli_query($con, "SELECT DISTINCT type from levintan") or die(mysqli_error($con));
        $types =array();
        
        while($row = mysqli_fetch_array($result))
        {
            array_push($types, $row[0]);
        }
        
        mysqli_close($con);
        return $types;
    }
    
    function GetlevintanByType($type)
    {
        require 'credential.php';
        
        $host = 'localhost';
        $user = 'root';
        $passwd = '';
        $database0 = 'levintanpaint';
                
        $con = mysqli_connect($host, $user, $passwd) or die(mysql_error());
        mysqli_select_db($con, $database0);
        $result = mysqli_query($con,"SELECT * FROM levintan WHERE type LIKE '$type'") or die(mysql_error());
        $levintanArray =array();
        
        while($row = mysqli_fetch_array($result))
        {
        $name = $row[1];
        $type =  $row[2];
        $year = $row[3];
        $country = $row[4];
        $image = $row[5];
        $review = $row[6];
        
        $levintan = new levintanentities(-1, $name, $type, $year, $country, $image, $review);
        array_push($levintanArray, $levintan);
        }
        
        mysqli_close($con);
        return $levintanArray;
    }
    
    function GetlevintanById ($id)
    {
        require 'credential.php';
        
        $host = 'localhost';
        $user = 'root';
        $passwd = '';
        $database0 = 'levintanpaint';
                
        $con = mysqli_connect($host, $user, $passwd) or die(mysql_error());
        mysqli_select_db($con, $database0);
        $result = mysqli_query($con,"SELECT * FROM levintan WHERE id = $id") or die(mysql_error());
        $levintanArray =array();
        
        while($row = mysqli_fetch_array($result))
        {
        $name = $row[1];
        $type =  $row[2];
        $year = $row[3];
        $country = $row[4];
        $image = $row[5];
        $review = $row[6];
        
        $levintan = new coffeeentities($id, $name, $type, $year, $country, $image, $review);
        
        }
        
        mysqli_close($con);
        return $levintan;
    }
    
    function Insertlevintan(levintanentities $levintan)
    {
        require 'credential.php';
        
        $host = 'localhost';
        $user = 'root';
        $passwd = '';
        $database0 = 'levintanpaint';
        
        $con = mysqli_connect($host, $user, $passwd) or die(mysqli_error($con));
        mysqli_select_db($con, $database0);
        
        $query = sprintf("INSERT INTO levintan
                (name,type,year,country,image,review)
                VALUES
                ('%s','%s','%s','%s','%s','%s','%s')",
                mysqli_real_escape_string($con,$levintan->name),
                mysqli_real_escape_string($con,$levintan->type),
                mysqli_real_escape_string($con,$levintan->year),
                mysqli_real_escape_string($con,$levintan->country),
                mysqli_real_escape_string($con,"levintanimages/levintan/" . $levintan->image),
                mysqli_real_escape_string($con,$levintan->review));
        
        mysqli_query($con, $query) or die(mysqli_error($con));
        mysqli_close($con);
        
    }
    
    function Updatelevintan($id, coffeeentities $levintan)
    {
        require 'credential.php';
        
        $host = 'localhost';
        $user = 'root';
        $passwd = '';
        $database0 = 'levintanpaint';
        
        $con = mysqli_connect($host, $user, $passwd) or die(mysqli_error($con));
        mysqli_select_db($con, $database0);
        
        $query = sprintf("UPDATE levintan
                SET name='%s',type='%s',year='%s',
                country='%s',image='%s',review='%s')
                WHERE id = $id",
                mysqli_real_escape_string($con,$levintan->name),
                mysqli_real_escape_string($con,$levintan->type),
                mysqli_real_escape_string($con,$levintan->year),
                mysqli_real_escape_string($con,$levintan->country),
                mysqli_real_escape_string($con,"levintanimages/levintan/" . $levintan->image),
                mysqli_real_escape_string($con,$levintan->review));
        
        mysqli_query($con, $query) or die(mysqli_error($con));
        mysqli_close($con);
    }
    
    function Deletelevintan($id)
    {
        $query = "DELETE FROM levintan WHERE id = $id";
        $this->PerformQuery($query);
    }
    
    function PerformQuery($query0)
    {
        require 'credential.php';
        
        $host = 'localhost';
        $user = 'root';
        $passwd = '';
        $database0 = 'levintanpaint';
        
        $con = mysqli_connect($host, $user, $passwd) or die(mysqli_error($con));
        mysqli_select_db($con, $database0);
        
        mysqli_query($con, $query) or die(mysqli_error($con));
        mysqli_close($con);
    }
}

?>