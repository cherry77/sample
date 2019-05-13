<template>
    <form class="form-horizontal" method="POST" action="" @submit.prevent="register">
        <div class="form-group" :class="{'has-error': errors.has('name')}">
            <label for="name" class="col-md-4 control-label">Name</label>
            <div class="col-md-6">
                <input v-model="name"
                       v-validate="{rules:{required:true,min:4}}"
                       data-vv-as="用户名"
                       id="name" type="text" class="form-control" name="name" value="" required autofocus>
                <span class="help-block" v-show="errors.has('name')">{{errors.first('name')}}</span>
            </div>
        </div>

        <div class="form-group" :class="{'has-error': errors.has('email')}">
            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
            <div class="col-md-6">
                <input v-model="email"
                       v-validate="{rules:{required:true,email:true}}"
                       data-vv-as="邮箱"
                       id="email" type="email" class="form-control" name="email" value="" required>
                <span class="help-block" v-show="errors.has('email')">{{errors.first('email')}}</span>
            </div>
        </div>

        <div class="form-group" :class="{'has-error': errors.has('password')}">
            <label for="password" class="col-md-4 control-label">Password</label>
            <div class="col-md-6">
                <input v-model="password"
                       v-validate="{rules:{required:true,min:6}}"
                       data-vv-as="密码"
                       id="password" type="password" class="form-control" name="password" required>
                <span class="help-block" v-show="errors.has('password')">{{errors.first('password')}}</span>
            </div>
        </div>

        <div class="form-group" :class="{'has-error': errors.has('password_confirmation')}">
            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
            <div class="col-md-6">
                <input v-validate data-vv-rules="required|min:6|confirmed:password"
                       data-vv-as="确认密码"
                       id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                <span class="help-block" v-show="errors.has('password_confirmation')">{{errors.first('password_confirmation')}}</span>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Register
                </button>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        name: "RegisterForm",
        data(){
          return {
              name :'',
              email: '',
              password: ''
          }
        },
        methods: {
            register(){
                let formDate = {
                    name: this.name,
                    email: this.email,
                    password: this.password
                }
                axios.post('api/register',formDate).then(response => {
                    console.log(response);
                    if(response.data.status === 1){
                        this.$router.push({name:'confirm'})
                    }
                })
            }
        }
    }
</script>

<style scoped>

</style>