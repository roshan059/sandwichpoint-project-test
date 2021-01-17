<div class="col-md-12">
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Latest added Vegetables</div>
        <div class="panel-body">
            <!-- List group -->
            <ul class="list-group">
                <?php foreach ($latestVegetables as $key => $latestVegetableItem) { ?>
                    <li class="list-group-item"><?php echo $key + 1 .  '. '  . $latestVegetableItem->title; ?></li>
                <?php } ?>
            </ul>
        </div>


    </div>
</div>