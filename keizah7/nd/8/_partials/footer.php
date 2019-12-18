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
          if (isset($_SESSION['error'])) {
            unset($_SESSION['error']);
          }
          if (isset($_SESSION['notification'])) {
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
<script src="js/app.js"></script>

</html>