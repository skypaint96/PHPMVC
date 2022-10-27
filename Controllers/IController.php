<?php 

interface IController
{  
    public function __construct();

    public function Invoke($_view, $_id);

    public function GetName();
}  
?>