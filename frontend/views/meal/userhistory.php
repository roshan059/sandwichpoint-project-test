<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
        $this->title = 'Order History';
        $this->params['breadcrumbs'][] = $this->title;

        // $this->title = 'Update Orders: ' . $model->id;
        // $this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
        // $this->params['breadcrumbs'][] = ['label' => $model->meals->title, 'url' => ['view', 'id' => $model->id]];
        // $this->params['breadcrumbs'][] = 'Update';
?>


<h1>Your Order History</h1>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>

            <th scope="col">Meal Name</th>
            <th scope="col">Bread</th>
            <th scope="col">Bread Size</th>
            <th scope="col">Is baked</th>
            <th scope="col">sandwich's Taste</th>
            <th scope="col">Extra</th>
            <th scope="col">Vegetables Size</th>
            <th scope="col">Sauce</th>
            <th scope="col">Location</th>
            <th scope="col">current Status</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>

        <?php if (count($getCustomerOrderHistory) > 0) {
            foreach ($getCustomerOrderHistory as $key => $item) { ?>
                <tr>
                    <th scope="row"><?= $item->order_at ?></th>

                    <td><?= $item->meals->title ?></td>
                    <td><?= $item->bread->title ?></td>
                    <td><?= $item->bread_size ?></td>
                    <td><?= $item->is_baked ?></td>
                    <td><?= $item->taste->title ?></td>
                    <td><?= $item->extra ?></td>
                    <td><?= $item->vegetable->title ?></td>
                    <td><?= $item->sauce->title ?></td>

                    <td><?= $item->location ?></td>
                    <td><?= $item->status ?></td>
                    <td><?php if ($item->status == 'open') {
                        ?> <a href="<?= Url::base() . '?r=meal/edit-open-order&id='.$item->id. '&token='. $token ?>">Edit</a> <?php } else { ?> You can't edit <?php } ?></td>
                </tr>
            <?php   }
        } else { ?>

            <tr style="text-align: center;">
                <td colspan="11">No record(s) found</td>
            </tr>
        <?php } ?>


    </tbody>
</table>