<template>
    <div class="dropdown cart-dropdown">
        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
            <span class="dropdown-cart-icon">
                <span v-if="totalQuantity > 0" class="cart-count">{{ totalQuantity }}</span>
            </span>
            <span class="dropdown-cart-text">Items</span>
        </a>

        <div class="dropdown-menu" style="max-height: 600px; overflow-y: auto">
            <div class="dropdownmenu-wrapper">
                <div class="dropdown-cart-products">
                    
                    
                    <div v-for="cartEntry in cart" :key="cartEntry.id" class="product">
                        <figure class="product-image-container">
                            <a href="product.html" class="product-image">
                                <img :src="'https://res.cloudinary.com/pixel-penguin/image/upload/c_fill,h_48,w_61/v1/'+cartEntry.product.gallery[0].image_name+'.jpg'" alt="product">
                            </a>
                        </figure>

                        <div class="product-details">
                            <h4 class="product-title">
                                <a @click="addToCart">{{cartEntry.name}}</a>
                            </h4>

                            <span class="cart-product-info">
                                <span class="cart-product-qty">{{cartEntry.quantity}}</span>
                                x N${{addCommas(cartEntry.price) }}
                            </span>
                        </div><!-- End .product-details -->

                        <a style="cursor:pointer" v-if="cartEntry.delete == 0" @click="cartEntry.delete = 1" class="btn-remove" title="Remove Product"><i class="icon-cancel"></i></a>
                        <a style="cursor:pointer" v-if="cartEntry.delete == 1" @click="removeItem(cartEntry.id)" class="btn-remove" title="Remove Product"><i style="color:#e01b1b" class="icon-cancel"></i></a>
                    </div><!-- End .product -->

                    
                </div><!-- End .cart-product -->

                <div class="dropdown-cart-total">
                    <span>SubTotal:</span>

                    <span class="cart-total-price">N${{addCommas(subtotal)}}</span>
                </div><!-- End .dropdown-cart-total -->

                <div class="dropdown-cart-action">
                    <a href="/cart/view" class="btn btn-primary">View Cart</a>
                    <a href="/checkout" class="btn btn-outline-primary">Checkout</a>
                </div><!-- End .dropdown-cart-total -->
            </div><!-- End .dropdownmenu-wrapper -->
        </div><!-- End .dropdown-menu -->
    </div><!-- End .dropdown -->
</template>

<script>
    export default {
        name: 'Blogs',
        data(){
            return{
                loading: null,
                cloudinaryCloudName: null,

                cart: [],

                subtotal: 0,
                totalQuantity: 0,

                successSound:new Audio('https://res.cloudinary.com/dhmwdhirs/video/upload/v1558165617/audio/admin-sounds/bigbox.mp3'),
                
            }
        },
        mounted() {
            const self = this;

            self.cloudinaryCloudName = process.env.MIX_CLOUDINARY_CLOUD_NAME;
            
            self.getCart();

        },
        methods:{
            
                    
            alertMe(){
                const self = this;

                alert('Hi there!');

            },

            loader(load){
                if(load == true){
                    $('.loading').fadeIn();
                }
                else{
                    $('.loading').fadeOut();
                }
            },
            updateCart(cart){

                const self = this; 

                
                 self.loader(true);

                 axios.post('/cart/update',{
                    cart: cart
                })
                .then(response => {
                    //console.log(response);

                    var data = response.data;
                    
                    self.getCart();

                    this.$swal({
                        toast: true,
                        position: 'bottom-end',
                        showConfirmButton: false,
                        timer: 3000,
                        type: 'success',
                        title: 'Cart successfully updated',
                        onOpen: function() {
                            self.successSound.play();
                        }
                    })
                
                    console.log(data);
                })
                .catch(error => {
                    console.log(error)
                    this.errored = true
                })
            },
            addToCart(productPriceId, quantity){
                const self = this;

                self.loader(true);
                
                axios.post('/cart/add',{
                    productPriceId: productPriceId,
                    quantity: quantity,
                })
                .then(response => {
                    //console.log(response);

                    var data = response.data;
                    
                    self.getCart();

                    this.$swal({
                        toast: true,
                        position: 'bottom-end',
                        showConfirmButton: false,
                        timer: 3000,
                        type: 'success',
                        title: 'Product Added Successfully',
                        onOpen: function() {
                            self.successSound.play();
                        }
                    })
                
                    console.log(data);
                })
                .catch(error => {
                    console.log(error)
                    this.errored = true
                })
            },

            getCart(){
                const self = this;

                //self.loader(true);

                axios.get('/cart/get')
                .then(response => {
                    //console.log(response);

                    var data = response.data;
                    
                    self.cart = data.obj;

                    self.subtotal = data.subtotal;
                    self.totalQuantity = data.totalQuantity;

                    self.loader(false);
                    //console.log(data);
                })
                .catch(error => {
                    console.log(error)
                    this.errored = true
                })
            },
            
            removeItem(productPriceId){
                const self = this;
                
                axios.post('/cart/remove',{
                    productPriceId: productPriceId
                })
                .then(response => {
                    //console.log(response);

                    var data = response.data;
                    
                    self.getCart();

                    console.log(data);
                })
                .catch(error => {
                    console.log(error)
                    this.errored = true
                })
            },   
            clearCart(){
                axios.post('/cart/clear')
                .then(response => {
                    //console.log(response);

                    var data = response.data;
                    
                    self.getCart();                    
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
