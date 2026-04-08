<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

    <article class="entry">
        <h2><?= $artikel['judul']; ?></h2>
        <hr>
        <div class="content">
            <?= $artikel['isi']; ?>
        </div>
    </article>

<?= $this->endSection(); ?>