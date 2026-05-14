<?php
include '../config.php';

$website_name = $_POST['website_name'];
$footer_text = $_POST['footer_text'];
$maintenance_mode = $_POST['maintenance_mode'];

$smtp_host = $_POST['smtp_host'];
$smtp_port = $_POST['smtp_port'];
$smtp_email = $_POST['smtp_email'];

$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];

$sidebar_color = $_POST['sidebar_color'];
$primary_color = $_POST['primary_color'];
$dark_mode = $_POST['dark_mode'];

mysqli_query($conn, "UPDATE admin_settings SET
    website_name='$website_name',
    footer_text='$footer_text',
    maintenance_mode='$maintenance_mode',

    smtp_host='$smtp_host',
    smtp_port='$smtp_port',
    smtp_email='$smtp_email',

    phone='$phone',
    email='$email',
    address='$address',

    sidebar_color='$sidebar_color',
    primary_color='$primary_color',
    dark_mode='$dark_mode'

    WHERE id='1'
");

header("Location: dashboard.php?page=settings");
exit;
