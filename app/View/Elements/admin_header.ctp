<style>
      div.paging a{
         display: inline-block;

      }
    div.ui-datepicker
    {
    font-size:10px;
    }

     th  a{
      color: #000000; 
      text-shadow: 0 1px 1px rgba(0,0,0, .3);
       margin: 0;
     }
     tr  a{
      color: #000000;
      text-shadow: 0 1px 1px rgba(0,0,0, .3); 
       margin: 0;
     }
     td a{
      color: #000000;
      text-shadow: 0 1px 1px rgba(0,0,0, .3); 
       margin: 0;
     }
     th a:hover {background: #000000; color: #fff;}
     tr a:hover {background: #000000; color: #fff;}
     td a:hover {background: #000000; color: #fff;}
     th {background: #EFFBFB repeat-x 0 -110px; line-height: 100%;font: normal 13px Arial, Helvetica, sans-serif; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; -webkit-box-shadow: 0 1px 6px rgba(0,0,0, .4); -moz-box-shadow: 0 1px 3px rgba(0,0,0, .4); padding:2px 2px;}
    tr,td {background: #EFFBFB repeat-x 0 -110px; line-height: 100%;font: normal 12px Arial, Helvetica, sans-serif; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; -webkit-box-shadow: 0 1px 3px rgba(0,0,0, .4); -moz-box-shadow: 0 1px 3px rgba(0,0,0, .4); padding:0 2px 0 2px;}

         #cssmenu ul {margin: 0; padding: 7px 6px 0; background: #EFFBFB url(../img/overlay.png) repeat-x 0 -110px; line-height: 100%; border-radius: 1em; font: normal 18px Arial, Helvetica, sans-serif; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; -webkit-box-shadow: 0 1px 3px rgba(0,0,0, .4); -moz-box-shadow: 0 1px 3px rgba(0,0,0, .4);}
         #cssmenu li {margin: 0 5px; padding: 0 0 8px; float: left; position: relative; list-style: none; }
         #cssmenu a,
         #cssmenu a:link {font-weight: bold; color: #000000; text-decoration: none; display: block; padding:  8px 20px; margin: 0; border-radius: 5px; -webkit-border-radius: 5px; -moz-border-radius: 5px;  text-shadow: 0 1px 1px rgba(0,0,0, .3); }
         #cssmenu a:hover {background: #E6E6E6; color: #000000;}
         #cssmenu .active a, 
         #cssmenu li:hover > a {background: #E6E6E6 url(../img/overlay.png) repeat-x 0 -40px; color: #000000; border-top: solid 1px #f8f8f8; -webkit-box-shadow: 0 1px 1px rgba(0,0,0, .2); -moz-box-shadow: 0 1px 1px rgba(0,0,0, .2); box-shadow: 0 1px 1px rgba(0,0,0, .2); text-shadow: 0 1px 0 rgba(255,255,255, 1); }
         #cssmenu ul ul li:hover a,
         #cssmenu li:hover li a {background: #EFFBFB; border: none; color: #000000; -webkit-box-shadow: none; -moz-box-shadow: none;}
         #cssmenu ul ul a:hover {background: #E6E6E6 url(../img/overlay.png) repeat-x 0 -100px !important; color: #000000 !important; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; text-shadow: 0 1px 1px rgba(0,0,0, .1);}
         #cssmenu li:hover > ul {display: block;}
         #cssmenu ul ul {display: none; margin: 0; padding: 0; width: 185px; position: absolute; top: 40px; left: 0; background: #EFFBFB url(../img/overlay.png) repeat-x 0 0; border: solid 1px #E6E6E6; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; -webkit-box-shadow: 0 1px 3px rgba(0,0,0, .3); -moz-box-shadow: 0 1px 3px rgba(0,0,0, .3); box-shadow: 0 1px 3px rgba(0,0,0, .3);}
         #cssmenu ul ul li {float: none; margin: 0; padding: 3px;  background: #EFFBFB url(../img/overlay.png) repeat-x 0 0; color: #000000; }
         #cssmenu ul ul a {font-weight: normal; text-shadow: 0 1px 0 #E6E6E6; }
         #cssmenu ul ul ul{display: none; margin: 0; padding: 0; width: 185px; position: absolute; top:0px; left: 185px; background: #EFFBFB url(../img/overlay.png) repeat-x 0 0; border: solid 1px #E6E6E6; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; -webkit-box-shadow: 0 1px 3px rgba(0,0,0, .3); -moz-box-shadow: 0 1px 3px rgba(0,0,0, .3); box-shadow: 0 1px 3px rgba(0,0,0, .3);}
         #cssmenu ul:after {content: '.'; display: block; clear: both; visibility: hidden; line-height: 0; height: 0;}
         * html #cssmenu  ul {height: 1%;}
</style>



<div id='cssmenu'>
<ul>
   <li class='has-sub'><a href='#'><span>User</span></a>
   	<ul>
         <li><?php echo $this->Html->link(__('list User'), array('controller' => 'users', 'action' => 'index')); ?></li>
         <li><?php echo $this->Html->link(__('List User Addresses'), array('controller' => 'user_addresses', 'action' => 'index')); ?></li>
      </ul>
   </li>
   <li class='has-sub '><a href='#'><span>Gift/Transaction</span></a>
      <ul>
         <li><?php echo $this->Html->link(__('Free'), array('controller' => 'Gifts', 'action' => 'index')); ?></li>
         <li><?php echo $this->Html->link(__('Paid'), array('controller' => 'Gifts', 'action' => 'paid_gift')); ?></li>
      </ul>
   </li>
   <li class='has-sub '><a href='#'><span>Merchant</span></a>
       <ul>
         <li><a href='#'><span>Vendor</span></a>
         	<ul>
			         <li><?php echo $this->Html->link(__('New Vendor'), array('controller' => 'vendors', 'action' => 'add')); ?></a>
			         </li>
			         <li><?php echo $this->Html->link(__('List Vendor'), array('controller' => 'vendors', 'action' => 'index')); ?></li>
            </ul>
         </li>
         <li><a href='#'><span>Product</span></a>
         	<ul>     <li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?>
			         </li>  
			          <li><?php echo $this->Html->link(__('New Products'), array('controller' => 'products', 'action' => 'add')); ?>
			         </li>
			         <li><?php echo $this->Html->link(__('List Uploaded Code'), array('controller' => 'uploaded_product_codes', 'action' => 'index')); ?>
			         </li>
			         <li><?php echo $this->Html->link(__('New Uploaded Code'), array('controller' => 'uploaded_product_codes', 'action' => 'add')); ?></li>
            </ul>
         </li>
      </ul>
   </li>
   <li class='has-sub '><a href='#'><span>Campaign</span></a>
   	<ul> <li><?php echo $this->Html->link(__('List Campaign'), array('controller' => 'campaigns', 'action' => 'admin'
   	         )); ?></li>
         <li><?php echo $this->Html->link(__('New Campaign'), array('controller' => 'campaigns', 'action' => 'add')); ?></li>
         
      </ul>
   </li>
   <li><a href="#collapse1" class="nav-toggle",sixe='1'>Search</a></li>
</ul>
</div>