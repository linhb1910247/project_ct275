<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
<hr>
<style type="text/css">
    body{
    background:#eee;    
}
.main-box.no-header {
    padding-top: 20px;
}
.main-box {
    background: #FFFFFF;
    -webkit-box-shadow: 1px 1px 2px 0 #CCCCCC;
    -moz-box-shadow: 1px 1px 2px 0 #CCCCCC;
    -o-box-shadow: 1px 1px 2px 0 #CCCCCC;
    -ms-box-shadow: 1px 1px 2px 0 #CCCCCC;
    box-shadow: 1px 1px 2px 0 #CCCCCC;
    margin-bottom: 16px;
    -webikt-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
}
.table a.table-link.danger {
    color: #e74c3c;
}
.label {
    border-radius: 3px;
    font-size: 0.875em;
    font-weight: 600;
}
.user-list tbody td .user-subhead {
    font-size: 0.875em;
    font-style: italic;
}
.user-list tbody td .user-link {
    display: block;
    font-size: 1.25em;
    padding-top: 3px;
    margin-left: 60px;
}
a {
    color: #3498db;
    outline: none!important;
}
.user-list tbody td>img {
    position: relative;
    max-width: 50px;
    float: left;
    margin-right: 15px;
}

.table thead tr th {
    text-transform: uppercase;
    font-size: 0.875em;
}
.table thead tr th {
    border-bottom: 2px solid #e7ebee;
}
.table tbody tr td:first-child {
    font-size: 1.125em;
    font-weight: 300;
}
.table tbody tr td {
    font-size: 0.875em;
    vertical-align: middle;
    border-top: 1px solid #e7ebee;
    padding: 12px 8px;
}
a:hover{
text-decoration:none;
}
    </style>
<div class="containe">
    <?php
    if(!empty($_GET['msg'])){
        $msg= unserialize(urldecode($_GET['msg']));
       foreach( $msg as $key => $value ){
        echo '  <div class="container mt-4">
        <h2>Thông báo</h2>
        <div class="alert alert-success">
          <strong>'.$value.'</strong> 
        </div> ';
        }
    }
   
?>
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                    <div class="table-responsive">
                        <table class="table user-list">
                            <thead>
                                <tr>
                                <th class="text-center">User</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Email</th>
                               
                                <th class="text-center">Role edit</th>
                                <th class="text-center">&nbsp;Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <thead>
                            <?php foreach ($customer as $key => $user){?>
                                <tr> 
                                    <td class="text-center">
                                    <img   height="100" width="100" src="<?php echo BASE_URL ?>/public/upload/product/<?php echo $user['avatar']?>" alt="avatar">
                                        <h4><?php echo $user['customers_name']?></h4>  
                                    </td>
                                    <?php

                                    ?>
                                    <td>
                                    <?php
                                    if($user['level'] == -1){?>
                                     <h3 class="text-center" class="user-subhead">Closed Account</h3>
                                    <?php 
                                    }else if($user['level'] == 2){?>
                                     <h3 class="text-center" class="user-subhead">Host</h3>
                                    <?php
                                    }else if($user['level'] == 1){?>
                                    <h3 class="text-center" class="user-subhead">Admin</h3>
                                    <?php
                                    }else if($user['level'] ==0){?>
                                      <h3 class="text-center" class="user-subhead">User</h3>
                                    <?php
                                    }
                                    ?>
                                    
                                    </td>
                                  <?php 
                                  if(Session::get('user') ||  Session::get('admin')){
                                  if(Session::get('customers_id')==$user['customers_id'] ){?>
                                    <td class="text-center">
                                    <h3   class="bg-info">Active</h3  >
                                      
                                    </td>
                                    <?php
                                    }else if($user['level']==-1){ ?>
                                    <td class="text-center">
                                    <h3 class="bg-danger">Lock</h3>
                                    </td>
                                     <?php
                                  }else{ ?>
                                  <td class="text-center">
                                    <h3 class="bg-dark">Inactive</h3>
                                    </td>
                                  <?php
                                  }}
                                        ?>
                                   
                                    <td>
                                    <h3 class="text-center"><?php echo $user['email']?></h3 >  
                                    </td>
                                 
                                    <td class="text-center">
                                   <form action="<?php echo BASE_URL ?>/customer/upload_role/<?php echo $user['customers_id']?>" method="POST">
                                    <select class="btn-sm " name="level">
                                        <option>User</option>
                                    
                                     <option>Admin</option>
                                     <option>Host</option>
                                     <option>Lock</option>
                                      </select>
                                      <!-- <input type="text" class="btn-sm" name="level" value=""> -->
                                      <button type="submit" class="btn btn-sm btn-primary"> <span class="fa-stack ">

                                                <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </button>
                                             </form>
                                </td>
                                    <td style="width: 20%;" class="text-center">
                                    <form action="<?php echo BASE_URL ?>/customer/delete_user/<?php echo $user['customers_id']?>" method="POST">

                                        <button type="submit"  type class="btn btn-sm btn-danger">
                                        <span class="fa-stack ">
                                            
                                        <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                              </span>
                                        </button>
                                </form>
                                    </td>
                                  
                                </tr>
                                <?php } ?>
                                    </thead>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>