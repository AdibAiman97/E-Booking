<?php
include('vendor/inc/config.php');

if (isset($_GET['package'])) {
    $package = $_GET['package'];

    // Fetch categories and prices based on the selected package
    $query = "SELECT v_category, v_name FROM tms_vehicle WHERE v_package = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('s', $package);
    $stmt->execute();
    $res = $stmt->get_result();

    $categories = [];
    $prices = [];
    while ($row = $res->fetch_assoc()) {
        $categories[] = $row['v_category'];
        $prices[] = $row['v_name'];
    }

    // Return the data as JSON
    echo json_encode(['categories' => $categories, 'prices' => $prices]);
}
?>
