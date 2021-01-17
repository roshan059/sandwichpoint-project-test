<?php

/* @var $this yii\web\View */

use common\models\MealOpeningDays;
use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Welcome to Sandwich Point!</h1>

        <p class="lead">Your choose our food and your hand and mouth to eat them.</p>
        <!-- Button trigger modal -->


        <!-- Modal -->


    </div>
    <div class="body-content">

        <div class="row">
            <?php
            foreach ($meals as $key => $mealItem) { ?>


                    

                <div class="modal fade" id="popup-<?= $mealItem->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Please Enter your valid token number for order this meal.</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="text" id="token_number" class="form-control">
                                <input type="hidden" id="meal_id" value="<?php echo $mealItem->id ?>" class="form-control">
                                <div class="help-block" style="color:red" id="error"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="orderNow">Order</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3" style="border: 1px solid #ccc;margin-right:10px;padding:10px; box-shadow: 5px 5px 18px rgb(177 177 172 / 60%);">
                    <h2><?= $mealItem->title ?></h2>

                    <p><?= $mealItem->description ?></p>
                    <p>Location: <?= $mealItem->location ?></p>
                     

                   

                    <?php
                    $mealOpening = new MealOpeningDays();
                    $checkMealOpening = $mealOpening->checkMealOpening($mealItem->id);
                    ?>
                    <?php if ($mealItem->status == 'open' && $checkMealOpening) { ?>
                       <span class="label label-success">open</span>
                    <?php } else {?>
                       <span class="label label-danger">Closed</span>
                    <?php }
                     ?>
                    <?php if ($mealItem->status == 'open' && $checkMealOpening) { ?>
                        <!-- href="<?= Url::base() . '?r=meal/index' ?>" -->
                        <p style="margin-top:20px"><a class="btn btn-default" data-toggle="modal" data-target="#popup-<?= $mealItem->id ?>" href="javascript:void()">Order Now &raquo;</a></p>
                    <?php } ?>
                </div>
                <?php }
                ?>

        </div>

    </div>
</div>


<script>
    $('#orderNow').on('click', function() {
        $('#error').html('');
        var token = $('#token_number').val();
        if (token != '') {
            var mealId = $('#meal_id').val();
            var url = '<?= Url::base() . '?r=meal/index&id=' ?>' + mealId + '&token=' + token;
            // console.log(url);
            window.location.replace(url.replace(/%20/g, ''))
        } else {
            $('#error').html('Please enter valid token number.');

        }
    })
</script>