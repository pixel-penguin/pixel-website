<template>
    <div class="row">
        <div class="col-lg-8">
            <div class="cart-table-container">
                <table class="table table-cart">
                    <thead>
                        <tr>
                            <th class="product-col">Product</th>
                            <th class="price-col">Price</th>
                            <th class="qty-col">Qty</th>
                            <th>Subtotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="cartEntry in cart" :key="cartEntry.id" class="product-row">
                            <td class="product-col">
                                <figure class="product-image-container">
                                    <a :href="'product/'+cartEntry.product.link_name" class="product-image">
                                        <img :src="'https://res.cloudinary.com/pixel-penguin/image/upload/c_fill,g_north,h_600,w_600/v1/'+cartEntry.product.gallery[0].image_name+'.jpg'" alt="product">
                                    </a>
                                </figure>
                                <h2 class="product-title">
                                    <a :href="'product/'+cartEntry.product.link_name">{{ cartEntry.name }}</a>
                                </h2>
                            </td>
                            <td>N${{cartEntry.price}}</td>
                            <td>
                                
                                <div class="input-group  bootstrap-touchspin bootstrap-touchspin-injected">
                                    <input v-model="cartEntry.quantity" class="vertical-quantity form-control" type="text">
                                    <span class="input-group-btn-vertical">
                                        <button @click="cartEntry.quantity++" class="btn btn-outline bootstrap-touchspin-up icon-up-dir" type="button"></button>
                                        <button @click="cartEntry.quantity--" class="btn btn-outline bootstrap-touchspin-down icon-down-dir" type="button"></button>
                                    </span>
                                </div>

                            </td>
                            <td>N${{cartEntry.price * cartEntry.quantity}}</td>

                            <td colspan="4" class="clearfix">
                                <div class="float-left">
                                    <!--<a href="#" class="btn-move">Move to Wishlist</a>-->
                                </div><!-- End .float-left -->

                                <div class="float-right">
                                    <!--<a href="#" title="Edit product" class="btn-edit"><span class="sr-only">Edit</span><i class="icon-pencil"></i></a>-->
                                    <a @click="removeItem(cartEntry.id)" href="#" title="Remove product" class="btn-remove"><span class="sr-only">Remove</span></a>
                                </div><!-- End .float-right -->
                            </td>
                        </tr>

                        
                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="5" class="clearfix">
                                <div class="float-left">
                                    <a href="/products" class="btn btn-outline-secondary">Continue Shopping</a>
                                </div><!-- End .float-left -->

                                <div class="float-right">
                                    <a @click="clearCart" class="btn btn-outline-secondary btn-clear-cart">Clear Shopping Cart</a>
                                    <a @click="updateCart" class="btn btn-outline-secondary btn-update-cart">Update Shopping Cart</a>
                                </div><!-- End .float-right -->
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div><!-- End .cart-table-container -->

            <!--
            <div class="cart-discount">
                <h4>Apply Discount Code</h4>
                <form action="#">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" placeholder="Enter discount code"  required>
                        <div class="input-group-append">
                            <button class="btn btn-sm btn-primary" type="submit">Apply Discount</button>
                        </div>
                    </div>
                </form>
            </div>
            -->
        </div><!-- End .col-lg-8 -->

        <div class="col-lg-4">
            <div class="cart-summary">
                <h3>Summary</h3>

                <h4>
                    <a data-toggle="collapse" href="#total-estimate-section" class="collapsed" role="button" aria-expanded="false" aria-controls="total-estimate-section">Estimate Shipping and Tax</a>
                </h4>

                <div class="collapse" id="total-estimate-section">
                    <form action="#">
                        <div class="form-group form-group-sm">
                            <label>Country</label>
                            <div class="select-custom">
                                <select class="form-control form-control-sm">
                                    <option value="USA">United States</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="China">China</option>
                                    <option value="Germany">Germany</option>
                                </select>
                            </div><!-- End .select-custom -->
                        </div><!-- End .form-group -->

                        <div class="form-group form-group-sm">
                            <label>State/Province</label>
                            <div class="select-custom">
                                <select class="form-control form-control-sm">
                                    <option value="CA">California</option>
                                    <option value="TX">Texas</option>
                                </select>
                            </div><!-- End .select-custom -->
                        </div><!-- End .form-group -->

                        <div class="form-group form-group-sm">
                            <label>Zip/Postal Code</label>
                            <input type="text" class="form-control form-control-sm">
                        </div><!-- End .form-group -->

                        <div class="form-group form-group-custom-control">
                            <label>Flat Way</label>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="flat-rate">
                                <label class="custom-control-label" for="flat-rate">Fixed $5.00</label>
                            </div><!-- End .custom-checkbox -->
                        </div><!-- End .form-group -->

                        <div class="form-group form-group-custom-control">
                            <label>Best Rate</label>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="best-rate">
                                <label class="custom-control-label" for="best-rate">Table Rate $15.00</label>
                            </div><!-- End .custom-checkbox -->
                        </div><!-- End .form-group -->
                    </form>
                </div><!-- End #total-estimate-section -->

                <table class="table table-totals">
                    <tbody>
                        <tr>
                            <td>Subtotal</td>
                            <td>N${{addCommas(subtotal)}}</td>
                        </tr>
                        <!--
                        <tr>
                            <td>Tax</td>
                            <td>$0.00</td>
                        </tr>
                        -->
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>Order Total</td>
                            <td>N${{addCommas(subtotal)}}</td>
                        </tr>
                    </tfoot>
                </table>

                <div class="checkout-methods">
                    <a href="/checkout" class="btn btn-block btn-sm btn-primary">Go to Checkout</a>
                    <a href="#" class="btn btn-link btn-block">Check Out with Multiple Addresses</a>
                </div><!-- End .checkout-methods -->
            </div><!-- End .cart-summary -->
        </div><!-- End .col-lg-4 -->
    </div><!-- End .row -->
		
</template>

<script>
    
    export default {
        name: 'Blogs',
        data(){
            return{
                loading: null,

                cart:[],
                subtotal:0,
                totalQuantity: 0.
                
                
            }
        },
        mounted() {
            const self = this;

            self.cloudinaryCloudName = process.env.MIX_CLOUDINARY_CLOUD_NAME;

            self.getCart();
        },
        methods:{

            updateCart(){
                const self = this;
                
                Hub.$refs.cartSystem.updateCart(self.cart);
                
                setTimeout(function(){
                    self.getCart();
                },1000)
                //var result = await Hub.$refs.cartSystem.updateCart(self.cart);
                
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
            removeItem(itemId){
				const self = this;

				//console.log(rowId);
				
				this.$swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, remove the item'
                    }).then((result) => {
                        if (result.value) {
                            
                            Hub.$refs.cartSystem.removeItem(itemId);

                            this.$swal({
                                toast: true,
                                position: 'bottom-end',
                                showConfirmButton: false,
                                timer: 3000,
                                type: 'success',
                                title: 'Product removed successfully'
                            })

                            setTimeout(function(){
                                self.getCart();
                            },1000)
                        }
                    })
			}, 
            clearCart(){
				const self = this;

				//console.log(rowId);
				
				this.$swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, clear the cart'
                    }).then((result) => {
                        if (result.value) {
                            
                            Hub.$refs.cartSystem.clearCart();

                            this.$swal({
                                toast: true,
                                position: 'bottom-end',
                                showConfirmButton: false,
                                timer: 3000,
                                type: 'success',
                                title: 'Cart Cleared Successfully'
                            })

                            setTimeout(function(){
                                self.getCart();
                            },1000);
							
                        }
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