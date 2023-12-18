<?php
class DashboardController
{
    // Display a list of articles
    public function index()
    {
        //Lay du lieu tu server tuong ung 
        require 'views/dashboard/index.php';
    }

}
?>