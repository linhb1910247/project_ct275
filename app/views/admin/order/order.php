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
<h3 style="text-align: center; font-size: 38px;margin: 30px 0;">Order list</h3><table class="table table-striped">
  
</div>

  
   
  
        <div class="container"  >
            <div class="row">
            <?php
  
          foreach ($order as $key => $ord){
  
            ?>
                <table class="table  table-hover">
                    <thead  >
                      <tr  >
                      <th class="text-center  h1 ">Code</th>
                      <th class=" text-center h1 ">Name</th>
                      <th class="text-center h1">Email</th>
                      <th class="text-center h1 " >Address</th>
                      <th class="text-center h1">Phone number</th>
                     
                    </tr>
                    </thead>
                    <tbody>
                    
                        <td class="text-center  h2 "><?php echo $ord['order_code'] ?></td>
                        <td class="text-center h2 "><?php echo $ord['name'] ?></td>
                        <td class="text-center  h2 "><?php echo $ord['email'] ?></td>
                        <td class="text-center  h2 "><?php echo $ord['address'] ?></td> 
                        <td  class="text-center  h2 "><?php echo $ord['phone'] ?></td>
                        
                        
                      </tr>
                       
                    </tbody>
                    <thead>
                      <tr>
                      <th style="text-align: center;">Date</th>
                      <th style="text-align: center;">Status</th>
                      <th style="text-align: center;"> Note</th>
                      <th style="text-align: center;">State</th>
                      <th style="text-align: center;">Managers</th>
                      <th class="text-center"> Cancellation request</th>
                    </tr>
                    </thead>
                    <tbody>
                    <td style="text-align: center;"><?php echo $ord['order_date'] ?></td>
                        <td style="text-align: center;"><?php if($ord['order_status']== 0){echo 'New order';} 
                              else if($ord['order_status']==1) {echo 'Processed';}else {echo 'Cancelled';} ?></td>
                              
                              <td style="text-align: center;"><?php echo $ord['order_note'] ?></td>
                              <td style="text-align: center;"><a href="<?php echo BASE_URL ?>/order/order_details/<?php echo $ord['order_code']?>">Order details</a></td>
                              <td style="text-align: center;"><a href="<?php echo BASE_URL ?>/order/order_delete/<?php echo $ord['order_code']?>">Delete</a></td>
                              <td class="text-center ">
                             <?php
                              if($ord['cancel']==0){
                                ?>
                                <a href="<?php echo BASE_URL?>/order/cancelorder_confirm/<?php echo $ord['order_code'] ?>">Confirm</a></td>
                              <?php
                              }else {
                                ?>
                                <p> </p>
                                <?php
                              }
                            ?>
      
                       </td>
                      </tr>
                       
                    </tbody>
                </table>

                <?php
        }
         ?>
            </div>
        </div>
 
   
   
