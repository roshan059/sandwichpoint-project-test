<div class="col-md-12">
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Latest added Sandwich Tastes</div>
        <div class="panel-body">
            <!-- List group -->
            <ul class="list-group">
                <?php foreach ($latestSandwichTastes as $key => $latestSandwichTasteItem) { ?>
                    <li class="list-group-item"><?php echo $key + 1 .  '. '  . $latestSandwichTasteItem->title; ?></li>
                <?php } ?>
            </ul>
        </div>


    </div>
</div>