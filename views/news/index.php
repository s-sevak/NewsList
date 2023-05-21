<!-- views/news/index.php -->
<div class="container">
    <h1>News List</h1>
    <ul class="list-group">
        <?php foreach ($news as $item): ?>
            <li class="list-group-item">
                <h2><?php echo $item['title']; ?></h2>
                <p><?php echo $item['announce']; ?></p>
                <a href="view.php?id=<?php echo $item['id']; ?>">View Details</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <nav aria-label="Page navigation">
        <ul class="pagination">
            <?php if ($currentPage > 1): ?>
                <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $currentPage - 1; ?>">Previous</a></li>
            <?php endif; ?>

            <?php
            $range = 3; // Количество страниц, которые должны быть видны слева и справа от текущей страницы
            $start = $currentPage - $range;
            $end = $currentPage + $range;

            if ($start < 1) {
                $start = 1;
                $end = $start + $range * 2;
            }

            if ($end > $totalPages) {
                $end = $totalPages;
                $start = $end - $range * 2;
                if ($start < 1) {
                    $start = 1;
                }
            }

            for ($i = $start; $i <= $end; $i++):
                ?>
                <li class="page-item <?php echo ($currentPage == $i) ? 'active' : ''; ?>"><a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php endfor; ?>

            <?php if ($currentPage < $totalPages): ?>
                <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $currentPage + 1; ?>">Next</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</div>
