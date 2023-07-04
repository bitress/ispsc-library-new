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

        try {

            $sql = "SELECT * FROM ebook_cat";
            $stmt = $this->db->query($sql);
            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    $ebook_category = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    $output = "";

                    foreach ($ebook_category as $category) {
                        $output .= '<div class="album-item">';
                            $output .= '<div class="grid-list list-gallery" data-lightbox-anima="fade-top" data-columns="3" data-columns-md="2">';
                           $output .=     ' <div class="grid-box">';

                        $sql = "SELECT * FROM ebook WHERE catID = :catID";
                        $stmt = $this->db->prepare($sql);
                        $stmt->bindParam(":catID", $category['catID'], PDO::PARAM_INT);
                        if ($stmt->execute()) {
                            $res = $stmt->fetchAll();
                            foreach ($res as $ebooks) {

                                $output .= '<div class="grid-item">';
                                   $output .= '      <a class="img-box" href="'. $ebooks['url'] .'">';
                                  $output .= '           <img src="'. $ebooks['imageurl'] .'" alt="">';
                                  $output .= '       </a>';
                                $output .= '</div>';

                            }
                        }

                        $output .= ' </div> ';
                        $output .= '       <div class="list-pagination">';
                        $output .= '            <ul class="pagination" data-page-items="6" data-pagination-anima="fade-right"></ul>';
                        $output .= '          </div>';
                        $output .= '      </div>';
                        $output .= '     </div>';

                    }

                    echo $output;


                }
            }


        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }

    }

}