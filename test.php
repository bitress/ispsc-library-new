<?php

include_once 'config/init.php';

$ebook = new Ebook();
$ebook->fetchEbooksFromCategory();