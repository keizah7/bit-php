<div class="column">
    <nav class="panel is-info">
        <p class="panel-heading">
            Sukurti naują aplanką
        </p>
        <div class="panel-block">
            <div class="columns">
                <div class="column">
                    <form action="<?=$url?>" method="POST">
                        <div class="field has-addons">
                            <div class="control">
                                <input name="name" class="input" type="text" placeholder="Aplankalo pavadinimas" autofocus>
                            </div>
                            <input name="directory" type="hidden" value="<?=$directory['directory'] // uzkoduoti ?>">
                            <div class="control">
                                <button type="submit" class="button is-info">Sukurti</button>
                            </div>
                            <div class="control">
                                <a href="dashboard.php" class="button is-primary is-outlined is-fullwidth">Atšaukti</a>
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