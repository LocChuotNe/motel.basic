<section class="page-start-banner">
    <div class="container">
        <div class="breadcrumb">
            <?php if(isset($breadcrumb) && is_array($breadcrumb) && count($breadcrumb)) {?>
            <ul>
                <li><a href="">Home</a></li>
                <?php foreach($breadcrumb as $key => $val) {?>
                <li><a href="<?php echo $val['canonical'] ?>" class="active"><?php echo $val['title'] ?></a></li>
                <?php } ?>
            </ul>
            <?php } ?>
        </div>
        <div class="heading">
            <h2><?php echo $detailCatalogue['title'] ?></h2>
        </div>
    </div>
</section>
<section class="products background-1 sec-mar">
    <div class="container">
        <!-- <div class="row mb-3 justify-content-between">
            <div class="col-xl-5 col-lg-4 col-md-6">
                <div class="search-bar">
                    <form method="get" action="">
                        <div class="form-group has-search">
                            <button type="submit" class="fa fa-search form-control-shop"></button>
                            <input type="text"  name="keyword" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>" class="form-control" placeholder="Search">
                        </div>
                    </form>
                </div>  
            </div>
        </div>  -->
        <?php if(isset($fileList) && is_array($fileList) && count($fileList)) {?>
        <div class="row">
            <?php foreach($fileList as $key=> $val) {?>
            <div class="col-lg-4 col-md-6">
                <div class="product-grid sal-animate" data-sal="slide-up" data-sal-duration="1000" data-sal-delay="100">
                    <img src="<?php echo $val['image'] ?>" alt="">
                    <div class="content">
                        <h5 class="title"><?php echo $val['title'] ?></h5>
                        <hr>
                        <p class="price"><?php echo $val['icon'] ?></p>
                        <div class="detail"><?php echo $val['description'] ?></div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
        <div id="pagination" class="pagination-wrape">
            <?php echo (isset($pagination)) ? $pagination : ''; ?>
        </div>
    </div>
</section>