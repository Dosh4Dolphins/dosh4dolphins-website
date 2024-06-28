<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $dolphin = htmlspecialchars($_POST['dolphin']);
    $coupon = htmlspecialchars($_POST['coupon']);
    $customer_name = htmlspecialchars($_POST['customer_name']);
    $customer_email = htmlspecialchars($_POST['customer_email']);

    // Simple validation
    if (!empty($dolphin) && !empty($customer_name) && !empty($customer_email)) {
        // Define the CSV file path
        $file = 'orders.csv';

        // Open the file for writing (append mode)
        $handle = fopen($file, 'a');

        // Prepare the data to be written
        $data = [$customer_name, $customer_email, $coupon, $dolphin];

        // Write the data to the CSV file
        fputcsv($handle, $data);

        // Close the file
        fclose($handle);

        // Redirect to a thank you page (optional)
        header("Location: thank_you.html");
        exit();
    } else {
        echo "All fields except coupon code are required!";
    }
} else {
    echo "Invalid request method!";
}
?>
