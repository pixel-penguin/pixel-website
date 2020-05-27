<template>
    <div class="container">
        <div id="map"></div><!-- End #map -->

        <div class="row">
            <div class="col-md-8">
                <h2 class="light-title">Write <strong>Us</strong></h2>

                <form @submit="sendMessage">
                    
                    <div class="row">

                        <div class="col-md-6 form-group required-field">
                            <label for="contact-name">Name</label>
                            <input v-model="name" type="text" class="form-control" id="contact-name" name="contact-name" required>
                        </div><!-- End .form-group -->

                        <div class="col-md-6 form-group required-field">
                            <label for="contact-email">Email</label>
                            <input required v-model="email" type="email" class="form-control" id="contact-email" name="contact-email">
                        </div><!-- End .form-group -->

                        <div class="col-md-6 form-group">
                            <label for="contact-phone">Phone Number</label>
                            <input v-model="telephone" type="tel" class="form-control" id="contact-phone" name="contact-phone">
                        </div><!-- End .form-group -->

                        <div class="col-md-6 form-group required-field">
                            <label for="contact-name">Subject</label>
                            <input v-model="subject" type="text" class="form-control" id="contact-name" name="contact-name" required>
                        </div><!-- End .form-group -->

                        <div class="col-md-12 form-group required-field">
                            <label for="contact-name">What is {{random1}} + {{random2}}</label>
                            <input style="max-width:100%" v-model="security2" type="number" class="form-control" id="contact-name" name="contact-name" :placeholder="'What is '+random1+' + '+random2+'?'" required>
                        </div><!-- End .form-group -->

                        <div class="col-md-12 form-group required-field">
                            <label for="contact-message">What’s on your mind?</label>
                            <textarea style="max-width:100%" cols="30" rows="1" id="contact-message" class="form-control" name="contact-message" required></textarea>
                        </div><!-- End .form-group -->

                        <div class="form-footer">
                            
                            <button v-if="loading == false" class="btn btn-primary" type="submit"> Send Message</button>
                            <div v-if="loading" class="btn btn-primary"><i class='fa fa-spinner fa-spin '></i> Sending Message</div>
                        </div><!-- End .form-footer -->
                    </div>
                </form>
            </div><!-- End .col-md-8 -->

            <div class="col-md-4">
                <h2 class="light-title">Contact <strong>Details</strong></h2>

                <div class="contact-info">
                    <div>
                        <i class="icon-phone"></i>
                        <p>Contact number</p>
                        <p><a :href="'tel:'+ websitePhone">{{websitePhone}}</a></p>
                    </div>
                    <!--
                    <div>
                        <i class="icon-mobile"></i>
                        <p><a href="tel:">201-123-3922</a></p>
                        <p><a href="tel:">302-123-3928</a></p>
                    </div>
                    -->
                    <div>
                        <i class="icon-mail-alt"></i>
                        <p>Contact Email</p>
                        <p><a :href="'mailto:'+websiteEmail">{{websiteEmail}}</a></p>
                    </div>
                    <!--
                    <div>
                        <i class="icon-skype"></i>
                        <p>porto_skype</p>
                        <p>porto_template</p>
                    </div>
                    -->
                </div><!-- End .contact-info -->
            </div><!-- End .col-md-4 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
		
</template>

<script>
    export default {
        name: 'tree-menu',
        data(){
            return{
                random1:Math.floor((Math.random() * 10) + 1),
                random2:Math.floor((Math.random() * 10) + 1),
                security1:0,
                security2:null,
                name:null,
                email:null,
                telephone: null,
                subject:null,
                message:null,
                loading: false,
                websitePhone: null,
                websiteEmail: null,

            }
        },
        mounted() {
            const self = this;

            self.security1 = self.random1 + self.random2;


            self.websitePhone = process.env.MIX_WEBSITE_DETAIL_PHONE;
            self.websiteEmail = process.env.MIX_WEBSITE_DETAIL_EMAIL;

            //alert(self.websitePhone);
            //alert(process.env.MIX_WEBSITE_DETAIL_PHONE);

        },
        methods:{
            sendMessage(e){
                const self = this;

                e.preventDefault();

                self.loading = true;

                Vue.axios.post('/json/submitcontactform',{
                    name:self.name,
                    email:self.email,
                    subject:self.subject,
                    message:self.message,
                    telephone: self.telephone,
                    security1:self.security1,
                    security2:self.security2
                })
                .then(response => {
                    //console.log(response);

                    var data = response.data;

                    if(data.success == true){
                        self.$swal(
                            'Success!',
                            'The email has been sent, we will respond as soon as possible!',
                            'success');

                        self.name = null;
                        self.email = null;
                        self.subject = null;
                        self.telephone = null;
                        self.message = null;
                        self.security2 = null;
                    }
                    else{
                        self.$swal(
                            'Sorry!',
                            data.message,
                            'error');
                    }
                    self.loading = false
                    
                })
                .catch(error => {
                    console.log(error)
                    this.errored = true
                    self.loading = false;
                })

                //alert('wut');
            }
        }

    }

</script>