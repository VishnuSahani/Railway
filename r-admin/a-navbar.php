
  <nav class="navbar navbar-expand-md navbar-dark bg-primary">
  <!-- d-xl-none d-lg-none d-block -->
  <a class="navbar-brand cursor-pointer" onclick="sidebarfun()">
    Admin
  <span class="navbar-toggler-icon mx-2" id="sidbarIcon" ></span>

  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
     
    
  </div>
</nav>

<style>

  /* sidebar css */
  .sidebar-container{
    height: 100vh;
    width: 0;
    background-color: #fff;
    transition: width 0.5s;
    position: absolute;
    overflow: hidden;
    top: 0;
    left: 0;
    z-index: 1;
  }

    .sidebar-header{
      height:50px;
      display:flex;
      justify-content: space-between;
      align-items:center;
      padding: 0 10px;

    }

    #cancel{
      font-size:30px;
      cursor:pointer;
    }


    .sidebar-container a {
  padding: 15px 8px 15px 32px;
  text-decoration: none;
  font-size: 15;
  color: #818181;
  display: block;
  transition: 0.1s;
  border-bottom:solid #818181 1px;
}

/* When you mouse over the navigation links, change their color */
.sidebar-container a:hover {
  color: #fff;
  background-color:#818181;
}

</style>

<div class="sidebar-container" id="sideBarContainer">
  <div class="bg-info sidebar-header text-light">
    <span>Hello!</span>
    <span id="cancel">&times;</span>
   

  </div>

<!--  -->

  <a href="#">
    Dashboard
  </a>

  <a href="section-station.php">  
    Section and Station
  </a>
  <a href="#">
    Employee List
  </a>
  <a href="#">
    RMB PMB
  </a>
 

</div>



<script>

document.getElementById("cancel").addEventListener("click", ()=>{
  document.getElementById("sideBarContainer").style.width = "0";

});


  function sidebarfun(){

    if(document.getElementById("sideBarContainer").style.width == "300px"){

      document.getElementById("sideBarContainer").style.width = "0";
    }else{
      document.getElementById("sideBarContainer").style.width = "300px";

    }


  }
</script>

