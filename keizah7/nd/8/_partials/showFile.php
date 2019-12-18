<div class="column">
    <nav class="panel is-info">
        <p class="panel-heading">
            Redaguoti failą
        </p>
        <div class="panel-block noflex">
            <div class="columns">
                <div class="column">
                    <form method="POST" action="<?= url() ?>">
                        <input name="directory" type="hidden" value="<?= $directory['directory'] // uzkoduoti 
                                                                        ?>">
                        <div class="field">
                            <div class="control">
                                <textarea name="description" class="textarea" placeholder="Failo turinys"><?= $fileContent ?></textarea>
                            </div>
                        </div>

                        <div class="field is-grouped">
                            <div class="control is-expanded">
                                <a href="dashboard.php" class="button is-primary is-outlined is-fullwidth">Atšaukti</a>
                            </div>
                            <div class="control is-expanded">
                                <button class="button is-primary is-fullwidth">Redaguoti</button>
                            </div>
                            <div class="control is-expanded">

                                <a href="<?= url(['action' => 'deleteFile']) ?>" class="button is-danger is-fullwidth">Ištrinti</a>
                            </div>
                        </div>
                        <p class="help is-danger has-text-left"><?= isset($_SESSION['error']) ? $_SESSION['error'] : '' ?></p>
                        <p class="help is-success has-text-left"><?= isset($_SESSION['notification']) ? $_SESSION['notification'] : '' ?></p>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</div>