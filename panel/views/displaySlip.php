<?php
include_once "../controller/view_slip.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slip</title>
</head>

<body style="display: flex; height: 100vh; justify-content: center; align-items: center">
    <?php if (isset($slipPath)): ?>
        <img src="<?php echo $slipPath ?>" alt="slip" width="400px" height="400px" style="border: 1px solid black;">
    <?php else: ?>
        <p>Error displaying slip.</p>
    <?php endif; ?>
</body>

</html>


