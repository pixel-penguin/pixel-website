<template>
    <div class="container">
        <ul class="checkout-progress-bar">
            <li @click="step = 1" v-bind:class="{ 'active': step == 1 }">
                <span>Shipping</span>
            </li>
            <li @click="step = 2" v-bind:class="{ 'active': step == 2 }">
                <span>Review &amp; Payments</span>
            </li>
        </ul>
        <div class="row">
            <div class="col-lg-4">
                <div class="order-summary">
                    <h3>Summary</h3>

                    <h4>
                        <a data-toggle="collapse" href="#order-cart-section" class="collapsed" role="button" aria-expanded="false" aria-controls="order-cart-section">2 products in Cart</a>
                    </h4>

                    <div class="collapse" id="order-cart-section">
                        <table class="table table-mini-cart">
                            <tbody>
                                <tr>
                                    <td class="product-col">
                                        <figure class="product-image-container">
                                            <a href="product.html" class="product-image">
                                                <img src="assets/images/products/product-1.jpg" alt="product">
                                            </a>
                                        </figure>
                                        <div>
                                            <h2 class="product-title">
                                                <a href="product.html">Fleece Jacket</a>
                                            </h2>

                                            <span class="product-qty">Qty: 4</span>
                                        </div>
                                    </td>
                                    <td class="price-col">$360.00</td>
                                </tr>

                                <tr>
                                    <td class="product-col">
                                        <figure class="product-image-container">
                                            <a href="product.html" class="product-image">
                                                <img src="assets/images/products/product-2.jpg" alt="product">
                                            </a>
                                        </figure>
                                        <div>
                                            <h2 class="product-title">
                                                <a href="product.html">Men Watch-Black</a>
                                            </h2>

                                            <span class="product-qty">Qty: 4</span>
                                        </div>
                                    </td>
                                    <td class="price-col">$132.00</td>
                                </tr>
                            </tbody>    
                        </table>
                    </div><!-- End #order-cart-section -->
                </div><!-- End .order-summary -->

                <div class="checkout-info-box">
                    <h3 class="step-title">Ship To:
                        <a href="#" title="Edit" class="step-title-edit"><span class="sr-only">Edit</span><i class="icon-pencil"></i></a>
                    </h3>

                    <address>
                        Desmond Mason <br>
                        123 Street Name, City, USA <br>
                        Los Angeles, California 03100 <br>
                        United States <br>
                        (123) 456-7890
                    </address>
                </div><!-- End .checkout-info-box -->

                <div class="checkout-info-box">
                    <h3 class="step-title">Shipping Method: 
                        <a href="#" title="Edit" class="step-title-edit"><span class="sr-only">Edit</span><i class="icon-pencil"></i></a>
                    </h3>

                    <p>Flat Rate - Fixed</p>
                </div><!-- End .checkout-info-box -->
            </div><!-- End .col-lg-4 -->

            <div class="col-lg-8 order-lg-first">
                <div v-if="step == 1" class="checkout-payment">
                    
                    <ul class="checkout-steps">
                        <li>
                            <h2 class="step-title">Shipping Address</h2>

                            <form action="#">
                                <div class="form-group required-field">
                                    <label>Email Address </label>
                                    <div class="form-control-tooltip">
                                        <input type="email" class="form-control" required>
                                        <span class="input-tooltip" data-toggle="tooltip" title="We'll send your order confirmation here." data-placement="right"><i class="icon-question-circle"></i></span>
                                    </div><!-- End .form-control-tooltip -->
                                </div><!-- End .form-group -->

                                <div class="form-group required-field">
                                    <label>Password </label>
                                    <input type="password" class="form-control" required>
                                </div><!-- End .form-group -->
                                
                                <p>You already have an account with us. Sign in or continue as guest.</p>
                                <div class="form-footer">
                                    <button type="submit" class="btn btn-primary">LOGIN</button>
                                    <a href="forgot-password.html" class="forget-pass"> Forgot your password?</a>
                                </div><!-- End .form-footer -->
                            </form>

                            <form action="#">
                                <div class="form-group required-field">
                                    <label>First Name </label>
                                    <input type="text" class="form-control" required>
                                </div><!-- End .form-group -->

                                <div class="form-group required-field">
                                    <label>Last Name </label>
                                    <input type="text" class="form-control" required>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label>Company </label>
                                    <input type="text" class="form-control">
                                </div><!-- End .form-group -->

                                <div class="form-group required-field">
                                    <label>Street Address </label>
                                    <input type="text" class="form-control" required>
                                    <input type="text" class="form-control" required>
                                </div><!-- End .form-group -->

                                <div class="form-group required-field">
                                    <label>City  </label>
                                    <input type="text" class="form-control" required>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label>State/Province</label>
                                    <div class="select-custom">
                                        <select class="form-control">
                                            <option value="CA">California</option>
                                            <option value="TX">Texas</option>
                                        </select>
                                    </div><!-- End .select-custom -->
                                </div><!-- End .form-group -->

                                <div class="form-group required-field">
                                    <label>Zip/Postal Code </label>
                                    <input type="text" class="form-control" required>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label>Country</label>
                                    <div class="select-custom">
                                        <select class="form-control">
                                            <option value="USA">United States</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="China">China</option>
                                            <option value="Germany">Germany</option>
                                        </select>
                                    </div><!-- End .select-custom -->
                                </div><!-- End .form-group -->

                                <div class="form-group required-field">
                                    <label>Phone Number </label>
                                    <div class="form-control-tooltip">
                                        <input type="tel" class="form-control" required>
                                        <span class="input-tooltip" data-toggle="tooltip" title="For delivery questions." data-placement="right"><i class="icon-question-circle"></i></span>
                                    </div><!-- End .form-control-tooltip -->
                                </div><!-- End .form-group -->
                            </form>
                        </li>

                        <li>
                            <div class="checkout-step-shipping">
                                <h2 class="step-title">Shipping Methods</h2>

                                <table class="table table-step-shipping">
                                    <tbody>
                                        <tr>
                                            <td><input type="radio" name="shipping-method" value="flat"></td>
                                            <td><strong>$20.00</strong></td>
                                            <td>Fixed</td>
                                            <td>Flat Rate</td>
                                        </tr>

                                        <tr>
                                            <td><input type="radio" name="shipping-method" value="best"></td>
                                            <td><strong>$15.00</strong></td>
                                            <td>Table Rate</td>
                                            <td>Best Way</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><!-- End .checkout-step-shipping -->
                        </li>
                    </ul>

                </div><!-- End .checkout-payment -->
                <div v-if="step == 2" class="checkout-payment">
                    <h2 class="step-title">Payment Method:</h2>

                    <h4>Check / Money order</h4>

                    <div class="form-group-custom-control">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="change-bill-address" value="1">
                            <label class="custom-control-label" for="change-bill-address">My billing and shipping address are the same</label>
                        </div><!-- End .custom-checkbox -->
                    </div><!-- End .form-group -->

                    <div id="checkout-shipping-address">
                        <address>
                            Desmond Mason <br>
                            123 Street Name, City, USA <br>
                            Los Angeles, California 03100 <br>
                            United States <br>
                            (123) 456-7890
                        </address>
                    </div><!-- End #checkout-shipping-address -->

                    <div id="new-checkout-address" class="show">
                        <form action="#">
                            <div class="form-group required-field">
                                <label>First Name </label>
                                <input type="text" class="form-control" required>
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label>Last Name </label>
                                <input type="text" class="form-control" required>
                            </div><!-- End .form-group -->

                            <div class="form-group">
                                <label>Company </label>
                                <input type="text" class="form-control">
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label>Street Address </label>
                                <input type="text" class="form-control" required>
                                <input type="text" class="form-control" required>
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label>City  </label>
                                <input type="text" class="form-control" required>
                            </div><!-- End .form-group -->

                            <div class="form-group">
                                <label>State/Province</label>
                                <div class="select-custom">
                                    <select class="form-control">
                                        <option value="CA">California</option>
                                        <option value="TX">Texas</option>
                                    </select>
                                </div><!-- End .select-custom -->
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label>Zip/Postal Code </label>
                                <input type="text" class="form-control" required>
                            </div><!-- End .form-group -->

                            <div class="form-group">
                                <label>Country</label>
                                <div class="select-custom">
                                    <select class="form-control">
                                        <option value="USA">United States</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="China">China</option>
                                        <option value="Germany">Germany</option>
                                    </select>
                                </div><!-- End .select-custom -->
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label>Phone Number </label>
                                <div class="form-control-tooltip">
                                    <input type="tel" class="form-control" required>
                                    <span class="input-tooltip" data-toggle="tooltip" title="For delivery questions." data-placement="right"><i class="icon-question-circle"></i></span>
                                </div><!-- End .form-control-tooltip -->
                            </div><!-- End .form-group -->

                            <div class="form-group-custom-control">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="address-save">
                                    <label class="custom-control-label" for="address-save">Save in Address book</label>
                                </div><!-- End .custom-checkbox -->
                            </div><!-- End .form-group -->
                        </form>
                    </div><!-- End #new-checkout-address -->

                    <div class="clearfix">
                        <a href="#" class="btn btn-primary float-right">Place Order</a>
                    </div><!-- End .clearfix -->
                </div><!-- End .checkout-payment -->

                <div class="checkout-discount">
                    <h4>
                        <a data-toggle="collapse" href="#checkout-discount-section" class="collapsed" role="button" aria-expanded="false" aria-controls="checkout-discount-section">Apply Discount Code</a>
                    </h4>

                    <div class="collapse" id="checkout-discount-section">
                        <form action="#">
                                <input type="text" class="form-control form-control-sm" placeholder="Enter discount code"  required>
                                <button class="btn btn-sm btn-outline-secondary" type="submit">Apply Discount</button>
                        </form>
                    </div><!-- End .collapse -->
                </div><!-- End .checkout-discount -->
            </div><!-- End .col-lg-8 -->
        </div><!-- End .row -->
    </div>		
</template>

<script>
    
    export default {
        name: 'Blogs',
        data(){
            return{
                loading: null,
                step: 1,

                cart:[],
                subtotal:0,
                totalQuantity: 0,
                
                
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