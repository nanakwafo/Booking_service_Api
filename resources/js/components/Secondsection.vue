<template>
<section id="booking">
    <header>
        <h2>Booking</h2>
    </header>
    <div class="content">
        
        
        <form @submit.prevent="addBooking">

            <div class="fields">
                <div class="field half">
                    <input :required="validate" type="text" name="lastname" placeholder="Last Name" v-model="booking.lastname" />
                </div>
                <div class="field half">
                    <input :required="validate" type="text" name="firstname" placeholder="Firstname" v-model="booking.firstname" />
                </div>
                <div class="field half">
                    <input :required="validate" type="tel" name="tel" placeholder="Tel" v-model="booking.tel" />
                </div>
                <div class="field half">
                    <input :required="validate" type="email" name="email" placeholder="Email" v-model="booking.email" />
                </div>
                <div class="field half">
                    <input :required="validate" type="date" name="date" placeholder="Select A Date" v-model="booking.date" />
                </div>
                <div class="field half">
                    <input :required="validate" type="text" name="time" placeholder="Select A Time" v-model="booking.time" />
                </div>
                <div class="field">
                    <select :required="validate" name="service_id" id="service_id" v-model="booking.service_id">
                        <option value="" disabled>Select and option</option>
                        <option v-for="service in services" v-bind:key="service.id" v-bind:value="service.id">{{service.name}}</option>

                    </select>
                </div>
                <div class="field ">
                    <input :required="validate" type="text" name="location" placeholder="Location" v-model="booking.location" />
                </div>
                <div class="field">
                    <textarea :required="validate" name="message" id="message" placeholder="Note" rows="7" v-model="booking.message"></textarea>
                </div>
            </div>
            <p v-if="seen" id="alert">You have successfully booked. Visit your mail to confirm your booking</p>
            <ul class="actions">

                <button type="submit" class="button primary">Submit</button>
                <li><a  v-on:click="clearField" class="button">Clear</a></li>

            </ul>
        </form>
    </div>
    <footer>
        <ul class="items">
            <li>
                <h3>Email</h3>
                <a href="#">mcchingarande@yahoo.co.uk</a>
            </li>
            <li>
                <h3>Phone</h3>
                <a href="#">(000) 000-0000</a>
            </li>
            <li>
                <h3>Address</h3>
                <span>233 Cartmell Drive ,Leeds ,West YorkShire</span>
            </li>
            <li>
                <h3>Elsewhere</h3>
                <ul class="icons">
                    <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
                    <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
                    <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
                    <li><a href="#" class="icon brands fa-linkedin-in"><span class="label">LinkedIn</span></a></li>

                </ul>
            </li>
        </ul>
    </footer>
</section>
</template>

<script>
export default {
    data() {
        return {
            seen:false,
            selected: '',
            validate: true,
            services: [],
            booking: {
                lastname: '',
                firstname: '',
                tel: '',
                email: '',
                date: '',
                time: '',
                service_id: '',
                location: '',
                message: '',

            }
        }
    },
    created() {
        this.getListOfServies();
    },
    methods: {
        addBooking: function () {
           
            fetch('api/booking', {
                    method: 'post',
                    body: JSON.stringify(this.booking),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    this.seen=true;
                })
                .catch(err => console.log(err));

        },
        getListOfServies: function () {
            fetch('api/services')
                .then(res => res.json())
                .then(res => {
                    this.services = res.data
                    console.log(res.data);
                })
        },
        
        showSuccess: function () {
           
        },
        showFailure: function () {
           
        },
        clearField: function () {
            this.booking.lastname = "";
            this.booking.firstname = "";
            this.booking.tel = "";
            this.booking.email = "";
            this.booking.date = "";
            this.booking.time = "";
            this.booking.location = "";
            this.booking.message = "";
             this.booking.service_id=""
        }
    }
}
</script>

<style scoped>
#service_id,
#message {
    border: solid 2px rgba(144, 144, 144, 0.25);
}
#alert{
    color: green;
    font-weight: bold;
    text-decoration: underline;
}
textarea:focus {
    border-color: #49fcd4 !important;
}

select:focus {
    border-color: #49fcd4 !important;
}
</style>
