
      <!-- content -->
      <div id="content">
      	<div class="wrapper">
         	<div class="mainContent">
            	<!-- featured box begin -->
            	<div id="featured">
                  <ul class="ui-tabs-nav">
                     <li class="ui-tabs-nav-item ui-tabs-selected" id="nav-fragment-1">
                        <div class="inner">
                           <a href="#fragment-1">
                              <img src="images/image1-small.jpg" alt="" />
                              Lorem ipsum dolor sit amet, lit sed 
                           </a>
                        </div>
                     </li>
                     <li class="ui-tabs-nav-item ui-tabs-selected" id="nav-fragment-2">
                        <div class="inner">
                           <a href="#fragment-2">
                              <img src="images/image2-small.jpg" alt="" />
                              Lorem ipsum dolor sit amet, lit sed 
                           </a>
                        </div>
                     </li>
                     <li class="ui-tabs-nav-item ui-tabs-selected last" id="nav-fragment-3">
                        <div class="inner">
                           <a href="#fragment-3">
                              <img src="images/image3-small.jpg" alt="" />
                              Lorem ipsum dolor sit amet, lit sed 
                           </a>
                        </div>
                     </li>
                  </ul>
                  <!-- First Content -->
                  <div id="fragment-1" class="ui-tabs-panel">
                     <img src="images/slide1.jpg" alt="" />
                     <div class="info">
                        <div class="inner">
                           <h2>Lorem ipsum dolor sit amet lit sed</h2> 
                           Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                           <a href="#" class="button">more</a>
                        </div>
                     </div>
                  </div>
                  <!-- Second Content -->
                  <div id="fragment-2" class="ui-tabs-panel ui-tabs-hide"> <img src="images/slide2.jpg" alt="" />
                     <div class="info" >
                        <div class="inner">
                           <h2>Ipsum dolor sit amet lit sed</h2> 
                           Consectetuer adipiscing lorem ipsum dolor sit amet, consectetuer adipiscing elit
                           <a href="#" class="button">more</a>
                        </div>
                     </div>
                  </div>
                  <!-- Third Content -->
                  <div id="fragment-3" class="ui-tabs-panel ui-tabs-hide"> <img src="images/slide3.jpg" alt="" />
                     <div class="info" >
                        <div class="inner">
                           <h2>Sit amet lit sed ipsum dolor</h2> 
                           Amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod, sed diam
                           <a href="#" class="button">more</a>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- featured box begin -->
               <h3>More Cricket News</h3>
               <div class="wrapper">
               	<div class="col-1">
                  	<h4><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam</a></h4>
                     <p><img alt="" src="images/1page-img1.jpg" /></p>
                     Lorem ipsum dolor sit amet, consectetuer adipisc elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam. <a href="#" class="button1">more</a>
                  </div>
                  <div class="col-2">
                  	<h4><a href="#">Ipsum dolor sit amet, consectetuer adipiscing elit, sed diam</a></h4>
                     <p><img alt="" src="images/1page-img2.jpg" /></p>
                     Dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam. <a href="#" class="button1">more</a>
                  </div>
               </div>
               <div class="line-hor"></div>
               <div class="wrapper">
               	<div class="col-1">
                  	<ul class="img-list">
                     	<li>
                           <img alt="" src="images/1page-img3.jpg" />
                           <h5>July 18, 2009</h5>
                           <a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing </a>
                        </li>
                        <li>
                           <img alt="" src="images/1page-img4.jpg" />
                           <h5>July 18, 2009</h5>
                           <a href="#">Ipsum dolor sit amet, consectetuer adipiscing</a>
                        </li>
                        <li class="last">
                           <img alt="" src="images/1page-img5.jpg" />
                           <h5>July 18, 2009</h5>
                           <a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing </a>
                        </li>
                     </ul>
                  </div>
                  <div class="col-2">
                  	<ul class="list1">
                     	<li><strong>July 18, 2009</strong><a href="#">Lorem ipsum dolor sit amet, cosectetuer...</a></li>
                        <li><strong>July 13, 2009</strong><a href="#">Ipsum dolor sit amet, cosectetuer...</a></li>
                        <li><strong>July 13, 2009</strong><a href="#">Dolor sit amet, cosectetuer...</a></li>
                        <li><strong>July 11, 2009</strong><a href="#">Ut wisi enim ad minim veniam...</a></li>
                        <li><strong>July 12, 2009</strong><a href="#">Lorem ipsum dolor sit amet, cosectetuer...</a></li>
                        <li><strong>July 08, 2009</strong><a href="#">Ut wisi enim ad minim veniamosectetuer...</a></li>
                        <li class="last"><strong>July 01, 2009</strong><a href="#">Lorem ipsum dolor sit ametr...</a></li>
                     </ul>
                     <div class="wrapper"><a href="#" class="link1"><b>all news</b></a></div>
                  </div>
               </div>
            </div>
            <div class="aside">
            	<div class="tabs">
               	<!-- tabs -->
                   <ul class="tabNavigation">
                       <li><a class="" href="#first">Top Batsman</a></li>
                       <li><a class="" href="#second">Top Bowlers</a></li>
                       <li><a class="" href="#third">Top Fielders</a></li>
                   </ul>
               	<!-- containers -->
                  <div class="box">
                  	<div class="inner">
                     	<div id="first" class="tabContainer">
                        	<div class="fixed-box">
                              <table>
                                 <caption class="first-item">First XI</caption>
                                 <thead>
                                    <tr>
                                       <td>Name</td>
                                       <td>Runs</td>
                                       <td>HS</td>
                                       <td>Avg</td>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 
                                 <?php foreach ($q_top_batsmen_1sts->result() as $row) : ?>
                                 	<tr>
                                       <td class="cell-1"><?php echo $row->initials_last_name; ?></td>
                                       <td class="cell-2"><?php echo $row->bat_runs; ?></td>
                                       <td class="cell-2"><?php echo $row->high_score; ?></td>
                                       <td class="cell-2"><?php echo $row->bat_avg; ?></td>
                                    </tr>
                                 <?php endforeach ; ?>
                                   
                                 </tbody>
                              </table>
                              <table>
                                 <caption>Second XI</caption>
                                 <thead>
                                    <tr>
                                       <td>Name</td>
                                       <td>Runs</td>
                                       <td>HS</td>
                                       <td>Avg</td>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 
                                 <?php foreach ($q_top_batsmen_2nds->result() as $row) : ?>
                                 	<tr>
                                       <td class="cell-1"><?php echo $row->initials_last_name; ?></td>
                                       <td class="cell-2"><?php echo $row->bat_runs; ?></td>
                                       <td class="cell-2"><?php echo $row->high_score; ?></td>
                                       <td class="cell-2"><?php echo $row->bat_avg; ?></td>
                                    </tr>
                                 <?php endforeach ; ?>
                                   
                                 </tbody>
                              </table>
                              <table>
                                 <caption>Sunday XI</caption>
                                 <thead>
                                    <tr>
                                       <td>Name</td>
                                       <td>Runs</td>
                                       <td>HS</td>
                                       <td>Avg</td>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 
                                 <?php foreach ($q_top_batsmen_sun->result() as $row) : ?>
                                 	<tr>
                                       <td class="cell-1"><?php echo $row->initials_last_name; ?></td>
                                       <td class="cell-2"><?php echo $row->bat_runs; ?></td>
                                       <td class="cell-2"><?php echo $row->high_score; ?></td>
                                       <td class="cell-2"><?php echo $row->bat_avg; ?></td>
                                    </tr>
                                 <?php endforeach ; ?>
                                   
                                 </tbody>
                              </table>
                           </div>
                           <div class="alignright"><a href="#">See All Cricket League Tables</a></div>
                         </div>
                         <div id="second" class="tabContainer">
                             <div class="fixed-box">
                              <table>
                                 <caption class="first-item">First XI</caption>
                                 <thead>
                                    <tr>
                                       <td>Name</td>
                                       <td>Wkts</td>
                                       <td>BB</td>
                                       <td>Avg</td>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 
                                 <?php foreach ($q_top_bowlers_1sts->result() as $row) : ?>
                                 	<tr>
                                       <td class="cell-1"><?php echo $row->initials_last_name; ?></td>
                                       <td class="cell-2"><?php echo $row->wickets; ?></td>
                                       <td class="cell-2"><?php echo $row->bowl_avg; ?></td>
                                       <td class="cell-2"><?php echo $row->bowl_avg; ?></td>
                                    </tr>
                                 <?php endforeach ; ?>
                                   
                                 </tbody>
                              </table>
                              <table>
                                 <caption>Second XI</caption>
                                 <thead>
                                    <tr>
                                       <td>Name</td>
                                       <td>Wkts</td>
                                       <td>BB</td>
                                       <td>Avg</td>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 
                                 <?php foreach ($q_top_bowlers_2nds->result() as $row) : ?>
                                 	<tr>
                                       <td class="cell-1"><?php echo $row->initials_last_name; ?></td>
                                       <td class="cell-2"><?php echo $row->wickets; ?></td>
                                       <td class="cell-2"><?php echo $row->bowl_avg; ?></td>
                                       <td class="cell-2"><?php echo $row->bowl_avg; ?></td>
                                    </tr>
                                 <?php endforeach ; ?>
                                   
                                 </tbody>
                              </table>
                              <table>
                                 <caption>Sunday XI</caption>
                                 <thead>
                                    <tr>
                                       <td>Name</td>
                                       <td>Wkts</td>
                                       <td>BB</td>
                                       <td>Avg</td>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 
                                 <?php foreach ($q_top_bowlers_sun->result() as $row) : ?>
                                 	<tr>
                                       <td class="cell-1"><?php echo $row->initials_last_name; ?></td>
                                       <td class="cell-2"><?php echo $row->wickets; ?></td>
                                       <td class="cell-2"><?php echo $row->bowl_avg; ?></td>
                                       <td class="cell-2"><?php echo $row->bowl_avg; ?></td>
                                    </tr>
                                 <?php endforeach ; ?>
                                   
                                 </tbody>
                              </table>
                           </div>
                           <div class="alignright"><a href="#">See All Cricket League Tables</a></div>
                         </div>
                         <div id="third" class="tabContainer">
                             <div class="fixed-box">
                              <table>
                                 <caption class="first-item">First XI</caption>
                                 <thead>
                                    <tr>
                                       <td>Name</td>
                                       <td>Ct</td>
                                       <td>St</td>
                                       <td>Total</td>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 
                                 <?php foreach ($q_top_fielders_1sts->result() as $row) : ?>
                                 	<tr>
                                       <td class="cell-1"><?php echo $row->initials_last_name; ?></td>
                                       <td class="cell-2"><?php echo $row->catches; ?></td>
                                       <td class="cell-2"><?php echo $row->stumpings; ?></td>
                                       <td class="cell-2"><?php echo $row->dismissals; ?></td>
                                    </tr>
                                 <?php endforeach ; ?>
                                   
                                 </tbody>
                              </table>
                              <table>
                                 <caption>Second XI</caption>
                                 <thead>
                                    <tr>
                                       <td>Name</td>
                                       <td>Ct</td>
                                       <td>St</td>
                                       <td>Total</td>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 
                                 <?php foreach ($q_top_fielders_2nds->result() as $row) : ?>
                                 	<tr>
                                       <td class="cell-1"><?php echo $row->initials_last_name; ?></td>
                                       <td class="cell-2"><?php echo $row->catches; ?></td>
                                       <td class="cell-2"><?php echo $row->stumpings; ?></td>
                                       <td class="cell-2"><?php echo $row->dismissals; ?></td>
                                    </tr>
                                 <?php endforeach ; ?>
                                   
                                 </tbody>
                              </table>
                              <table>
                                 <caption>Sunday XI</caption>
                                 <thead>
                                    <tr>
                                       <td>Name</td>
                                       <td>Ct</td>
                                       <td>St</td>
                                       <td>Total</td>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 
                                 <?php foreach ($q_top_fielders_sun->result() as $row) : ?>
                                 	<tr>
                                       <td class="cell-1"><?php echo $row->initials_last_name; ?></td>
                                       <td class="cell-2"><?php echo $row->catches; ?></td>
                                       <td class="cell-2"><?php echo $row->stumpings; ?></td>
                                       <td class="cell-2"><?php echo $row->dismissals; ?></td>
                                    </tr>
                                 <?php endforeach ; ?>
                                   
                                 </tbody>
                              </table>
                           </div>
                           <div class="alignright"><a href="#">See All Cricket League Tables</a></div>
                         </div>
                     </div>
                  </div>
               </div>
               <h3>Time Schedule</h3>
               <dl class="schedule">
               	<dt>Lorem ipsum dolor sit amet</dt>
                  <dd class="even"><a href="#">Lorem ipsum&nbsp; &nbsp; &nbsp; VS&nbsp; &nbsp; &nbsp; Dolor sit amet</a><span>12 Jun 2009</span></dd>
                  <dd><a href="#">Lorem ipsum&nbsp; &nbsp; &nbsp; VS&nbsp; &nbsp; &nbsp; Dolor sit amet</a><span>12 Jun 2009</span></dd>
                  <dd class="even"><a href="#">Set ipsum&nbsp; &nbsp; &nbsp; VS&nbsp; &nbsp; &nbsp; Dolor sit amet</a><span>12 Jun 2009</span></dd>
                  <dd><a href="#">Lorem ipsum&nbsp; &nbsp; &nbsp; VS&nbsp; &nbsp; &nbsp; Dolor sit amet</a><span>12 Jun 2009</span></dd>
               </dl>
               <dl class="schedule">
               	<dt>Set ipsum dolor sit amet</dt>
                  <dd class="even"><a href="#">Lorem ipsum&nbsp; &nbsp; &nbsp; VS&nbsp; &nbsp; &nbsp; Dolor sit amet</a><span>12 Jun 2009</span></dd>
                  <dd><a href="#">Magna ipsum&nbsp; &nbsp; &nbsp; VS&nbsp; &nbsp; &nbsp; Dolor sit amet</a><span>12 Jun 2009</span></dd>
                  <dd class="even"><a href="#">Lorem ipsum&nbsp; &nbsp; &nbsp; VS&nbsp; &nbsp; &nbsp; Dolor sit amet</a><span>12 Jun 2009</span></dd>
                  <dd><a href="#">Dolor  ipsum&nbsp; &nbsp; &nbsp; VS&nbsp; &nbsp; &nbsp; Dolor sit amet</a><span>12 Jun 2009</span></dd>
               </dl>
               <p class="alignright p3"><a href="#">See All Completed</a></p>
               <a href="#"><img alt="" src="images/banner.jpg" /></a>
            </div>
         </div>
      </div>