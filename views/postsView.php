<?php include 'views/layout/header.php'; ?>

<!-- Форма пошуку постів -->
<div class="row mb-4 justify-content-center">
    <div class="col-md-6">
        <form action="" method="GET" class="d-flex">
            <input type="text" name="query" class="form-control me-2" 
                   placeholder="Пошук поста за назвою..." 
                   value="<?= isset($_GET['query']) ? htmlspecialchars($_GET['query']) : '' ?>">
            <button class="btn btn-primary" type="submit">Знайти</button>
            <?php if (!empty($_GET['query'])): ?>
                <a href="index.php" class="btn btn-outline-secondary ms-2">Скинути</a>
            <?php endif; ?>
        </form>
    </div>
</div>

<!-- Виведення списку картками Bootstrap -->
<div class="row row-cols-1 row-cols-md-2 g-4">
    <?php if (!empty($posts)): ?>
        <?php 
        // Ініціалізуємо Parsedown для Markdown-тексту
        $parsedown = class_exists('Parsedown') ? new Parsedown() : null; 
        ?>
        
        <?php foreach ($posts as $post): ?>
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title h4 text-dark"><?= htmlspecialchars($post->title) ?></h2>
                        <div class="card-text text-secondary mb-3">
                            <?php 
                            if ($parsedown) {
                                // Парсимо текст з безпечним виведенням через htmlspecialchars в моделі або тут
                                echo $parsedown->text($post->content);
                            } else {
                                echo htmlspecialchars($post->content);
                            }
                            ?>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-top-0">
                        <small class="text-muted">📅 Дата публікації: <?= htmlspecialchars($post->date) ?></small>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12 text-center py-4">
            <div class="alert alert-warning">Постів за вашим запитом не знайдено.</div>
        </div>
    <?php endif; ?>
</div>

<?php include 'views/layout/footer.php'; ?>
