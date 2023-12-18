<?php require('partials/header.php'); ?>
<?php require('partials/nav.php'); ?>
<?php require('partials/banner.php'); ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <ol>
        <?php foreach($notes as $note): ?>
            <li>
                <a href="./note?id=<?php echo $note['id']; ?>" class="text-blue-500 hover:underline">
                    <?php echo $note['body']??''; ?>
                </a>
            </li>
        <?php endforeach; ?>
        </ol>
    </div>
</main>

<?php require('partials/footer.php'); ?>
