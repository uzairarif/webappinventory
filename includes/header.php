
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Reliance Paints</a>
    </div>
        <ul class="nav navbar-nav fixed-top">
          <?php 
            if($user[3] == 2){ 
              include('/opt/lampp/htdocs/db-13151/includes/navsales.php');
              }
            else {
              include('/opt/lampp/htdocs/db-13151/includes/navadmin.php');
              }
          ?>
          <li><a href="/db-13151/logout.php">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>