
<nav class="navbar navbar-inverse">
  <div class="container-fluid style="position: fixed; top: 0px;">
    <div class="navbar-header">
      <a class="navbar-brand" href="/db-13151/welcome.php">Reliance Paints</a>
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
          <li><a text-align="right" href="/db-13151/logout.php">Logout</a></li>
        </ul> 
      </li>
    </ul>
  </div>
</nav>

<style type="text/css">
element.style {
    position: fixed;
    top: 0px;
</style>
<!-- 
<nav id="nav-primary" class="navbar navbar-custom" role="navigation" style="position: fixed; top: 0px;">
          <div class="container">
            
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a href="index.html"><img src="img/logo1.png" width="200" height="80" alt="logo"></a>
            </div>
    
            <div class="collapse navbar-collapse" id="nav">
              <ul class="nav navbar-nav navbar-right uppercase">
                <li><a data-toggle="elementscroll" href="#info">About</a></li>
                <li><a data-toggle="elementscroll" href="#competitions">Competitions</a></li>
                <li><a data-toggle="elementscroll" href="#register">Register</a></li>
                <li><a data-toggle="elementscroll" href="#team">Team</a></li>
                <li><a data-toggle="elementscroll" href="#sponsors">Sponsors</a></li>
                <li><a data-toggle="elementscroll" href="#program">Program</a></li>
                

              </ul>
            </div>
            
          </div>
        </nav>
-->