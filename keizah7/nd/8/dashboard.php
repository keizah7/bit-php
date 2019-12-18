<?php

require '_partials/header.php';
redirectIfNotSigned();

?>

<section class="section">
    <div class="container ">
        <div class="columns">
            <?php

            switch (isset($_GET['action']) ? $_GET['action'] : '') {
                case 'createFile':
                    require PARTS . 'createFile.php';
                    break;

                case 'createDir':
                    require PARTS . 'createDir.php';
                    break;

                case 'uploadImg':
                    require PARTS . 'uploadImage.php';
                    break;

                case 'showImage':
                    require PARTS . 'showImage.php';
                    break;

                case 'showFile':
                    require PARTS . 'showFile.php';
                    break;
            }

            ?>

            <div class="column">
                <nav class="panel">
                    <p class="panel-heading">Failų stuktūra</p>
                    <div class="panel-block">
                        <nav class="breadcrumb" aria-label="breadcrumbs">
                            <ul>
                                <li class="is-active"><?= $breadcrumb ?></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="panel-block">
                        <div class="columns">
                            <div class="column auto">
                                <a href="<?= url(['action' => 'createFile']) ?>" class="button is-link is-outlined">Sukurti failą</a>
                            </div>
                            <div class="column auto">
                                <a href="<?= url(['action' => 'createDir']) ?>" class="button is-link is-outlined">Sukurti aplanką</a>
                            </div>
                            <div class="column auto">
                                <a href="<?= url(['action' => 'uploadImg']) ?>" class="button is-link is-outlined">Įkelti nuotrauką</a>
                            </div>
                        </div>
                    </div>

                    <?php
                                                        printBackwardsLink();
                                                        printFiles();
                    ?>

                </nav>
            </div>
        </div>
    </div>
</section>

<?php require '_partials/footer.php' ?>