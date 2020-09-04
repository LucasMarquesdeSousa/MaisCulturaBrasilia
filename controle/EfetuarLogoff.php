<?php
session_start();
session_destroy();
echo "<script>";
echo "window.location.href='../view/index1.php';";
echo "</script> ";