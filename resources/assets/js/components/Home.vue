<template>
    <div class="panel panel-default">
        <div class="panel-heading">文章首页列表</div>
        <div class="panel-body" v-for="item in posts" :key="item.id">
            <h4><router-link :to="{name:'posts',params:{id:item.id}}">{{item.title}}</router-link></h4>
            <p>{{item.body}}</p>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return{
                posts:{}
            }
        },
        mounted(){
            axios.get('/api/posts').then(response => {
                this.posts = response.data.data;
            })
        }
    }
</script>