<!DOCTYPE html>
<html>
<head>
<!-- <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script> -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.js">
  </script>


  
</head>
<body>

<h2>Spalvotas Fonas JS</h2>


  Spalva:<br>
  <input type="text" id="color">
  <br><br>
  <input type="button" id="mygtukas" value="Keisti">

<div id="demo"></div>
</body>
<script>

document.getElementById("mygtukas").addEventListener("click", function(){
    axios.post('http://localhost/10/getpost/js.php', {
    color: document.getElementById("color").value,
    papildomai: "lalalalalalal"
  })
  .then(function (response) {
    console.log(response.data.spalva);

    // $("body").css("background", "#"+response.data.spalva);

    document.body.style.background = "#"+response.data.spalva;
    // $("#color").val(response.data.spalva);
    document.getElementById("demo").innerHTML = response.data.html;

  })
  .catch(function (error) {
    console.log(error);
  });



});

</script>
</html>