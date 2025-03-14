<?php
    class BookController {
        public $bookModel;

        public function __construct()
        {
            $this->bookModel = new Book();
        }

        public function getList() {
            $book = $this->bookModel->getAllBooks();

            require_once './views/list.php';
        }

        public function create(){
            
            if(isset($_POST['them'])){
                
                $id = $_POST['id'];
                $title = $_POST['title'];
               
                $author = $_POST['author'];
                $publisher = $_POST['publisher'];
                $publish_date  = $_POST['publish_date'];

               if(isset($_FILES['image'])){
                 // upload file anh
                 $fileImage = $_FILES['image'];
                 $cover_image = $fileImage['name'];
                 $from = $fileImage['tmp_name']; 
                 $to = './upload/'.$cover_image; // duong dan luu anh tren sever
 
                 move_uploaded_file($from, $to);
               } else {
                $cover_image = '';
               }
               
             
                //goi sang model, luu vao database
                $this->bookModel->save($id,$title,$cover_image,$author,$publisher,$publish_date);
    
                // dua ve trang danh sac
                header('location: index.php?act=list');
               
            }
           
            require_once './views/create.php'; // form nhap lieu
            
        }

        
    }
?>