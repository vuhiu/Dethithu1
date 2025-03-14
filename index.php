<?php
    require './commons/env.php';
    require './commons/connect.php';

    require './controllers/BookController.php';
    require './models/book.php';

    $act = isset($_GET['act']) ? $_GET['act'] : '/';

    switch ($act) {
        case '/':
            echo "Home";
            break;
        case 'list':
            (new BookController())->getList();
            break;
            case 'create':
                (new BookController())->create();
                break;

        default:
        echo "Router ko hop le";
        break;
    }
?>