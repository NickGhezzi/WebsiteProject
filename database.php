<?php

require_once('db_credentials.php');
//connect to the database
//then confirm the connection otherwise return error
function db_connect()
{
   $connection = mysqli_connect("localhost", "appuser", "password", "ditter_db");  if (mysqli_connect_errno()) {
    $msg = "Database connection failed: ";
    $msg .= mysqli_connect_error();
    $msg .= " (" . mysqli_connect_errno() . ")";
    exit($msg);
  }

  return $connection;
}

function db_disconnect($connection)
{
  if (isset($connection)) {
    mysqli_close($connection);
  }
}
