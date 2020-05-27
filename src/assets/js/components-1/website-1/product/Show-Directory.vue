<template>
    <div class="row">
				<div class="col-lg-9">
					<nav class="toolbox">
						<div class="toolbox-left">
							<div class="toolbox-item toolbox-sort">
								<label>Sort By:</label>

								<div class="select-custom">
									<select @change="getProducts" name="orderby" class="form-control" v-model="orderBy">
										<option :value="{type: 'products.name', by: 'asc'}">Default sorting</option>
										<!--
										<option value="popularity">Sort by popularity</option>
										<option value="rating">Sort by average rating</option>										
										-->
										<option :value="{type: 'products.created_at', by: 'asc'}" >Sort by newness</option>
										<option :value="{type: 'product_prices.price', by: 'asc'}">Sort by price: low to high</option>
										<option :value="{type: 'product_prices.price', by: 'desc'}">Sort by price: high to low</option>
									</select>
								</div><!-- End .select-custom -->

								<a href="#" class="sorter-btn" title="Set Ascending Direction"><span class="sr-only">Set Ascending Direction</span></a>
							</div><!-- End .toolbox-item -->
						</div><!-- End .toolbox-left -->

						<div class="toolbox-item toolbox-show">
							<!--
							<label>Show:</label>

							<div class="select-custom">
								<select name="count" class="form-control">
									<option value="9">9 Products</option>
									<option value="18">18 Products</option>
									<option value="27">27 Products</option>
								</select>
							</div>
							-->
						</div><!-- End .toolbox-item -->

						<div class="layout-modes">
							<!--
							<a href="category.html" class="layout-btn btn-grid active" title="Grid">
								<i class="icon-mode-grid"></i>
							</a>
							<a href="category-list.html" class="layout-btn btn-list" title="List">
								<i class="icon-mode-list"></i>
							</a>
							-->
						</div><!-- End .layout-modes -->
					</nav>


					<div class="row row-sm">


						<div v-for="productEntry in products" :key="productEntry.id" class="col-6 col-md-3">
							<div class="product-default inner-quickview inner-icon">
								<figure>
									<a :href="'/product/'+productEntry.link_name">
										<img :src="'https://res.cloudinary.com/pixel-penguin/image/upload/c_fill,h_200,w_200/v1/'+ productEntry.gallery[0].image_name +'.jpg'">
										<img :src="'https://res.cloudinary.com/pixel-penguin/image/upload/c_fill,h_200,w_200/v1/'+ productEntry.gallery[0].image_name +'.jpg'">
									</a>
                                    <!--
									<div class="label-group">
										<div v-if="productEntry.is_discount == 1" class="product-label label-cut">-{{ Math.round((productEntry.price - productEntry.discounted_price) * 100 / productEntry.price) }}%</div>
									</div>
                                    -->
									<div class="btn-icon-group">
										<button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-bag"></i></button>
									</div>
									<a :onClick="'Hub.$refs.showItem.getProductInfo('+productEntry.id+')'" class="btn-quickview" title="Quick View" style="cursor:pointer">Quick View</a> 
								</figure>
								<div class="product-details">
                                    
									<div class="category-wrap">
										<div class="category-list">
											<a href="#" class="product-category">{{productEntry.category.name}}</a>
										</div>
										<!--<a href="#" class="btn-icon-wish"><i class="icon-heart"></i></a>-->
									</div>
									<h2 class="product-title">
										<a :href="'/product/'+productEntry.link_name">{{ productEntry.name }}</a>
									</h2>
									<div class="ratings-container">
										<!--
                                        <div class="product-ratings">
											<span class="ratings" style="width:100%"></span>
											<span class="tooltiptext tooltip-top"></span>
										</div>
                                        -->
									</div><!-- End .product-container -->
									<div class="price-box">
                                        <div v-if="productEntry.prices[0].is_discount">
                                            <span class="old-price">N${{ addCommas(productEntry.prices[0].price) }}</span>
                                            <span class="product-price">From N${{ addCommas(productEntry.prices[0].discounted_price) }}</span>
                                        </div>
                                        <div v-else>
										    <span class="product-price">From N${{ addCommas(productEntry.prices[0].price) }}</span>
                                        </div>
									</div><!-- End .price-box -->
                                    
								</div><!-- End .product-details -->
							</div>
						</div><!-- End .col-md-4 -->

						
					</div><!-- End .row -->

					<nav class="toolbox toolbox-pagination">
						<div class="toolbox-item toolbox-show">
							
							<!--
							<label>Show:</label>

							<div class="select-custom">
								<select name="count" class="form-control">
									<option value="9">9 Products</option>
									<option value="18">18 Products</option>
									<option value="27">27 Products</option>
								</select>
							</div>
							-->
							<!-- End .select-custom -->
						</div><!-- End .toolbox-item -->

						<ul class="pagination">
							<li class="page-item disabled">
								<a class="page-link page-link-btn" href="#"><i class="icon-angle-left"></i></a>
							</li>
							<li class="page-item active">
								<a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
							</li>
							<!--
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item"><a class="page-link" href="#">4</a></li>
							<li class="page-item"><a class="page-link" href="#">5</a></li>
							-->
							<!--<li class="page-item"><span class="page-link">...</span></li>-->
							<li class="page-item">
								<a class="page-link page-link-btn" href="#"><i class="icon-angle-right"></i></a>
							</li>
						</ul>
					</nav>
				</div><!-- End .col-lg-9 -->

				<aside class="sidebar-shop col-lg-3 order-lg-first">
					<div class="sidebar-wrapper">
						<div class="widget">
							<h3 class="widget-title">
								<a data-toggle="collapse" href="#widget-body-1" role="button" aria-expanded="true" aria-controls="widget-body-1">Categories</a>
							</h3>

							<div class="collapse show" id="widget-body-1">
								<div class="widget-body">
									
									<ul>
										<li v-for="category1 in productCategories" :key="category1.id">
											<div style="background:#333; color:#FFF; padding:6px 12px; border-radius:5px; margin-top:20px">{{ category1.name }}</div>
											<ul v-if="category1.children.length > 0">
												<li  style="padding:3px 6px;" v-for="category2 in category1.children" :key="category2.id">
													
													<a v-if="category2.children.length > 0">{{ category2.name }}<i style="margin-left:20px" class="fas fa-chevron-down"></i></a>
													<a v-else :href="'/products/'+category2.id" style="cursor:pointer">{{ category2.name }}</a>

													<ul v-if="category2.children.length > 0">
														<li style="padding:3px 6px;" v-for="category3 in category2.children" :key="category3.id">
															<a :href="'/products/'+category3.id"> - {{ category3.name }}</a>															
														</li>

													</ul>
												</li>

											</ul>
										</li>
									</ul>
									
								</div><!-- End .widget-body -->
							</div><!-- End .collapse -->
						</div><!-- End .widget -->

						

						<div class="widget widget-featured">
							<h3 class="widget-title">Featured Products</h3>

							<div class="widget-body">
								<div class="owl-carousel widget-featured-products">
									<div class="featured-col">
										
										
										<div v-for="featuredProduct in featuredProducts" :key="featuredProduct.id" class="product-default left-details product-widget">
											<figure>
												<a :href="'/product/'+featuredProduct.link_name">
													<img :src="'https://res.cloudinary.com/pixel-penguin/image/upload/c_fill,h_200,w_200/v1/'+featuredProduct.gallery[0].image_name+'.jpg'">
												</a>
											</figure>
											<div class="product-details">
												<h2 class="product-title">
													<a :href="'/product/'+featuredProduct.link_name">{{featuredProduct.name}}</a>
												</h2>
												<div class="ratings-container">
													<!--
													<div class="product-ratings">
														
														<span class="ratings" style="width:100%"></span>
														<span class="tooltiptext tooltip-top"></span>
														
													</div>
													-->
													<!-- End .product-ratings -->
												</div><!-- End .product-container -->
												<div class="price-box">
													<span class="product-price">N${{featuredProduct.prices[0].price}}</span>
												</div><!-- End .price-box -->
											</div><!-- End .product-details -->
										</div>


										
									</div><!-- End .featured-col -->

									
								</div><!-- End .widget-featured-slider -->
							</div><!-- End .widget-body -->
						</div><!-- End .widget -->

						<!--
						<div class="widget widget-block">
							<h3 class="widget-title">Custom HTML Block</h3>
							<h5>This is a custom sub-title.</h5>
							<p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mi. </p>
						</div>
						-->
						<!-- End .widget -->
					</div><!-- End .sidebar-wrapper -->
				</aside><!-- End .col-lg-3 -->
			</div><!-- End .row -->
		
</template>

<script>
   
   export default {
        name: 'Blogs',
        data(){
            return{
                loading: null,
                cloudinaryCloudName: null,
                
                products: [],



                orderBy: {type: 'products.name', by: 'asc'},
				orderType: 'ASC',
				take: 20,
				skip: 0,

				productCategories: [],

				featuredProducts:[]
            }
        },
        props: ['product_category_id'],
        watch: {
            
        },
        mounted() {
            const self = this;

            self.cloudinaryCloudName = process.env.MIX_CLOUDINARY_CLOUD_NAME;

            //alert(self.product_category_id);
            self.getProducts();


        },
        methods:{
            
            showError(errorMessage){
                this.$swal(
                    'Oops!',
                    errorMessage,
                    'error'
                );
            },  
            getProducts(){
                const self = this;
                
				//axios.get('/json/products/get/'+self.product_category_id+'/'+self.orderBy)
				axios.get('/json/products/get/'+self.product_category_id+'/'+self.take+'/'+self.skip+'/'+self.orderBy.type+'/'+self.orderBy.by+'')
				
                .then(response => {
                    //console.log(response);

                    var data = response.data;
                    
					self.products = data.obj;
					
					self.productCategories = data.productCategories;      
					
					self.featuredProducts = data.featuredProducts;

                   
                })
                .catch(error => {
                    console.log(error)
                    this.errored = true
                })

            },
            addCommas(nStr){
                nStr += '';
                var x = nStr.split('.');
                var x1 = x[0];
                var x2 = x.length > 1 ? '.' + x[1] : '';
                var rgx = /(\d+)(\d{3})/;
                while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
                }
                return x1 + x2;
            }
            
        }

    }

</script>
<style v-if="show">
.hooper{height: auto;}
</style>