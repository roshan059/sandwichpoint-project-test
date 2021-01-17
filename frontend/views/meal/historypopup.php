<?php

use yii\helpers\Url;
?>
<!-- Modal -->
<div class="modal fade" id="userTokenPopup" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enter your valid token number to access your order history page</h5>

            </div>
            <div class="modal-body">
                <input type="text" id="token_number" class="form-control" placeholder="Please enter your valid token number">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="close">Close</button>
                <button type="button" class="btn btn-primary" id="opennow">Open</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('#userTokenPopup').modal('show');

        $('#opennow').on('click', function() {
            $('#error').html('');
            var token = $('#token_number').val();
            if (token != '') {
                var mealId = $('#meal_id').val();
                var url = '<?= Url::base() . '?r=meal/history&token=' ?>' + token;
                // console.log(url);
                window.location.replace(url.replace(/%20/g, ''))
            } else {
                $('#error').html('Please enter valid token number.');

            }
        });

        $('#close').on('click', function() {
            var url = '<?= Url::base() ?>';
            // console.log(url);
            window.location.replace(url.replace(/%20/g, ''))
        });
    })
</script>