<?php
$search = $_POST['search'];

if(isset($_POST['ubtn'])){
    header("Location:users?search=$search");
}