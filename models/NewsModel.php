<?php
// models/NewsModel.php
require_once 'includes/db.php';

class NewsModel {
    private $db;

    public function __construct() {
        $this->db = new mysqli('localhost', 'root', 'root', 'database_news');
        if ($this->db->connect_error) {
            die('Database connection error: ' . $this->db->connect_error);
        }
        $this->db->set_charset("utf8"); // Установка кодировки
    }

    public function getTotalNewsCount() {
        $query = 'SELECT COUNT(*) AS total FROM news';
        $result = $this->db->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }

    public function getNewsByPage($page, $perPage) {
        $offset = ($page - 1) * $perPage;
        $query = "SELECT * FROM news ORDER BY idate DESC LIMIT $offset, $perPage";
        $result = $this->db->query($query);
        $news = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $news[] = $row;
            }
            $result->free();
        }
        return $news;
    }

    public function getNewsById($id) {
        $id = $this->db->real_escape_string($id);
        $query = "SELECT * FROM news WHERE id = $id";
        $result = $this->db->query($query);
        $newsItem = null;
        if ($result && $result->num_rows > 0) {
            $newsItem = $result->fetch_assoc();
            $result->free();
        }
        return $newsItem;
    }
}
