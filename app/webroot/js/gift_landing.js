 <script type="text/javascript">

      $(document).ready(function(){
        $("#form_shipping_submit").click(function(){
         //$("#campaign").remove();
            if($("#text_message1").val().length == 0){
                    $("#error_text1").show();
                        return false;
                }
                else{
                    $("#error_text1").hide();
                    }
                   // chk1.length = 0;
                   //MY $('td .campaign_checkbox').attr('checked',false);
                    var values = $("#myself").attr('my_facebook_id');
                    $('<input>').attr({
                    type: 'hidden',
                    id: values+'_hidden',
                    name: 'chk2['+values+']',
                    value: values,
                }).appendTo('#campaign');
                    $("#campaign").submit();

                    /* var idx = $.inArray(values, chk2);
                    if (idx == -1) {
                        chk2.splice(idx, 1);
                        alert("added");

                      $('<input>').attr({
                    type: 'hidden',
                    id: values+'_hidden',
                    name: 'chk2['+values+']',
                    value: values,
                }).appendTo('#campaign');

                    }*/


            });
            
            $("#form_shipping").click(function (){
                if($("#text_message").val().length == 0){
                    $("#error_text").show();
                        return false;
                }
                else{
                    $("#error_text").hide();
                    
                }
                if($("#text_message").val().length != 0){
                    $(this).attr('disabled','disabled');
                     $(this).parents('form').submit();    
                }           
                else $(this).removeAttr('disabled');
            });
        });
    </script>










    <script type='text/javascript'>
    $(document).ready(function(){
        var delay = (function(){
          var timer = 0;
          return function(callback, ms){
            clearTimeout (timer);
            timer = setTimeout(callback, ms);
          };
        })();
        $('#friend_name').keyup(function() {
        // interrupt form submission
            var key_value = this.value;
            delay(function(){
                $.ajax({
                    type: "POST",
                    dataType: 'html',
                    async: false,
                    url: "/campaigns/search_friend",
                    data: "search_key="+key_value,
                    success: function(data) {
                        var res_data = jQuery.parseJSON(data);;
                        var count = res_data.length;
                        var new_row = '';
                        $('.friends').remove();
                        for(var i = 0; i < count; i++){
                            var check = $("#"+res_data[i]["Reminder"]["friend_fb_id"]).is( "*" );
                            if(!check){
                                if($("#"+res_data[i]["Reminder"]["friend_fb_id"]+"_hidden").is( "*" ))
                                    new_row = '<tr class="friends"><td class="friend_row" id="'+res_data[i]["Reminder"]["friend_fb_id"]+'"><div style="padding-bottom: 2px;"><img src="https://graph.facebook.com/'+res_data[i]["Reminder"]["friend_fb_id"]+'/picture?type=square"></div></td><td>'+ res_data[i]["Reminder"]["friend_name"] + '</td><td><input class="campaign_checkbox" type="checkbox" name="chk1[]" id="'+res_data[i]["Reminder"]["friend_fb_id"]+'" value="'+res_data[i]["Reminder"]["friend_name"] +'" checked="checked"></td></tr>';

                                else new_row = '<tr class="friends"><td class="friend_row" id="' + res_data[i]["Reminder"]["friend_fb_id"] +'"><div style="padding-bottom: 2px;"><img src="https://graph.facebook.com/'+ res_data[i]["Reminder"]["friend_fb_id"] + '/picture?type=square"></div></td><td>' + res_data[i]["Reminder"]["friend_name"] + '</td><td><input class="campaign_checkbox" type="checkbox" name="chk1[]" id="'+ res_data[i]["Reminder"]["friend_fb_id"]+'" value="'+res_data[i]["Reminder"]["friend_name"] +'"></td></tr>';
                                
                                $('.friend_result').append(new_row);
                            }
                        }
                        $('.campaign_checkbox').show();
                    }
                });
            },1000);   
        });
    });








    $(document).ready(function(){
        $('#myself').click(function() {
           //var facebook_id = $(this).attr('my_facebook_id');
          // alert(facebook_id);
          var a = $('input[name="chk1[]"]:checked').length > 0;
            if(a)
            {
                alert("please unselect the check box");
                return false;
            }
            else{
            $('#searc_campaign').hide();
            $('#pra').hide();
            $('.delivery-details').hide();
            $('.my_delivery-details').show();
        }
            

             //$('#campaign').remove();


        })

        $('#others').click(function() {
            $('.my_delivery-details').hide();
            $('#searc_campaign').show();
            $('#pra').show();
            $('.delivery-details').show();
            
        })

       /* $('#friend_search').click(function() {
        // interrupt form submission
            var key_value = $("#friend_name").val();
                $.ajax({
                    type: "POST",
                    dataType: 'html',
                    async: false,
                    url: "/campaigns/search_friend",
                    data: "search_key="+key_value,
                    success: function(data) {
                        //alert(data);
                        var res_data = jQuery.parseJSON(data);;
                        var count = res_data.length;
                        var new_row = '';
                        $('.friends').remove();
                        //$('.friends').hide();
                        for(var i = 0; i < count; i++){
                            var check = $("#"+res_data[i]["Reminder"]["friend_fb_id"]).is( "*" );
                            if(!check){
                                if($("#"+res_data[i]["Reminder"]["friend_fb_id"]+"_hidden").is( "*" ))
                                    new_row = '<tr class="friends"><td class="friend_row" id="'+res_data[i]["Reminder"]["friend_fb_id"]+'"><div style="padding-bottom: 2px;"><img src="https://graph.facebook.com/'+res_data[i]["Reminder"]["friend_fb_id"]+'/picture?type=square"></div></td><td>'+ res_data[i]["Reminder"]["friend_name"] + '</td><td><input class="campaign_checkbox" type="checkbox" name="chk1[]" id="'+res_data[i]["Reminder"]["friend_fb_id"]+'" value="'+res_data[i]["Reminder"]["friend_name"] +'" checked="checked"></td></tr>';


                                else new_row = '<tr class="friends"><td class="friend_row" id="'+res_data[i]["Reminder"]["friend_fb_id"]+'"><div style="padding-bottom: 2px;"><img src="https://graph.facebook.com/'+res_data[i]["Reminder"]["friend_fb_id"]+'/picture?type=square"></div></td><td>'+ res_data[i]["Reminder"]["friend_name"] + '</td><td><input class="campaign_checkbox" type="checkbox" name="chk1[]" id="'+res_data[i]["Reminder"]["friend_fb_id"]+'" value="'+res_data[i]["Reminder"]["friend_name"] +'"></td></tr>';
                                
                                $('.friend_result').append(new_row);
                            }
                        }
                        $('.campaign_checkbox').show();
                    }
                });   
        });*/
                
    });






    $(document).ready(function(){
        var count_friend = 0;
        var names = new Object();
        $(document).on("click",".campaign_checkbox", function(){
            var key_value = this.id;
            //if($(".campaign_checkbox").is(':checked')){
            if ($(this).prop('checked')==true){
                count_friend = count_friend + 1;
                if(count_friend > 1){
                    count_friend = count_friend - 1;
                    alert('You can select max 1 friend');
                    $(this).attr('checked', false);
                    return;
                }
                
                $('<input>').attr({
                    type: 'hidden',
                    id: this.id+'_hidden',
                    name: 'chk2['+this.id+']',
                    value: this.id,
                }).appendTo('#campaign');
                names[key_value] = this.value;
                //alert(names[key_value]);
                //var name=this.value;
                //var myTextArea = document.getElementById('text_message').getAttribute('placeholder');

                //var hello = $("#text_message").attr("placeholder", myTextArea +' '+ name).placeholder();
            }
            else{
                $(this).attr('checked', false);
                count_friend = count_friend - 1;
                if($("#"+this.id+"_hidden").is( "*" )) $("#"+this.id+"_hidden").remove();
                delete names[key_value];
            }

            var placeholder_message = "Write something nice to";
            if(count_friend > 0)
                placeholder_message = placeholder_message+ " selected "+ count_friend + " friends : ";

            for (var i in names) {
               placeholder_message = placeholder_message + " " + names[i];         
            }

            $("#text_message").attr("placeholder", placeholder_message).placeholder(); 
        });
    });
    $(document).ready(function(){
        $('.campaign_checkbox').show();
    });
    </script>

  