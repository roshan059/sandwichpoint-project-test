 <div class="col-md-12">
     <div class="panel panel-default">
         <!-- Default panel contents -->
         <div class="panel-heading">Latest added Sauces</div>
         <div class="panel-body">
             <!-- List group -->
             <ul class="list-group">
                 <?php foreach ($latestSauces as $key => $latestSauceItem) { ?>
                     <li class="list-group-item"><?php echo $key + 1 .  '. '  . $latestSauceItem->title; ?></li>
                 <?php } ?>
             </ul>
         </div>


     </div>
 </div>