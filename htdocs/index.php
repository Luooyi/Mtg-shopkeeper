<?php include "main_headers.php";?>
<body>
<?php include "main_navs.php";?>

<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="imgs/hero-slider_preorder_4__61124.webp" class ="center" style ="width: 85%"alt="CMDR Legends">
    </div>
    <div class="carousel-item">
      <img src="imgs/hero-slider_order-now__06201.webp" class ="center" style ="width: 85%"alt="ZNR Rising">
    </div>
    <div class="carousel-item">
      <img src="imgs/buying-mtg-hero_2.webp" class ="center" style ="width: 85%" alt="Buy mtg">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>


</div><!--div navbars -->

<!-- div Home Dashboard -->
<div class ="container">
    </div class="container">
        <div class="row">
            <div class="column">
                <div class="home-box item" style ="margin: 20px;">
                    <!-- News -->
                    <div class="title news" >
                        <h3> 
                            News
                            <span>
                            <a href="submitnew.php" style=" font-size:60%">
                            Submit News </a>
                            </span>
                            </h3>
                    </div>
                <div class ="content news-list">
                    <ul id ="news-items"> 
                        <li>
                            <a href="articles.mtgshopkeeper.com/news#1.php">
                            Return Of The Arena Open, Kaladesh Remastered Headline MTG Arena State Of The Game
                            </a>
                        </li>
                        <li>
                        <a href="https://articles.starcitygames.com/?post_type=news&amp;p=69363">Massive Leak Gives Possible First Look At Commander Legends</a>
                        </li>
                        <li>
                            <a href="articles.mtgshopkeeper.com/news#1.php">
                            Omnath, Lucky Clover, Escape to the Wilds Headline WotC Surprise Banned & Restricted Announcement
                            </a>
                        </li>
                        <li>
                        <a href="https://articles.starcitygames.com/?post_type=news&amp;p=69201">Good Morning Magic Gives Legendary Lore</a>
                        </li>
                    </ul>
                    <div class ="more-links">
                      <div class ="view-more">
                      <a href ="#"> View More </a>
                      </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="column">
                <div class="home-box item" style ="margin: 20px;">
                    <!-- News -->
                    <div class="title news" >
                        <h3> 
                            Recent Articles
                            <span>
                        <?php if(isset($_SESSION['open'])){ ?>
                            <a href="new_article.php" style=" font-size:60%">
                            Submit Article </a>
                        <?php } ?>
                            </span>
                            </h3>
                    </div>
                <div class ="content news-list">
                    <ul id ="news-items"> 
                        <li>
                            <a href="/articles.php?articulo=1">
                            Articulo Nuevo 1
                            </a>
                        </li>
                        <li>
                        <a href="/articles.php?articulo=2">Articulo Nuevo 2</a>
                        </li>
                        <li>
                            <a href="/articles.php?articulo=9">
                            Articulo Nuevo 3
                            </a>
                        </li>
                        <li>
                        <a href="/articles.php?articulo=10">Articulo Nuevo 4</a>
                        </li>
                    </ul>
                    <div class ="more-links">
                      <div class ="view-more">
                      <a href ="#"> View More </a>
                      </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="column">
                <div class="home-box item" style ="margin: 20px;">
                    <!-- News -->
                    <div class="title news" >
                        <h3> 
                            Videos
                            </h3>
                    </div>
                <div class ="content news-list">
                    <ul id ="news-items"> 
                        <li>
                            <a href="/articles.php?articulo=3">
                            Video 1
                            </a>
                        </li>
                        <li>
                        <a href="/articles.php?articulo=8">Video 2</a>
                        </li>
                        <li>
                            <a href="/articles.php?articulo=7">
                            Video 3
                            </a>
                        </li>
                        <li>
                        <a href="/articles.php?articulo=6">Video 4</a>
                        </li>
                    </ul>
                    <div class ="more-links">
                      <div class ="view-more">
                      <a href ="#"> View More </a>
                      </div>
                    </div>
                </div>
                </div>
            </div>


        </div>
    </div>
</div>




</body>

</html>