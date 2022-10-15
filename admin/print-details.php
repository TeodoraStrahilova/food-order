<?php include('../dompdf/autoload.inc.php');?>

<?php
// reference the Dompdf namespace
use Dompdf\Dompdf;

/*
$id_order = $_GET['id_order'];
$sql = "SELECT o.id_order, u.name, u.phone, u.email,
o.address, o.order_date, o.del_time, o.note, d.qty, 
d.price, f.title
FROM tbl_order o
JOIN tbl_users u
ON o.id_user = u.id
JOIN tbl_details d
ON d.id_order = o.id_order
JOIN tbl_food f
ON f.id = d.id_food
WHERE o.id_order=$id_order 
";

$order = mysqli_fetch_assoc($sql);
*/

// instantiate and use the dompdf class
$dompdf = new Dompdf();
ob_start();

require('invoice.php');

$html = ob_get_contents();
ob_get_clean();

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('invoice.php', ['Attachment'=>false]);

?>