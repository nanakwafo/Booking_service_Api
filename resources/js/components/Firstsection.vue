<template>
<section id="first">
    <header>
        <h2>{{header}}</h2>
    </header>
    <div class="content">

        <ul class="feature-icons" v-for="service in services" v-bind:key="service.id">
            <li class="icon solid fa-check-square">{{service.name}}</li>

        </ul>
        <button v-on:click="getResults(page)" type="button"  >Load More</button>
  
    </div>
</section>
</template>

<script>
export default {
    data() {
        return {
            page:1,
            header: "Services",
            services: [],
        }

    },
    created() {
        this.getResults();
        
    },
    methods: {
    //COMMENT:load service in twos  and paginate paginate the service in twos'
        getResults:function(page){
             page =page=== undefined? this.page:this.page+1;
             fetch('api/services?page=' + page)
              .then(response => response.json())
                .then(response => {
                    this.services= this.services.concat(response.data);
                    console.log(response.data);
                })
                this.page=page;
              
        },
        //COMMENT:function to get all  services

        // getServices: function () {
        //     fetch('api/services')
        //         .then(res => res.json())
        //         .then(res => {
        //             this.services = res;
        //             //console.log(res.data);
        //         })
        // }
    }

}
</script>
