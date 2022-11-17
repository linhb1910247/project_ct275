<h3 style="text-align: center; font-size: 38px;margin: 30px 0;">Contact list</h3><table class="table table-striped">
    
<thead>
      <tr>
      <th class="text-center">STT</th>
        <th class="text-center">Name</th>
        <th class="text-center">Email</th>
        <th class="text-center">Phone</th>
        <th class="text-center">Subject</th>
        <th class="text-center">Message</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $i=0;
        foreach ($contact as $key => $cont){
            $i++;
    ?>  
      <tr>
        <td class="text-center"><?php echo $i ?></td>
        <td class="text-center"><?php echo $cont['name'] ?></td>
        <td class="text-center"><?php echo $cont['email'] ?></td>
        <td class="text-center"><?php echo $cont['phone'] ?></td>
        <td class="text-center"><?php echo $cont['subject'] ?></td>
        <td><textarea readonly="true" style="background-color: #f9f9f9;"class="text-center"><?php echo $cont['message'] ?></textarea></td>
       
      </tr>
      <?php
        }
         ?>
    </tbody>
