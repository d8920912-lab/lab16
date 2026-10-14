<?php
require_once 'models/Post.php';

class BlogController {
    public function showAllPosts() {
        // Отримуємо пошуковий запит з URL, якщо він є
        $searchQuery = isset($_GET['query']) ? trim($_GET['query']) : '';
        
        // Отримуємо відфільтровані або всі пости
        $posts = Post::search($searchQuery);
        
        // Передаємо дані у представлення
        include 'views/postsView.php';
    }
}
