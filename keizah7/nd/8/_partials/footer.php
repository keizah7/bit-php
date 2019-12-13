
      <footer class="footer">
        <div class="container">
          <div class="level">
            <div class="level-left">
              <div class="level-item"><a class="title is-4" href="#">Artūras M.</a></div>
            </div>
            <div class="level-right">
                <a href="./" class="level-item" href="#">Pagrindinis</a>
                <?php
                    if (isset($_SESSION['logged'])) {
                        echo '<a class="level-item" href="dashboard.php">Prietaisų skydelis</a>';
                        echo '<a class="level-item" href="logout.php">Atsijungti</a>';
                        if(isset($_SESSION['error'])) {
                          unset($_SESSION['error']);
                        }
                        if(isset($_SESSION['notification'])) {
                          unset($_SESSION['notification']);
                        }
                    } else {
                        echo '<a class="level-item" href="login.php">Prisijungti</a>';
                    }
                ?>
            </div>
          </div>
          <hr>
          <div class="columns">
            <div class="column">
              <div class="buttons">
                  <a class="button" href="#"><img src="icons/facebook-f.svg" alt=""></a><a class="button" href="#"><img src="icons/instagram.svg" alt=""></a></div>
            </div>
            <div class="column has-text-centered has-text-right-tablet">
              <p class="subtitle is-6">&copy; 2019 Artūras M. All right reserved.</p>
            </div>
          </div>
        </div>
      </footer>
    </section>
</body>
<script>
document.addEventListener('DOMContentLoaded', () => {

// Get all "navbar-burger" elements
const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

// Check if there are any navbar burgers
if ($navbarBurgers.length > 0) {

  // Add a click event on each of them
  $navbarBurgers.forEach( el => {
    el.addEventListener('click', () => {

      // Get the target from the "data-target" attribute
      const target = el.dataset.target;
      const $target = document.getElementById(target);

      // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
      el.classList.toggle('is-active');
      $target.classList.toggle('is-active');

    });
  });
}

});
const fileInput = document.querySelector('#file-js-example input[type=file]');
fileInput.onchange = () => {
  if (fileInput.files.length > 0) {
    const fileName = document.querySelector('#file-js-example .file-name');
    fileName.textContent = fileInput.files[0].name;
  }
}
</script>
</html>