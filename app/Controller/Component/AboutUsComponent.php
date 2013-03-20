<?php
App::uses('Component', 'Controller');
class AboutUsComponent extends Component {
	
	 function about_us(){
	 	$about_us = array();
	 	$about_us['headline'] = array("head" => "ABOUT US","head_val" => "<p> Do away with your gifting woes, because Giftology is here to make your life a lot simpler!! We’re a social gifting platform. In simple words, we enable you to send gifts to your friends on Facebook! Now isn’t that awesome? </p><br>
  
                               <p> And it gets better. We’ve got free gifts for you to send! So instead of writing the plain ol’ Happy Birthday of your friend’s wall, send them a gift from giftology.com! All you have to do is connect with Facebook, select a friend then select a gift and… whoosh… it’s sent. Hey look out, there’s some awesome karma coming your way.</p>");
         $about_us['team'] = array(
         	'head' => 'The Team',
         	'team_val'=> array(
         		'team_member1'=> array(
         		    'name' => 'Aman Narang',
         			'designation' => 'Co-Founder & Head Business Development',
         			'info'=>' <p> Prior to joining Giftology, Aman spearheaded new acquisitions at Freecharge.in and at Paytronic Network Pvt. Ltd. He has a knack for understanding various parts of the business and experimenting with new concepts for business growth with a keen interest in online marketing and product management. </p>
         					  <p>Aman holds an MBA from The University of Sheffield and is also a Telecom Engineer from BIT, Bangalore. He loves to go on long drives and is a big foodie.</p>',
         			'mail'=>'aman@giftology.com',
         			'image'=>FULL_BASE_URL.'/img/aman.png'),
                                                                    
                'team_member2'=>array(
                	'name' => 'Varun Vummidi',
                	'designation'=>'CEO',
                	'info'=>'<p>Varun Vummidi comes off a successful stint at Jabong.com as part of the founding team. He was a key player in helping it become one of the fastest growing e-commerce companies in India.</p>
                             <p>Previously,Varun has been an Entrepreneur in Residence at Jabong.com, a Product Specialist at Merrill Lynch and Relationship Manager at HDFC Bank Ltd. He has also worked as a freelance Radio DJ for All India Radio in Chennai and as an M.C.</p>
                             <p>Varun holds an MBA from Baruch College, New York and a B.Com from Loyola College, Chennai. Varun loves to backpackand play basketball in his free time.</p>',
                             'mail' => 'varun@giftology.com',
                             'image'=> FULL_BASE_URL."/img/VARUN.png"),
                 'team_member3' =>array(
                 	'name'=>'Alok Kumar',
                 	'designation'=>'Assistant Director, Technology',
                 	'info'=>'<p>Alok Kumar is a technophile who always enjoyed workingin a startup environment. He believes in high quality software development and futuristic approach for better solutions.</p>
                             <p>Previously, Alok worked for Mrbabu.com, Kuwait and CEON Solutions Private Limited, India. He has keen interest in R&D, Product Development and Project Management.</p>
                             <p>Alok holds B.Tech and M.Tech degrees from Indian Institute of Information Technology and Management, Gwalior, India. He is an avid soccer fan.</p>',
                    'mail'=>'alok@giftology.com','image'=>FULL_BASE_URL.'/img/alok.png'),
                 'team_member4'=>array(
                 	'name' =>'Kiran Sidhu',
                 	'designation'=> 'Chairman','info'=>'<P>Kiran has been a seed investor in many start-ups in various technology and biotechnology ventures. He funded and oversaw the development of BuzzDash that was sold to the Tribune Group in 2009. Kiran was also an early stage investor in two biotechnology companies: Vasgene Therapeutics and Inovio Biomedical Corporation. He has also led Nano Universe, an early stage Internet incubator, through a successful AIM listing acting as Finance Director and co-founder. </p>
                                                        <p>Previously, Kiran led On Stage Entertainment through a successful NASDAQ small company listing as the CFO. He has also served as a senior associate with Merrill Lynch Investment Banking (M& A) and as a manager with Price Waterhouse\'s Strategic Consulting Group.</p>
                                                        <p>Kiran has a MBA from the Wharton School of Business and a B.A. from Brown University.</p>',
                     'mail'=>'',
                     'image'=>FULL_BASE_URL.'/img/kiran.png'),
                 'team_member5' => array(
                 	'name' =>'Nikhil Sama','designation'=>'Founder & Non-Executive Director',
                 	'info' => '<p> Nikhil is a passionate technologist and seasoned professional with over 12 years of experience in the Technology industry.  He is currently the founder and director for SnapLion, a mobile app creation engine for musicians.</p>
                               <p> Previously, Nikhil was Director at Rocket Internet GmbH where he incubated several start-ups (including Jabong.com, FabFurnish.com, Printvenue.com among others) and was a strategy consultant with Bain & Co in Chicago IL.<p/>
                               <p>Nikhil has an MBA from The University of Chicago – Booth School of Business, an M.S. from the University of Southern California and a B.Tech from Delhi College of Engineering.<p/>',
                    'mail' =>'','image'=>FULL_BASE_URL.'/img/nikhil.png'),
                 'team_member6'=>array(
                 	'name' =>'Shailesh Bhushan',
                 	'designation' =>'Finance Director',
                 	'info'=>'<p>Shailesh brings over 18 years of global experience within Finance and Operations. He hasin-depth knowledge of corporate accounting taxation, MIS and e-commerce.</p>
                             <p>Previously,Shailesh has worked with Transact Network Ltd. as V.P Finance managing the financial operations of its prepaid card business.  He has also worked with leading Indian business houses such as DLF and Reliance with scope of business in to construction, power, service, education, ITES and finance sector.</p>
                             <p>Shailesh is a fellow member of Institute of Chartered Accountants of India, New Delhi and holds a M.Com from Agra University.</p>',
                    'mail'=>'','image'=>FULL_BASE_URL.'/img/SB.jpg')));
       
           

           // $aboutus_json = json_encode($about_us);
            return $about_us;

     	}
	

	
}