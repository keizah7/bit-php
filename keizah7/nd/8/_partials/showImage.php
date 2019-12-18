<div class="column">
    <nav class="panel is-info">
        <p class="panel-heading">
            Nuotrauka
        </p>
        <div class="panel-block noflex">
            <div class="columns">
                <div class="column">
                    <figure>
                        <img src="<?= $fileName ?>">
                    </figure>
                    <form method="POST" action="<?= url() ?>">
                        <div class="field is-grouped">
                            <div class="control is-expanded">
                                <a href="<?= url(['action' => 'deleteFile']) ?>" class="button is-danger is-fullwidth">Ištrinti</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</div>