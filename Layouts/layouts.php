<?php

class layouts{
    public function heading($conf){
        echo "Welcome to " . $conf['site_name'] . "!";
    }
    public function welcome($conf){
        echo "<p>Kindly sign up or log in depending on whether you have an account.</p>";
    }
    public function footer($conf){
        echo "<footer>
        Copyright &copy; ".date("Y") . " " . $conf['site_name'] . "
        <br>Contact us at <a href='mailto:{$conf['site_email']}'>{$conf['site_email']}</a></footer>";
    }
}