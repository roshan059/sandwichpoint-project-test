
    <div class="col-md-12">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Latest added Breads</div>
            <div class="panel-body">
                <!-- List group -->
                <ul class="list-group">
                    <?php foreach ($latestBreads as $key => $latestBreadItem) { ?>
                        <li class="list-group-item"><?php echo $key + 1 .  '. '  . $latestBreadItem->title; ?></li>
                    <?php } ?>
                </ul>
            </div>


        </div>
    </div>