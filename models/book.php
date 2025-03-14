<?php
    class Book {
        public $conn;

        public function __construct()
        {
            $this->conn = connectDB();
        }

        public function getAllBooks(){
            $sql = "SELECT * FROM books";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        }

        public function getbyId($id){
            $sql = "SELECT * FROM books WHERE id = $id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
        }

        public function save($id,$title,$cover_image,$author,$publisher,$publish_date){
            $sql = "INSERT INTO books (id,title,cover_image,author,publisher,publish_date)
                    VALUE('$id','$title','$cover_image','$author','$publisher','$publish_date')";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
        }
    }
?>