<?php 
    $segment2 = $this->uri->segment(2);
    $catId = base64_decode($segment2);
    $parts = explode('_', $catId);
    // Get the last part (which is the last digit)
    $lastCatId = end($parts);
?>
    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-3 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image plr--9---" data-bg="<?= base_url(); ?>assets/<?= TEMPNAME; ?>/img/bg/9.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                        <div class="section-title-area ltn__section-title-2">
                            <h6 class="section-subtitle ltn__secondary-color">//  Welcome to our company</h6>
                            <h1 class="section-title white-color">Product</h1>
                        </div>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="<?= site_url(); ?>">Home</a></li>
                                <li>Product</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->
    
    <!-- PRODUCT DETAILS AREA START -->
    <div class="ltn__product-area ltn__product-gutter mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="ltn__shop-options">
                        <ul>
                            <li>
                                <div class="ltn__grid-list-tab-menu ">
                                    <div class="nav">
                                        <a class="active show" data-bs-toggle="tab" href="#liton_product_grid"><i class="fas fa-th-large"></i></a>
                                        <a data-bs-toggle="tab" href="#liton_product_list"><i class="fas fa-list"></i></a>
                                    </div>
                                </div>
                            </li>
                            <!-- <li>
                               <div class="showing-product-number text-right text-end">
                                    <span>Showing 1–12 of 18 results</span>
                                </div> 
                            </li> -->
                            <!-- <li>
                               <div class="short-by text-center">
                                    <select class="nice-select">
                                        <option>Default Sorting</option>
                                        <option>Sort by popularity</option>
                                        <option>Sort by new arrivals</option>
                                        <option>Sort by price: low to high</option>
                                        <option>Sort by price: high to low</option>
                                    </select>
                                </div> 
                            </li> -->
                        </ul>
                    </div>
                    <div class="tab-content">

                        <div class="loading" id="loader" style="display:none;"></div>
                        <div class="tab-pane fade active show" id="liton_product_grid">
                            <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                <?php if(isset($productData) && $productData !== NULL && $productData != "") { ?>
                                    <div class="row appended-button" id="productListDiv">
                                        <!-- ltn__product-item -->
                                        <?php foreach($productData as $prdData) { 
                                            $addedToCart = '';
                                            $title= "Add to Cart";
                                            $isAdded = 0;
                                            if (in_array($prdData->product_id, $pIdList)) {
                                                $addedToCart = 'prd_active';
                                                $title= "Already In Cart";
                                                $isAdded = 1;
                                            }?>
                                            <div class="col-xl-4 col-sm-6 col-6">
                                                <div class="ltn__product-item ltn__product-item-3 text-center">
                                                    <div class="product-img">
                                                        <a href="javascript:void(0);"><img src="<?php if(isset($prdData->product_url) && $prdData->product_url != NULL && $prdData->product_url != '') { echo $prdData->product_url; } else { echo base_url().'assets/'.TEMPNAME.'/img/product/NoProductImg.png'; } ?>" loading="lazy" alt="Product Image" class="pImg"></a>
                                                        <?php if($prdData->in_stock != true) { ?>
                                                            <div class="product-badge">
                                                                <ul>
                                                                    <li class="sale-badge">Out Off Stock</li>
                                                                </ul>
                                                            </div>
                                                        <?php } ?>
                                                        <div class="product-hover-action">
                                                                    <!-- title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal"  -->
                                                            <ul>
                                                                <li class="quick_view_button" data-key="<?= base64_encode($prdData->product_id); ?>">
                                                                    <a href="javascript:void(0);"> 
                                                                        <i class="far fa-eye"></i>
                                                                    </a>
                                                                </li>
                                                                <li class="add_to_cart <?php if($isAdded === 0){ echo 'isAddToCart'; } else { echo 'isNotAddToCart'; } ?>" data-key="<?= base64_encode($prdData->product_id); ?>" data-price="<?= base64_encode($prdData->price); ?>">
                                                                    <a href="javascript:void(0);" title="<?= $title; ?>" class="<?= $addedToCart; ?>">
                                                                        <i class="fas fa-shopping-cart"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <h2 class="product-title pTitleHeight"><a href="javascript:void(0);"><?php if(isset($prdData->product_name) && $prdData->product_name != NULL && $prdData->product_name != '') { echo $prdData->product_name; } else { echo 'NA'; } ?></a></h2>
                                                        <div class="product-price">
                                                            <span>₹<?php if(isset($prdData->price)) { echo $prdData->price; } else { echo '0.00'; } ?></span>
                                                            <del>₹<?php if(isset($prdData->MRP)) { echo $prdData->MRP; } else { echo '0.00'; } ?></del>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <!-- ltn__product-item -->
                                    </div>
                                <?php } else { ?>
                                    <div class="row">
                                        <!-- ltn__product-item -->
                                        <div class="col-xl-12 col-sm-6 col-6">
                                            No Listings Available 
                                        </div>
                                        <!-- ltn__product-item -->
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="liton_product_list">
                            <div class="ltn__product-tab-content-inner ltn__product-list-view">
                                <?php if(isset($productData) && $productData !== NULL && $productData != "") { ?>
                                    <div class="row appended-button" id="productListDiv1">
                                        <?php foreach($productData as $prdData) {
                                            $addedToCart = '';
                                            $title= "Add to Cart";
                                            $isAdded = 0;
                                            if (in_array($prdData->product_id, $pIdList)) {
                                                $addedToCart = 'prd_active';
                                                $title= "Already In Cart";
                                                $isAdded = 1;
                                            }
                                        ?>
                                        <!-- ltn__product-item -->
                                        <div class="col-lg-12">
                                            <div class="ltn__product-item ltn__product-item-3">
                                                <div class="product-img">
                                                    <a href="javascript:void(0);"><img src="<?php if(isset($prdData->product_url) && $prdData->product_url != NULL && $prdData->product_url != '') { echo $prdData->product_url; } else { echo base_url().'assets/'.TEMPNAME.'/img/product/NoProductImg.png'; } ?>" loading="lazy" alt="Product Image"></a>
                                                    <?php if($prdData->in_stock != true) { ?>
                                                        <div class="product-badge">
                                                            <ul>
                                                                <li class="sale-badge">Out Off Stock</li>
                                                            </ul>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <div class="product-info">
                                                    <h2 class="product-title"><a href="javascript:void(0);"><?php if(isset($prdData->product_name) && $prdData->product_name != NULL && $prdData->product_name != '') { echo $prdData->product_name; } else { echo 'NA'; } ?></a></h2>
                                                    <!-- <div class="product-ratting">
                                                        <ul>
                                                            <li><a href="javascript:void(0);"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="javascript:void(0);"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="javascript:void(0);"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="javascript:void(0);"><i class="fas fa-star-half-alt"></i></a></li>
                                                            <li><a href="javascript:void(0);"><i class="far fa-star"></i></a></li>
                                                        </ul>
                                                    </div> -->
                                                    <div class="product-price">
                                                        <span>₹<?php if(isset($prdData->price)) { echo $prdData->price; } else { echo '0.00'; } ?></span>
                                                        <del>₹<?php if(isset($prdData->MRP)) { echo $prdData->MRP; } else { echo '0.00'; } ?></del>
                                                    </div>
                                                    <?php if(isset($extra) && $extra != NULL && $extra != '') { ?>
                                                    <div class="product-brief">
                                                        <p><?= $extra; ?></p>
                                                    </div>
                                                    <?php } ?>
                                                    <div class="product-hover-action">
                                                        <ul>
                                                            <li class="quick_view_button" data-key="<?= base64_encode($prdData->product_id); ?>">
                                                                <a href="javascript:void(0)" title="Quick View">
                                                                    <i class="far fa-eye"></i>
                                                                </a>
                                                            </li>
                                                            <li class="add_to_cart <?php if($isAdded === 0){ echo 'isAddToCart'; } else { echo 'isNotAddToCart'; } ?>" data-key="<?= base64_encode($prdData->product_id); ?>" data-price="<?= base64_encode($prdData->price); ?>">
                                                                <a href="javascript:void(0)" title="<?= $title; ?>" class="<?= $addedToCart; ?>">
                                                                <!-- data-bs-toggle="modal" data-bs-target="#add_to_cart_modal" -->
                                                                    <i class="fas fa-shopping-cart"></i>
                                                                </a>
                                                            </li>
                                                            <!-- <li>
                                                                <a href="javascript:void(0);" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                                    <i class="far fa-heart"></i></a>
                                                            </li> -->
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <!-- ltn__product-item -->
                                    </div>
                                <?php } else { ?>
                                    <div class="row">
                                        <!-- ltn__product-item -->
                                        <div class="col-xl-12">
                                            No Listings Available 
                                        </div>
                                        <!-- ltn__product-item -->
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                    <!-- <div class="ltn__pagination-area text-center">
                        <div class="ltn__pagination">
                            <ul>
                                <li><a href="javascript:void(0);"><i class="fas fa-angle-double-left"></i></a></li>
                                <li><a href="javascript:void(0);">1</a></li>
                                <li class="active"><a href="javascript:void(0);">2</a></li>
                                <li><a href="javascript:void(0);">3</a></li>
                                <li><a href="javascript:void(0);">...</a></li>
                                <li><a href="javascript:void(0);">10</a></li>
                                <li><a href="javascript:void(0);"><i class="fas fa-angle-double-right"></i></a></li>
                            </ul>
                        </div>
                    </div> -->
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
                        <!-- Category Widget -->
                        <?php if(isset($categoryData) && $categoryData !== NULL && $categoryData != "") { ?>
                            <div class="widget ltn__menu-widget">
                                <h4 class="ltn__widget-title ltn__widget-title-border">Product categories</h4>
                                <ul id="catList">
                                    <?php $i=1; foreach($categoryData as $catData) {
                                        $cls = '';
                                        if($lastCatId == "") {
                                            if($i == 1) {
                                                $cls = 'active'; 
                                            }
                                        }if($lastCatId == $catData->category_id) { 
                                            $cls = 'active'; 
                                        } ?>
                                        <li class="categoryClass <?= $cls?>" my-cat="<?php if(isset($catData->category_id) && $catData->category_id !== NULL && $catData->category_id != "") { echo base64_encode($catData->category_id); } else { echo ""; } ?>"><a href="javascript:void(0);"><?php if(isset($catData->category) && $catData->category !== NULL && $catData->category != "") { echo $catData->category; } else { echo ""; } ?> <span><i class="fas fa-long-arrow-alt-right <?= $cls?>"></i></span></a></li>
                                    <?php $i++; } ?>
                                </ul>
                            </div>
                        <?php } ?>
                        <!-- Banner Widget -->
                        <div class="widget ltn__banner-widget">
                            <a href="<?= site_url('product'); ?>"><img src="<?= base_url(); ?>assets/<?= TEMPNAME; ?>/img/banner/banner-2.jpg" alt="#"></a>
                        </div>

                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT DETAILS AREA END -->

	<?php $this->load->view(TEMPNAME.'/layouts/footer.php'); ?>
</body>
</html>