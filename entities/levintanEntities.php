<?php

class levintanentities
{
    public $id;
    public $name;
    public $type;
    public $year;
    public $country;
    public $image;
    public $review;
    
    Function __construct($id, $name, $type, $year, $country, $image, $review)
    {
        $this->id = $id;
        $this->name = $name;
        $this->type =  $type;
        $this->year = $year;
        $this->country = $country;
        $this->image = $image;
        $this->review = $review;
    }
            
}


?>

