<template>
    <div class="panel panel-default">
        <div class="panel-heading"><h4>{{post.title}}</h4></div>
        <div class="panel-body">
            <p>{{post.body}}</p>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                post:[]
            }
        },
        mounted(){
            axios.get('/api/posts/'+this.$route.params.id).then(response => {
                this.post = response.data;
            })
        }
    }
</script>