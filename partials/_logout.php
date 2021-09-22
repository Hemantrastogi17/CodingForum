<?php
session_start();    
echo "Logging you out...plese wait";

session_destroy();
header("Location: /iForum/index.php?logout=true");
?>