<template>
    <div id="app">
        <link href="https://cdn.jsdelivr.net/npm/vuetify@1.2.2/dist/vuetify.min.css" rel="stylesheet" />
        <v-container bg fill-height grid-list-md text-xs-center>
            <v-layout row wrap align-center>
                <v-flex>
                    <h1>This is Dashboard.vue Page</h1>
                </v-flex>
            </v-layout>
        </v-container>
    </div>
</template>

<script>

export default {
    components : {
    },
    methods : {
        login() {
            console.log('login')
        },
        register(){
            console.log('register')
        }
    }
}

</script>

<style scoped>
.btn {
    width: 2rem;
}
</style>
