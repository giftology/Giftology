    <?php if(isset($friends)): ?>
    <?php foreach($friends as $friend): ?>
        <!--?= debug($friend); ?-->
        <?php echo $this->Facebook->picture($friend['uid'], array('linked'=>false, 'size'=>'square', 'facebook-logo'=>false)); ?><br>
        <?= $this->Html->link($friend['name'], array('controller'=>'products', 'action'=>'index', 'receiver_id' => $friend['uid'])); ?><br>
        <?= $friend['birthday']; ?><br>
        
    <?php endforeach; ?>
    <?php endif; ?>
