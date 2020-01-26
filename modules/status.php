<?php

require('../config.php');

$status = '';

if (isset($_GET['status'])) {
   
    $status = htmlspecialchars($_GET['status']);
    
}

?>

<html>
<head>
<title>Boxart Module [<?php echo $game; ?>]</title>
<link rel="stylesheet" type="text/css" href="../css/animate.css">      
<link rel="stylesheet" type="text/css" href="../css/modules/status-<?php echo $game; ?>.css">  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../js/modules/status-<?php echo $game; ?>.js"></script>  
</head>
<body>
<div id="box-art">
    <?php echo $box_art; ?>
</div>

</body> 
<script>
$(document).ready(function() {

});
</script>
</html>