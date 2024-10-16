<?php
require 'db.php';

if ($pdo) {
    echo "Database connection successful!";
} else {
    echo "Database connection failed!";
}
