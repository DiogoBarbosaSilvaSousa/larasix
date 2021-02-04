<template>
    <div class="container">

        <div class="row mb-2 justify-content-center">
            <div class="col-12 col-md-3 mb-2">
                <div class="form-group">
                  <label for="inputTitle">Título</label>
                  <input type="text" class="form-control" id="inputTitle" v-model="title" placeholder="Pesquisa por título" />
                </div>
            </div>

            <div class="col-12 col-md-3 mb-2">
                <div class="form-group">
                  <label for="inputContent">Conteúdo</label>
                  <input type="text" class="form-control" id="inputContent" v-model="content" placeholder="Pesquisa por conteúdo" />
                </div>
            </div>

            <div class="col-12 col-md-3 mb-2">
                <div class="form-group">
                  <label for="inputCategory">Categoria</label>
                  <input type="text" class="form-control" id="inputCategory" v-model="category" placeholder="Pesquisa por categoria" />
                </div>
            </div>

            <div class="col-12 col-md-3 mb-2">
                <div class="form-group">
                  <label for="inputAuthor">Autor</label>
                  <input type="text" class="form-control" id="inputAuthor" v-model="author" placeholder="Pesquisa por autor" />
                </div>
            </div>
        </div>

        <div class="row justify-content-center">

            <div class="col-12 col-sm-3" v-for="post in laravelData.data" :key="post.id">
                <div class="card">
                    <div class="card-header">
                        Categoria: {{ post.category }}
                    </div>
                    <img :src="post.thumbnail" class="card-img-top img-thumbnail" style="max-height: 185px;" alt="">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">{{ post.title }}</h5>
                        <p class="card-text"><div style="overflow: hidden; width:100%; white-space:nowrap;">{{ post.content }}</div></p>
                        <a :href="'/posts/'+ post.id" class="btn btn-primary">LEIA MAIS</a>
                    </div>
                    <div class="card-footer text-left">
                        <div class="author font-weight-bold">
                           Autor: {{ post.author }}
                        </div>
                        <div class="created_at">
                            <small class="text-muted">Criado em {{ post.created_at }}</small>
                        </div>
                        <div class="updated_at">
                            <small class="text-muted">Atualizado em {{ post.updated_at }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row m-5">
            <div class="col-12 col-sm-12 text-center">
                <pagination :data="laravelData" @pagination-change-page="getResults"></pagination>
            </div>
        </div>
    </div>
</template>

<style scoped>

 .pagination {
    justify-content: center !important;
  }

</style>

<script>
    export default {

        data() {
            return {
                // Our data object that holds the Laravel paginator data
                laravelData: {},
                title: "",
                content: "",
                category: "",
                author: "",
            }
        },

        mounted() {
            // Fetch initial results
            this.getResults();
        },
        watch: {
            title(after, before) {

                this.getResults();

            },
            content(after, before) {

                this.getResults();

            },
            category(after, before) {

                this.getResults();

            },
            author(after, before) {

                this.getResults();

            },
        },

        methods: {
            // Our method to GET results from a Laravel endpoint
            getResults(page = 1) {
                axios.get('api/posts?page=' + page,{ params: { title: this.title, content: this.content, category: this.category , author: this.author } })
                    .then(response => {
                        this.laravelData = response.data;
                    });
            }
        }

    }
</script>
