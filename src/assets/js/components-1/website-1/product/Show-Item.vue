<template>
    <div>
        
        


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
        props: ['product_id'],
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
            }
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

            self.getProductInfo();
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

                axios.get('/json/product/detail/'+self.product_id)
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
                
            
                Object.keys(self.attributesChosen).forEach(function(key) {
    
                    attributeToCompare.push(self.attributesChosen[key]);
                    
                })
                

                console.log();
                console.log('quantity:'+ self.quantity);
                self.product.prices.forEach(function(entry) {
                    //alert('nice');
                    if(JSON.stringify(attributeToCompare.sort()) === JSON.stringify(entry.keywordsArray.sort())){
                        //Vue.set(self.attributesChosen, entry.name, 'none');
                        self.priceSelected = entry;
                    }
                    
                })
                    
                
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