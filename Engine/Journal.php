<?php

class Journal {


    /**
     * @var Database
     */
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function fetchJournals() {

        try {
            $sql = "SELECT * FROM `journal`";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();

            $output = array();
            $output['journal'] = array();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $data = [
                    "journalID" => $row['journalID'],
                    "journalname" => $row['journalname'],
                    "description" => strlen($row['description']) > 50 ? substr($row['description'], 0, 50)."..." : $row['description'],
                    "url" => $row['url'],
                    "imageurl" => $row['imageurl'],
                    "dateposted" => $row['dateposted']
                ];

                array_push($output['journal'], $data);
            }

            echo json_encode($output);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }
}