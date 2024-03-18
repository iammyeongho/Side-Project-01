<template id="body">
    <div id="wrap">
        <div id="topBanner">
            <div class="desc">
                <ul id="list_txt">
                    <li><a href="">[래플] 아식스 x 키코 코스타디노브 x 히스테릭 글래머 젤 퀀텀 코튼 캔디</a></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </div>
        <header id="header">
            <div class="navigation">
                <ul class="nav_left sideNav">
                    <li><a href="">ALL BRANDS</a></li>
                    <li><a href="">CATEGORY +</a></li>
                    <li><a href="">ARCHIVE</a></li>
                    <li><a href="">BLACK E( )PTY</a></li>
                    <li><a href="">RAFFLE</a></li>
                </ul>
                <h1>
                    <router-link to="/main">
                        <img src="/img/v2_14378e7f2adb0ec0ad8cddaaf3b0fbdd_0DXltiM6xt_top.jpg" alt="">
                    </router-link>
                </h1>
                <div v-if="$store.state.cookieLogin" class="sideNav">
                    <a @click="logout">LOGOUT</a>
                    <a href="">CART</a>
                    <a href="">MY PAGE</a>
                    <a href="">SEARCH</a>
                    <a href="" class="menuBtn">MENU</a>
                </div>
                <div v-else class="sideNav">
                    <router-link to="/registration">SIGN UP</router-link>
                    <router-link to="/login">LOGIN</router-link>
                    <a href="">CART</a>
                    <a href="">SEARCH</a>
                    <a href="" class="menuBtn">MENU</a>
                </div>
            </div>
        </header>


    </div>
    <router-view :key="$route.path"></router-view>
</template>

<script>

export default {
    name: 'AppComponent',

    beforeUpdate() {
    },

    created() {
        this.$store.commit('setCookieLogin');
    },

    updated() {
        this.$store.state.errorData = 0;
    },

    data() {
        return {
        };
    },

    methods: {
        logout() {
            this.$store.dispatch('logout');
        },
    },

    components: {
    },
}
</script>
<style>
    @import url('/css/common.css');
</style>