<template>
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-12 col-sm-12">

                <div class="card" v-if="!loading">
                    <div class="card-header">
                        Categoria: {{ laravelData[0].category }}
                    </div>
                    <img :src="'/'+laravelData[0].thumbnail" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">{{ laravelData[0].title }}</h5>
                        <p class="card-text">{{ laravelData[0].content }}</p>
                    </div>
                    <div class="card-footer text-left">
                        <div class="author font-weight-bold">
                           Autor: {{ laravelData[0].author }}
                        </div>
                        <div class="created_at">
                            <small class="text-muted">Criado em {{ laravelData[0].created_at }}</small>
                        </div>
                        <div class="updated_at">
                            <small class="text-muted">Atualizado em {{ laravelData[0].updated_at }}</small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<style scoped>

</style>

<script>
    export default {

        data() {
            return {
                laravelData: {category:''},
                loading: true
            }
        },
        props: {
            postid: String
        },
        mounted() {
            // Fetch initial results
            this.getResults(this.$props.postid);
        },
        methods: {
            getResults(id = 1) {
                this.loading = true;

                axios.get('/api/posts/'+ id)
                    .then(response => {
                        this.laravelData = response.data;
                        this.loading = false;
                    });
            }
        }

    }
</script>
