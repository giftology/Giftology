<?= $this->element('admin_header'); ?>
<?php foreach($data as $row) {
    echo $row['product_id'].'  -   '.$row['value'].'   -   '.$row['code'].'</br>';
}?>