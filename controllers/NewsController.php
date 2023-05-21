<?php
// controllers/NewsController.php
require_once 'models/NewsModel.php';

class NewsController {
    private $model;

    public function __construct() {
        $this->model = new NewsModel();
    }

    public function index() {
        $perPage = 5;
        $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $totalNews = $this->model->getTotalNewsCount();
        $totalPages = ceil($totalNews / $perPage);

        $news = $this->model->getNewsByPage($currentPage, $perPage);

        include 'templates/header.php';
        include 'views/news/index.php';
        include 'templates/footer.php';
    }

    public function view($id) {
        $newsItem = $this->model->getNewsById($id);
        include 'templates/header.php';
        include 'views/news/view.php';
        include 'templates/footer.php';
    }
}
