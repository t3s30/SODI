<!-- Validacion de inicio de session -->
<?php
include('config/login.php');
include('header.php');
?>

<body>
   <!-- count particles -->
   <div class="count-particles">
      <span class="js-count-particles">--</span> particles
   </div>
   <!-- particles.js container -->
   <div id="particles-js">
   <img  src="img/logoImos.png" alt="MDN" style="width: 90px;display: block;margin-left: auto;margin-right: auto;width: 10%;">
      <h4 style="color:#FFF; text-align:center;margin-bottom: 15px;">SODI</h4>
      <div id="login">
         <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
               <div id="login-column" class="col-md-6">
                  <div id="login-box" class="col-md-12">
                 
                     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="form-group">
                           <input type="text" name="user" id="user" class="form-control" placeholder="Usuario" style="background-color: #000;color:aqua">
                        </div>
                        <div class="form-group">
                           <input type="password" name="pass" id="pass" class="form-control" placeholder="Contraseña" style="background-color: #000;color:aqua">
                        </div>
                        <input type="submit" name="submit" class="btn btn-dark btn-margin" value="Ingresar">
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- scripts -->
   <script src="../particles.js"></script>
   <script src="hefestoLib/js/app.js"></script>
   <!-- stats.js -->
   <script src="hefestoLib/js/stats.js"></script>
   <script>
      var count_particles, stats, update;
      stats = new Stats;
      stats.setMode(0);
      stats.domElement.style.position = 'absolute';
      stats.domElement.style.left = '0px';
      stats.domElement.style.top = '0px';
      document.body.appendChild(stats.domElement);
      count_particles = document.querySelector('.js-count-particles');
      update = function() {
         stats.begin();
         stats.end();
         if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
            count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
         }
         requestAnimationFrame(update);
      };
      requestAnimationFrame(update);
   </script>
</body>

</html>