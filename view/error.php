<html>
<head><title>Erreur</title>
</head>

<body>

<h1>Error</h1>
<?php
if (isset($dVueEreur)) {
    foreach ($dVueEreur as $value){
        echo $value;
    }
}
?>



</body> </html>
