<template>
<div class="login_help_box">
            <div class="login_sm_l">
                <ul>
                    <li><span>HELP</span></li>
                    <li><a href="">자주하시는 질문</a></li>
                    <li><a href="">1:1 상담</a></li>
                </ul>
                <ul>
                    <li><span>MY PAGE</span></li>
                    <li><a href="">마이페이지</a></li>
                    <li><a href="">주문목록</a></li>
                    <li><a href="">관심상품</a></li>
                    <li><a href="">회원혜택</a></li>
                    <li><a href="">쿠폰</a></li>
                    <li><a href="">응모내역확인</a></li>
                </ul>
            </div>
            <div class="login_center">
                <main>
                    <div class="login_han_box">
                        <div class="login_title_area">
                            <h2>LOGIN</h2>
                            <div>
                                <span><strong>EMPTY</strong> 회원이 되시면 다양한 혜택과 서비스를 받으실 수 있습니다.</span>
                                <span>
                                    <router-link to="/registration">JOIN US</router-link>
                                    <a href="">FIND ID</a>
                                    <a href="">FIND PASSWORD</a>
                                </span>
                            </div>
                        </div>
                        <div class="login">
                            <fieldset class="form">
                                <legend>회원로그인</legend>
                                <div class="labels">
                                    <div>
                                        <label>ID</label>
                                        <input class="inputTypeText" type="text" placeholder="ID" name="user_id" v-model="frmUserLoginData.user_id">
                                        <p style="color: red; font-size: 10px;">{{ $store.state.errorData.user_id }}</p>
                                    </div>
                                    <div>
                                        <label>PASSWORD</label>
                                        <input class="inputTypeText" type="password" placeholder="PASSWORD" name="password" v-model="frmUserLoginData.password">
                                        <p style="color: red; font-size: 10px;">{{ $store.state.errorData.password }} </p>
                                    </div>
                                </div>
                                <div class="login_button">
                                    <button type="button" @click="submitUserLoginData()">LOGIN</button>
                                </div>
                                <div class="login_sns">
                                    <a href="">kakao login</a>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </main>
            </div>
            <div class="login_sm_r">
                <ul>
                    <li>
                        <span>customer service</span>
                    </li>
                    <li>문의에 대한 빠른 답변을 원하시면 전화로 연락주세요.</li>
                    <li><strong>TEL. 1833-9118</strong></li>
                    <li><strong>customerservice@empty.seoul.kr</strong></li>
                </ul>
                <ul>
                    <li>
                        <span>customer support</span>
                    </li>
                    <li>상담업무시간</li>
                    <li>평일 <strong>10:00 ~ 17:00</strong> (점심시간 <strong>12시~1시</strong> 제외)</li>
                </ul>
                <ul>
                    <li>
                        <span>contact us</span>
                    </li>
                    <li>입점 / 협업 및 비즈니스 관련 문의</li>
                    <li><strong>contact@empty.seoul.kr</strong></li>
                </ul>
            </div>
        </div>
</template>
<script>
export default {
    name: 'LoginComponent',
    data() {
        return {
            frmUserLoginData: {
                user_id: '',
                password: '',
            },
        }
    },
    
    methods: {
        submitUserLoginData() {
            this.$store.dispatch('submitUserLoginData', this.frmUserLoginData);
        },
    }
    

}
</script>
<style>
    
</style>