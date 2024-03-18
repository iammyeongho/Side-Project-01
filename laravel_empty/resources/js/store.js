import { createStore } from 'vuex';
import axios from 'axios';
import router from "./router.js"
import VueCookies from "vue-cookies";

const store = createStore({
    // state() : 데이터를 저장하는 영역
    state() {
        return {
            errorData: {
                user_id: '',
                email: '',
                password: '',
                password_chk: '',
                name: '',
                birthdate: '',
                phone_number: '',
            },
            cookieLogin: '',
        }
    },

    // mutations : 데이터 수정용 함수 저장 영역
    mutations: {
        // 초기 데이터 세팅 (라라벨에서 받은)
        setErrorData(state, error) {
            state.errorData = error;
        },
        setCookieLogin(state) {
            state.cookieLogin = VueCookies.get('remember_token');
        },
        setCookieLogout(state) {
            state.cookieLogin = '';
        },
    },
    // actions : ajax로 서버에 데이터를 요청할 때나 시간 함수등 비동기 처리는 actions에 정의
    actions: {
        submitUserData(context, data) {
            const url = '/api/registration'
            const header = {
                headers: {
                    "Content-Type": 'multipart/form-data'
                },
            }
            let frm = new FormData();


            frm.append('user_id',data.user_id);
            frm.append('name',data.name);
            frm.append('gender',data.gender);
            frm.append('birthdate',data.birthdate);
            frm.append('phone_number',data.phone_number);
            frm.append('email',data.email);
            frm.append('password',data.password);
            frm.append('password_chk',data.password_chk);

            axios.post(url, frm, header)
            .then(res => { 
                // console.log(res.data);
                router.push('/'); 
            })
            .catch(err => {
                console.log(err.response.data.errors)
                context.commit('setErrorData', err.response.data.errors)
                console.log(context.state.errorData.user_id);
                // const errorValues = Object.values(err.response.data.errors);
                // alert(`${errorValues.join('\n')}`);
            })
        },
        submitUserLoginData(context, data) {
            const url = '/api/login'
            const header = {
                headers: {
                    "Content-Type": 'application/json',
                },
            }
            const requestData = {
                user_id: data.user_id,
                password: data.password,
            };

            axios.post(url, requestData, header)
            .then(res => { 
                console.log(res);
                if (res.data.success) {
                    const oneDayInSeconds = 24 * 60 * 60;
                    VueCookies.set('remember_token', res.data.cookie, oneDayInSeconds, '/');
                    context.commit('set')
                    VueCookies.set('user_id', res.data.user_id, oneDayInSeconds, '/');
                    context.commit('setCookieLogin');
                    router.push('/'); 
                    // window.location.href = '/';
                } else {
                    // 로그인이 실패했을 때의 처리
                    // console.log('로그인 실패');
                    // console.log(res.data.message);
                    console.log(err.response.data.errors)
                    // console.log('로그인 실패:', res.data.message);
                    // 예: 에러 메시지를 표시
                }
            })
            .catch(err => {
                console.log(err.response.data)
                context.commit('setErrorData', err.response.data.errors)
            })
        },
        logout(context, data) {
            const url = '/api/logout'
            const header = {
                headers: {
                    "Content-Type": 'application/json',
                },
            }
            axios.post(url, header)
            .then(res => {
                // 쿠키 삭제
                VueCookies.remove('remember_token');
                VueCookies.remove('user_id');
                context.commit('setCookieLogout');
                router.push('/login'); 
                // window.location.href = '/';
            })
            .catch(err => console.log(err.response.data))
            

            // commit('SET_USER', null);
        }
    }, 
});

export default store;
