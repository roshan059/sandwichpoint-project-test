   <div class="col-md-12">
       <div class="panel panel-default">
           <!-- Default panel contents -->
           <div class="panel-heading">Latest Users</div>

           <!-- Table -->
           <table class="table">
               <table class="table">
                   <tr>
                       <th>
                           S.No.
                       </th>
                       <th>
                           Full Name
                       </th>
                       <th>
                           User Unique Link
                       </th>
                       <th>
                           Status
                       </th>

        
                   </tr>

                   <?php foreach ($latestUsers as $key => $latestUserItem) { ?>
                       <tr>
                           <td>
                               <?= $key + 1 ?>
                           </td>
                           <td>
                               <?= $latestUserItem->username ?>
                           </td>
                           <td>
                               <?= $latestUserItem->username ?>
                           </td>
                           <td>
                               <?= $latestUserItem->username ?>
                           </td>

                          
                       </tr>
                   <?php } ?>
               </table>
           </table>
       </div>
   </div>