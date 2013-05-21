<div id="foot_content">
  <div class="content" style="width:1000px;margin-left:5px;">
    <?php
      if(isset($failed)){
        echo $failed ;
      }
      elseif(isset($wrong_url)){
        echo $wrong_url;
      }
      elseif(isset($verification_error)){
        echo $verification_error;
      }
      elseif(isset($login_needed)){
        echo $login_needed;
      }
      else{
        echo 'Hey'.' '.$fname.','.' '.'your email'.' '.$id.' '.'has been verified. Be awesome.';
      } ?>

  </div>
</div>
