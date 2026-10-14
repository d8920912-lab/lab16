<?php

class Post {
    public $title;
    public $content;
    public $date;

    public function __construct($title, $content, $date = null) {
        $this->title = $title;
        $this->content = $content;
        // Додаємо поле дати створення (якщо не передано, береться поточна)
        $this->date = $date ?? date('d.m.Y'); 
    }

    public static function getAll() {
        return [
            new Post("Мій перший пост", "Це приклад першого поста в блозі.", "10.10.2026"),
            new Post("MVC у PHP", "MVC -- це розділення коду на три частини: **Model**, **View**, **Controller**.", "11.10.2026"),
            new Post("Composer", "Composer -- менеджер залежностей для PHP. Встановлюйте пакети в один клік!", "12.10.2026"),
            new Post("GitHub", "GitHub -- сервіс для зберігання та спільної роботи над кодом за допомогою Git.", "13.10.2026"),
            new Post("Наступний крок", "Далі можна додати пошук, Markdown або базу даних MySQL.", "14.10.2026"),
        ];
    }

    // Метод пошуку постів за назвою (фільтрація)
    public static function search($query) {
        $allPosts = self::getAll();
        if (empty($query)) {
            return $allPosts;
        }

        return array_filter($allPosts, function($post) use ($query) {
            return mb_stripos($post->title, $query) !== false;
        });
    }
}
