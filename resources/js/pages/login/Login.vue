<template>
    <div>
        <mu-appbar title="登录" center color="primary" style="text-align: center">
            <mu-button icon slot="left" @click="back">
                <mu-icon value="arrow_back"></mu-icon>
            </mu-button>
        </mu-appbar>
        <mu-form ref="form" :model="validateForm" class="mu-demo-form" label-position="right" label-width="100">
            <mu-form-item label="用户名" prop="userName" :rules="usernameRules">
                <mu-text-field v-model="validateForm.userName" prop="userName"></mu-text-field>
            </mu-form-item>
            <mu-form-item label="密码" prop="password" :rules="passwordRules">
                <mu-text-field type="password" v-model="validateForm.password" prop="password"></mu-text-field>
            </mu-form-item>
            <mu-form-item>
                <mu-button color="primary" @click="submit">登录</mu-button>
                <mu-button color="primary" to="/register">注册</mu-button>
            </mu-form-item>
            <mu-form-item>
                <mu-flex justify-content="center" align-items="center">
                    <mu-button full-width flat>忘记密码</mu-button>
                </mu-flex>
            </mu-form-item>
        </mu-form>
    </div>

</template>

<script>
    export default {
        name: "Login",
        data() {
            return {
                usernameRules: [
                    {validate: (val) => !!val, message: '必须填写用户名'},
                    {validate: (val) => val.length >= 3, message: '用户名长度大于3'}
                ],
                passwordRules: [
                    {validate: (val) => !!val, message: '必须填写密码'},
                    {validate: (val) => val.length >= 3 && val.length <= 10, message: '密码长度大于3小于10'}
                ],
                validateForm: {
                    userName: '',
                    password: '',
                },
            }
        },
        methods: {
            submit() {
                this.$refs.form.validate().then((result) => {
                    if (result) {
                        this.$api.login(this.validateForm).then((res) => {
                            if (res.code === 0) {
                                this.$store.commit('login', res);
                                this.$toast.success('登录成功');
                                this.$router.back();
                            } else {
                                this.$toast.error(res.msg);
                            }
                        });
                    }
                });
            },
            back() {
                this.$router.back();
            }
        }
    }
</script>

<style scoped>
    .mu-demo-form {
        width: 100%;
        max-width: 460px;
        padding-top: 200px;
    }
</style>
