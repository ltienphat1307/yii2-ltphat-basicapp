<?php

use yii\helpers\Html;

?>
<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <?php
                $th = '';
                foreach ($headers as $header) {
                    $th .= '<th>' . $header . '</th>';
                }
                echo $th;
            ?>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $body = '';
            foreach ($data as $key => $item) {
                $body .= '<tr>';
                $body .= '<td>'. ($key + 1) .'</td>';
                foreach($attributes as $attr) {
                    $body .= '<td>'. $item->{$attr} .'</td>';
                }
                $body .= '<td>'. Html::a('View', ['view', 'id' => $item->id], ['class' => 'btn btn-sm btn-success']) .'</td>';
                $body .= '</tr>';
            }
            echo $body;
        ?>
    </tbody>
</table>
