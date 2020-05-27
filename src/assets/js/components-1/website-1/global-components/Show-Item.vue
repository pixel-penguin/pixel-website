<template>
    <div>
        <div v-if="show" class="mfp-wrap mfp-close-btn-in mfp-auto-cursor mfp-ajax-product mfp-ready" tabindex="-1" style="overflow: hidden auto;; background:rgba(0,0,0,0.8);"><div class="mfp-container mfp-ajax-holder mfp-s-ready"><div class="mfp-content"><div class="product-single-container product-single-default product-quick-view container">
            <div class="row">
                <div class="col-lg-6 col-md-6 product-single-gallery">
                    

                    <hooper group="group1" :infiniteScroll="true" :rtl="true" :centerMode="true">
                        <slide v-for="productGallery in product.gallery" :key="productGallery.id">
                            <img style="width:100%" :src="'https://res.cloudinary.com/pixel-penguin/image/upload/c_fill,h_600,w_600/v1/'+productGallery.image_name+'.jpg'" />
                        </slide>

                        <hooper-navigation slot="hooper-addons"></hooper-navigation>
                    </hooper>

                    <hooper class="bottomSlider" group="group1" :infiniteScroll="true" :rtl="true" :itemsToShow="3" :centerMode="true">
                        <slide v-for="productGallery in product.gallery" :key="productGallery.id">
                            <img style="width:100%" :src="'https://res.cloudinary.com/pixel-penguin/image/upload/c_fill,h_600,w_600/v1/'+productGallery.image_name+'.jpg'" />
                        </slide>

                        <hooper-navigation slot="hooper-addons"></hooper-navigation>
                    </hooper>

                    

                </div><!-- End .col-lg-7 -->

                <div class="col-lg-6 col-md-6">
                    <div class="product-single-details">
                        <h1 class="product-title">{{ product.name }}</h1>


                        <div class="ratings-container">
                            <!--
                            <div class="product-ratings">
                                <span class="ratings" style="width:60%"></span>
                            </div>

                            <a href="#" class="rating-link">( 6 Reviews )</a>
                            -->
                        </div>

                        <div v-if="priceSelected == false" class="price-box" >
                            <span v-if="product.prices != undefined" class="product-price">from N${{addCommas(product.prices[0].price)}}</span>
                        </div><!-- End .price-box -->

                        <div v-else class="price-box">
                            
                            <div v-if="priceSelected.is_discount">
                                <span class="old-price">N${{addCommas(priceSelected.price)}}</span>
                                <span class="product-price">N${{addCommas(priceSelected.discounted_price)}}</span>
                            </div>
                            <div v-else>
                                <span class="product-price">N${{addCommas(priceSelected.price)}}</span>
                            </div>
                        </div><!-- End .price-box -->

                        <div class="product-desc">
                            <p v-html="product.detail_summary"></p>
                        </div><!-- End .product-desc -->

                        <div class="product-filters-container">
                            <div class="product-single-filter">
                                <label>Colors:</label>
                                <ul class="config-swatch-list">
                                    
                                    <li v-bind:class="{ 'active':attributesChosen.color != undefined && attributesChosen.color == colorEntry.name }" v-for="colorEntry in product.colors" :key="colorEntry.id" >
                                        <p>color is: {{attributesChosen.color}}</p>
                                        <a @click="chooseColor(colorEntry.name)" :style="'background-color: '+colorEntry.code"></a>
                                    </li>
                                    
                                </ul>
                            </div><!-- End .product-single-filter -->
                        </div><!-- End .product-filters-container -->

                        <div class="product-filters-container" v-for="attribute in product.attributes" :key="attribute.id">
                            <div class="product-single-filter">
                                <label>{{ attribute.name }}:</label>
                               
                               <div>
                                    <a @click="attributesChosen[attribute.name] = attributeEntry.value" v-bind:class="[attributesChosen[attribute.name] == attributeEntry.value ? 'btn-primary' : '', 'btn-default']" class="btn btn-sm btn-default"  style="padding:10px; border:1px solid #f0f0f0; font-family: Arial, Helvetica, sans-serif; text-transform:none; font-weight:none; margin:0 10px" v-for="attributeEntry in attribute.value" :key="attributeEntry.id">{{attributeEntry.value}}</a>
                                </div>
                                    
                            </div><!-- End .product-single-filter -->
                        </div><!-- End .product-filters-container -->

                        <div class="product-action">
                            <div class="product-single-qty">
                                <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                    
                                    <div @click="quantity--" class="btn btn-primary" style="font-size:16px">-</div>
                                    <input v-model="quantity" class="form-control" type="text">
                                    <div @click="quantity++" class="btn btn-primary" style="font-size:16px">+</div>

                                </div>
                            </div><!-- End .product-single-qty -->

                            <a style="cursor:pointer" v-if="priceSelected == false" class="paction add-cart" title="Add to Cart?" @click="showError('You have to select colors and/or types')">
                                <span>Add to Cart</span>
                            </a>
                            <a @click="addToCart()" style="cursor:pointer" v-else class="paction add-cart" title="Add to Cart">
                                <span>Add to Cart</span>
                            </a>
                            <!--
                            <a href="#" class="paction add-wishlist" title="Add to Wishlist">
                                <span>Add to Wishlist</span>
                            </a>
                            -->
                            <!--
                            <a href="#" class="paction add-compare" title="Add to Compare">
                                <span>Add to Compare</span>
                            </a>
                            -->
                        </div><!-- End .product-action -->

                        <!--
                        <div class="product-single-share">
                            <label>Share:</label>
                            
                            <div class="addthis_inline_share_toolbox" data-url="https://portotheme.com/html/porto_ecommerce/demo_2/" data-title="Porto - Bootstrap eCommerce Template" style="clear: both;"><div id="atstbx" class="at-resp-share-element at-style-responsive addthis-smartlayers addthis-animated at4-show" aria-labelledby="at-bf9cdd98-e13e-47c1-a0cb-f6c134aeaa1c" role="region"><span id="at-bf9cdd98-e13e-47c1-a0cb-f6c134aeaa1c" class="at4-visually-hidden">AddThis Sharing Buttons</span><div class="at-share-btn-elements"><a role="button" tabindex="0" class="at-icon-wrapper at-share-btn at-svc-facebook" style="background-color: rgb(76, 76, 76); border-radius: 26px;"><span class="at4-visually-hidden">Share to Facebook</span><span class="at-icon-wrapper" style="line-height: 20px; height: 20px; width: 20px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-facebook-1" class="at-icon at-icon-facebook" style="fill: rgb(255, 255, 255); width: 20px; height: 20px;"><title id="at-svg-facebook-1">Facebook</title><g><path d="M22 5.16c-.406-.054-1.806-.16-3.43-.16-3.4 0-5.733 1.825-5.733 5.17v2.882H9v3.913h3.837V27h4.604V16.965h3.823l.587-3.913h-4.41v-2.5c0-1.123.347-1.903 2.198-1.903H22V5.16z" fill-rule="evenodd"></path></g></svg></span></a><a role="button" tabindex="0" class="at-icon-wrapper at-share-btn at-svc-twitter" style="background-color: rgb(76, 76, 76); border-radius: 26px;"><span class="at4-visually-hidden">Share to Twitter</span><span class="at-icon-wrapper" style="line-height: 20px; height: 20px; width: 20px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-twitter-2" class="at-icon at-icon-twitter" style="fill: rgb(255, 255, 255); width: 20px; height: 20px;"><title id="at-svg-twitter-2">Twitter</title><g><path d="M27.996 10.116c-.81.36-1.68.602-2.592.71a4.526 4.526 0 0 0 1.984-2.496 9.037 9.037 0 0 1-2.866 1.095 4.513 4.513 0 0 0-7.69 4.116 12.81 12.81 0 0 1-9.3-4.715 4.49 4.49 0 0 0-.612 2.27 4.51 4.51 0 0 0 2.008 3.755 4.495 4.495 0 0 1-2.044-.564v.057a4.515 4.515 0 0 0 3.62 4.425 4.52 4.52 0 0 1-2.04.077 4.517 4.517 0 0 0 4.217 3.134 9.055 9.055 0 0 1-5.604 1.93A9.18 9.18 0 0 1 6 23.85a12.773 12.773 0 0 0 6.918 2.027c8.3 0 12.84-6.876 12.84-12.84 0-.195-.005-.39-.014-.583a9.172 9.172 0 0 0 2.252-2.336" fill-rule="evenodd"></path></g></svg></span></a><a role="button" tabindex="0" class="at-icon-wrapper at-share-btn at-svc-compact" style="background-color: rgb(76, 76, 76); border-radius: 26px;"><span class="at4-visually-hidden">Share to More</span><span class="at-icon-wrapper" style="line-height: 20px; height: 20px; width: 20px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-addthis-3" class="at-icon at-icon-addthis" style="fill: rgb(255, 255, 255); width: 20px; height: 20px;"><title id="at-svg-addthis-3">AddThis</title><g><path d="M18 14V8h-4v6H8v4h6v6h4v-6h6v-4h-6z" fill-rule="evenodd"></path></g></svg></span></a></div></div></div>
                        </div>
                        -->

                    </div><!-- End .product-single-details -->
                </div><!-- End .col-lg-5 -->
            </div><!-- End .row -->
            <button @click="show = false" title="Close (Esc)" type="button" class="mfp-close">×</button></div><!-- End .product-single-container --></div></div>
        </div>
    </div>
		
</template>

<script>
    import {
    Hooper,
    Slide,
    Progress as HooperProgress,
    Pagination as HooperPagination,
    Navigation as HooperNavigation
    } from 'hooper';
    import 'hooper/dist/hooper.css';
    
    export default {
        name: 'Blogs',
        data(){
            return{
                loading: null,
                cloudinaryCloudName: null,
                show: false,
                product: [],
                attributesChosen: [],

                priceSelected: false,

                quantity:1,
                
            }
        },
        watch: {
            // whenever question changes, this function will run
            
           attributesChosen: {
                handler: function (after, before) {
                    this.isProductSelected();
                },
                deep: true
            },
            quantity(){
                const self = this;

                if(self.quantity < 1){
                    self.quantity = 1;
                }
            },
            show(){
                const self = this;

                if(self.show){
                    $('body').addClass('swal2-shown');
                }
                else{
                    $('body').removeClass('swal2-shown');
                }
            },
        },
        components: {
            Hooper,
            Slide,
            HooperProgress,
            HooperPagination,
            HooperNavigation
        },
        mounted() {
            const self = this;

            self.cloudinaryCloudName = process.env.MIX_CLOUDINARY_CLOUD_NAME;


        },
        methods:{

            addToCart(){
                const self = this;
                
                Hub.$refs.cartSystem.addToCart(self.priceSelected.id, self.quantity);

                self.quantity = 1;
            },

            showError(errorMessage){
                this.$swal(
                    'Oops!',
                    errorMessage,
                    'error'
                );
            },
            chooseColor(color){
                const self = this;

                self.attributesChosen.color = color;
                //console.log(self.attributesChosen);
            },
                    
            getProductInfo(productId){
                const self = this;
                
                self.product = [];

                self.show = true;
                self.priceSelected = false;
                self.attributesChosen = [];

                axios.get('/json/product/detail/'+productId)
                .then(response => {
                    //console.log(response);

                    var data = response.data;
                    
                    self.product = data.obj;
                    

                    self.attributesChosen = new Object;
                    
                    Vue.set(self.attributesChosen, 'color', 'none');

                    self.product.attributes.forEach(function(entry) {
                        Vue.set(self.attributesChosen, entry.name, 'none');
                    })



                    /*
                    self.attributesChosen.push({color:'none'});

                    self.product.attributes.forEach(function(entry) {
                        self.attributesChosen.push({[entry.name] : 'none'});
                    })
                    */

                    console.log(self.attributesChosen);
                })
                .catch(error => {
                    console.log(error)
                    this.errored = true
                })

            },
            isProductSelected(){
                const self = this;

                var attributeToCompare = [];

                //alert('hi');
                
                //self.attributesChosen.forEach(function(entry) {
                
                //console.log('start');
               
                Object.keys(self.attributesChosen).forEach(function(key) {
    
                    attributeToCompare.push(self.attributesChosen[key]);
                    
                })

                //console.log(attributeToCompare);
                //console.log('quantity:'+ self.quantity);
                self.product.prices.forEach(function(entry) {
                    //alert('nice');
                    if(JSON.stringify(attributeToCompare.sort()) === JSON.stringify(entry.keywordsArray.sort())){
                        //Vue.set(self.attributesChosen, entry.name, 'none');
                        self.priceSelected = entry;
                    }
                    
                })
                //console.log('end');
                
                //JSON.stringify(actual.sort()) === JSON.stringify(expected.sort())
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