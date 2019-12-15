<div class="column">
    <nav class="panel is-info">
        <p class="panel-heading">
            Sukurti naują failą
        </p>
        <div class="panel-block noflex">
            <div class="columns">
                <div class="column">
                    <form method="POST" action="<?=url()?>">
                        <div class="field">
                            <div class="control">
                            <input class="input" name="name" type="text" placeholder="Failo pavadinimas.txt">
                            </div>
                            <p class="help is-info has-text-left">* Prašome, failo pavadinimą įvesti be .txt galūnės</p>    
                        </div>
                        <input name="directory" type="hidden" value="<?=$directory['directory'] // uzkoduoti ?>">
                        <div class="field">
                            <div class="control">
                                <textarea name="description" class="textarea" placeholder="Failo turinys"></textarea>
                            </div>
                        </div>

                        <div class="field is-grouped">
                            <div class="control is-expanded">
                            <a href="dashboard.php" class="button is-primary is-outlined is-fullwidth">Atšaukti</a>
                            </div>
                            <div class="control is-expanded">
                            <button class="button is-primary is-fullwidth">Sukurti</button>
                            </div>
                        </div>
                        <p class="help is-danger has-text-left"><?=isset($_SESSION['error']) ? $_SESSION['error'] : ''?></p>
                        <p class="help is-success has-text-left"><?=isset($_SESSION['notification']) ? $_SESSION['notification'] : ''?></p>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</div>