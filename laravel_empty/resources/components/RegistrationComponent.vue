<template>
    <div>
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
                        <div class="regist_title_area">
                            <h2>SIGN UP</h2>
                            <div>
                                <span class="regist_title_span" style="opacity: 0.5;">1. THE TERMS AND CONDITIONS </span>
                                <span class="regist_title_span_bar"> > </span>
                                <span class="regist_title_span">2. ENTER INFORMATION</span>
                                <span class="regist_title_span_bar"> > </span>
                                <span class="regist_title_span" style="opacity: 0.5;">3. COMPLETION.</span>
                            </div>
                        </div>
                        <div class="member_area">
                            <div class="ec_base_table">
                                <table border="1">
                                    <colgroup>
                                        <col style="width: 40%">
                                        <col style="width: 60%">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <th>ID <span style="color: red;">*</span></th>
                                            <td><input type="text" class="inputTypeText" placeholder="(영문소문자/숫자, 4~16자)" name="user_id" v-model="frmUserData.user_id" minlength="4" maxlength="16">{{ $store.state.errorData.user_id }}</td>
                                        </tr>
                                        <tr>
                                            <th>E-MAIL <span style="color: red;">*</span></th>
                                            <td><input type="email" class="inputTypeText" name="email" v-model="frmUserData.email">{{ $store.state.errorData.email }}</td>
                                        </tr>
                                        <tr>
                                            <th>PASSWORD <span style="color: red;">*</span></th>
                                            <td><input type="password" class="inputTypeText" placeholder="(영문 대소문자/숫자/특수문자, 8자~16자)" name="password" v-model="frmUserData.password" minlength="8" maxlength="16">{{ $store.state.errorData.password }}</td>
                                        </tr>
                                        <tr>
                                            <th>CHECK THE PASSWORD <span style="color: red;">*</span></th>
                                            <td><input type="password" class="inputTypeText" name="password_chk" v-model="frmUserData.password_chk">{{ $store.state.errorData.password_chk }}</td>
                                        </tr>
                                        <tr>
                                            <th>NAME <span style="color: red;">*</span></th>
                                            <td><input type="text" class="inputTypeText" name="name" v-model="frmUserData.name">{{ $store.state.errorData.name }}</td>
                                        </tr>
                                        <tr>
                                            <th>BIRTHDATE <span style="color: red;">*</span></th>
                                            <td><input type="text" class="inputTypeText" name="birthdate" v-model="frmUserData.birthdate" minlength="8" maxlength="10">{{ $store.state.errorData.birthdate }}</td>
                                        </tr>
                                        <tr>
                                            <th>PHONE NUMBER <span style="color: red;">*</span></th>
                                            <td><input type="tel" class="inputTypeText" name="phone_number" v-model="frmUserData.phone_number">{{ $store.state.errorData.phone_number }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="regist_bottom">
                                <button type="button" @click="submitUserData()">REGISTER</button>
                            </div>
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
    </div>
</template>
<script>
export default {
    name: 'RegistrationComponent',
    data() {
        return {
            frmUserData: {
                user_id: '',
                email: '',
                password: '',
                password_chk: '',
                name: '',
                birthdate: '',
                phone_number: '',
            },
        }
    },
    methods: {
        submitUserData() {
            this.$store.dispatch('submitUserData', this.frmUserData);
        },
    },
}
</script>
<style>
    
</style>