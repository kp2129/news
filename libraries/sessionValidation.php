<?php
session_start();
if (isset($_SESSION['UId'])) {
    echo 'active';
} else {
    echo 'inactive';
}
