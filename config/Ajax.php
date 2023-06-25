<?php

include_once 'init.php';

if (isset($_POST['action'])) {
    $action = $_POST['action'];

    switch ($action) {
        case 'fetchJournals':
            $journal = new Journal();
            $journal->fetchJournals();

            break;
        default:
            echo 'No action specified';
    }
}