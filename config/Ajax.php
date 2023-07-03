<?php

include_once 'init.php';

if (isset($_POST['action'])) {
    $action = $_POST['action'];

    switch ($action) {
        case 'fetchJournals':
            $journal = new Journal();
            $journal->fetchJournals();
            break;
        case 'fetchEbooksCategory':
            $ebooks = new Ebook();
            $ebooks->fetchEbookCategory();
            break;
        default:
            echo 'No action specified';
    }
}