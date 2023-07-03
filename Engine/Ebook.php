<?php

class Ebook
{

    /**
     * @var Database
     */
    private $db;

    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function fetchEbooks() {

        try {
            $sql = "SELECT * FROM `ebook`";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();

            $output = array();
            $output['ebooks'] = array();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $data = [
                    "ebookID" => $row['ebookID'],
                    "catID" => $row['catID'],
                    "ebookname" => $row['ebookname'],
                    "url" => $row['url'],
                    "imageurl" => $row['imageurl'],
                    "description" => strlen($row['description']) > 50 ? substr($row['description'], 0, 50)."..." : $row['description'],
                    "dateposted" => $row['dateposted']
                ];

                array_push($output['ebooks'], $data);
            }

            echo json_encode($output);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }

    public function fetchEbookCategory() {

        try {
            $sql = "SELECT * FROM `ebook_cat`";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();

            $output = array();
            $output['ebook_category'] = array();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $data = [
                    "catID" => $row['catID'],
                    "catname" => $row['catname'],
                    "imageurl" => $row['imageurl'],
                    "description" => strlen($row['description']) > 50 ? substr($row['description'], 0, 50)."..." : $row['description'],
                ];

                array_push($output['ebook_category'], $data);
            }

            echo json_encode($output);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function fetchEbooksFromCategory() {

    }

}