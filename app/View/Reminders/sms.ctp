hello
<script type="text/javascript">

 $(document).ready( function() {
 $('#done').click( function() {
            var email_submit= $('#email').val() ;                
         $.ajax({   
                    type: "POST",
                    dataType: 'html',
                    async: false,
                    url: "/reminders/sms",
                    data: "mobile_no="+email_submit,
                    success: function(data) {
                        var res_data = jQuery.parseJSON(data);
                        alert(res_data);
                        if(res_data == "Verification mail has been sent to your Id"){
                        } else{
                          return false;
                        
                        }
                          return false;
                           
                    }});
        });
        });
        </script>

         <input class="u-4" name="email" id="email"  placeholder="Email" />
          <input type="submit" name="submit" title="send" class="submission" id="done" value="Done" style="border:2px solid black; margin:10px; cursor:pointer; "  />


          <?php  echo $this->Form->create('reminders', array('action' => 'sms'));
            ?>
         <?php echo $this->Form->input("state" ,array('id' => 'state','label' => false,'div' => false,'class'=>"umstyle5" ))?>
         <?php echo $this->Form->end('EN')?>

         <?php 
         	echo "verified";
         ?>

