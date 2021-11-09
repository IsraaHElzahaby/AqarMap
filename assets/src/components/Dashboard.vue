<template>
    <div class="container " id="app">

        <div class="raw justify-content-center ">  
            <div class='col-lg-10' v-for="article in articles" v-bind:key="article.id" >
             
                <div class="card mt-3"  >
                  <div class="card-header">
                    {{ article.title }}

                  </div>
                  <div class="card-body" >
                    <h6 class="card-title">{{ article.creation_date.date }}</h6>
                    <p class="card-text">{{ article.description }}</p>
                    <router-link to="/article/comment" class="btn btn-primary">View comments</router-link>
    
                  </div>
                </div>
              
            </div>
            

        </div>
        
    </div>
</template>


<script>
import axios from 'axios'

export default {
    name: 'Dashboard',

    data() {
        return {
            articles: {}
        }
    },
    async created () {
        const response = await axios.get(this.$apiUrl + "/article/list")
        this.articles = response.data
    }
}
</script>