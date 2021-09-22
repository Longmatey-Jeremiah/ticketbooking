<?php
//convert this input a qrcode image
//call the class QrCode
//change the format to png
//size
//generate
$png = QrCode::format('png')->size(520)->generate($booked->token);
$png = base64_encode($png);
echo "<img src='data:image/png;base64," . $png . "'>";
?>