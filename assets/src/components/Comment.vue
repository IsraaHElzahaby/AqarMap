<template>
    <form @submit.prevent="onSubmit">
        <span class="help is-danger" v-text="errors"></span>

        <div class="field">
            <div class="control">
                <input class="input" type="title" placeholder="enter movie title..." v-model="title" @keydown="errors = ''">
            </div>
        </div>

        <button class="btn is-primary" v-bind:class="{ 'is-loading' : isLoading }">Comment</button>
    </form>
</template>

<script>
import axios from 'axios'

export default {
    name: 'Comment',
    data() {
        return {
            title: '',
            description: '',
            errors: '',
            isLoading: false
        }
    },
    methods: {
        onSubmit() {
            this.isLoading = true
            this.addArticle()
        },
        async addArticle() {
           
            axios.post('http://localhost:8000/article/add', this.$data)
                .then(response => {
                    this.title = ''
                    this.description = ''
                    this.isLoading = false
                    this.$emit('completed', response.data)
                })
                .catch(error => {
                    // handle authentication and validation errors here
                    this.errors = error.response.data.errors
                    this.isLoading = false
                })
        }
    }
}
</script>