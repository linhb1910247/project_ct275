<nav class="navbar navbar-default sidebar"  > 
  <div class="container-fluid ">
    <!-- <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo BASE_URL?>/login/dashboard">Admin</a>
    </div> -->
    <ul class="nav navbar-nav">
      <li><a href="<?php echo BASE_URL?>/login/dashboard">Admin</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Category<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo BASE_URL?>/product">Add</a></li>
          <li><a href="<?php echo BASE_URL?>/product/list_category">List</a></li>
        </ul>
      </li>
      <li><a href="<?php echo BASE_URL?>/customer/customer_list">Customers</a></li>
      
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Product <span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href="<?php echo BASE_URL?>/product/add_product">Add</a></li>
          <li><a href="<?php echo BASE_URL?>/product/list_product">List</a></li>
        </ul>
      </li>
    
      <li><a href="<?php echo BASE_URL?>/order">Order</a></li>
      <li><a href="<?php echo BASE_URL?>/contact/list_contact">Contact</a></li>
      </ul>
    <ul class="nav navbar-nav navbar-right">
     
      <li><a href="<?php echo BASE_URL ?>/login/logout"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
