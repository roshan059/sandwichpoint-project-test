<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <?php if (count($latestBreads) > 0) {

                    echo $this->render('partials/latestorder', [
                        'latestBreads' => $latestBreads
                    ]); // render partial view
                } ?>

                <?php if (count($latestUsers) > 0) {
                    echo  $this->render('partials/latestuser', [
                        'latestUsers' => $latestUsers
                    ]); // render partial view
                } ?>
            </div>
        </div>

        <div class="col-md-3">
            <div class="row">

                <?php if (count($latestBreads) > 0) {

                    echo $this->render('partials/latestaddedbread', [
                        'latestBreads' => $latestBreads
                    ]); // render partial view
                } ?>

                <?php if (count($latestSauces) > 0) {
                    echo  $this->render('partials/latestaddedsauce', [
                        'latestSauces' => $latestSauces
                    ]); // render partial view
                } ?>

                <?php if (count($latestSandwichTastes) > 0) {
                    echo  $this->render('partials/latestaddedsandwichtaste', [
                        'latestSandwichTastes' => $latestSandwichTastes
                    ]); // render partial view
                } ?>

                <?php if (count($latestVegetables) > 0) {
                    echo $this->render('partials/latestaddedvegetable', [
                        'latestVegetables' => $latestVegetables
                    ]); // render partial view
                } ?>
            </div>
        </div>
    </div>
</div>