<div class="column">
    <nav class="panel is-info">
        <p class="panel-heading">
            Įkelti naują nuotrauką
        </p>
        <div class="panel-block">
            <div class="columns">
                <div class="column">
                    <form action="<?=url()?>" method="post" enctype="multipart/form-data">
                        <div class="field has-addons">
                            <div id="file-js-example" class="file has-name">
                                <label class="file-label">
                                    <input class="file-input" type="file" name="file">
                                    <span class="file-cta">
                                        <span class="file-icon">
                                            <i class="fas fa-upload"></i>
                                        </span>
                                        <span class="file-label">
                                            Pasirinkite
                                        </span>
                                    </span>
                                    <span class="file-name">nuotrauką..</span>
                                </label>
                            </div>
                            <input name="directory" type="hidden" value="<?=$directory['directory'] // uzkoduoti ?>">

                            <div class="control">
                                <button type="submit" class="button is-info">Įkelti</button>
                            </div>
                            <div class="control">
                                <a href="dashboard.php" class="button is-primary is-outlined is-fullwidth">Atšaukti</a>
                            </div>
                        </div>
                    </form>
                    <p class="help is-danger has-text-left"><?=isset($_SESSION['error']) ? $_SESSION['error'] : ''?></p>
                    <p class="help is-success has-text-left"><?=isset($_SESSION['notification']) ? $_SESSION['notification'] : ''?></p>
                </div>
            </div>
        </div>
    </nav>
</div>