const app = new Vue({
    el: '#app',
    component: {
    },
    data() {
        return {
            user_id: window.sessionStorage.getItem(['user_id']),
            name: '',
            password: '',
            loginchk: {},
            user: {},
            list: {},
            annivarsary_day: '',
            annivarsary_title: '',
            annivarsary_detail: ''
        }
    },
    //ページが読み込まれた時に動く処理
    created() {
        this.get_user();
        this.get_list();
    },
    updated() {
    },
    methods: {
        get_user() {
            axios
                .post('https://mp-class.chips.jp/calendar/main.php', {
                    user_id: window.sessionStorage.getItem(['user_id']),
                    get_user: ''
                }, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(
                    (response) => (this.user = response.data),
                    (response) => (console.log(response.data))
                )
        },
        loginpush() {
            this.login();
        },
        login() {
            axios
                .post('https://mp-class.chips.jp/calendar/main.php', {
                    user_name: this.name,
                    user_pass: this.password,
                    login_user: ''
                }, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(
                    (response) => (this.loginchk = response.data),
                    (response) => (console.log(response.data))
                )
        },
        get_list() {
            axios
                .post('https://mp-class.chips.jp/calendar/main.php', {
                    user_id: window.sessionStorage.getItem(['user_id']),
                    get_list: ''
                }, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(
                    (response) => (this.list = response.data),
                    (response) => (console.log(response.data))
                )
        },
        create_annivarsary() {
            axios
                .post('https://mp-class.chips.jp/calendar/main.php', {
                    annivarsary_day: this.annivarsary_day,
                    user_id: this.user_id,
                    annivarsary_title:this.annivarsary_title,
                    annivarsary_detail:this.annivarsary_detail,
                    insert_annivarsary: ''
                }, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(
                    // (response) => (this.loginchk = response.data),
                    (response) => (console.log(response.data))
                )
        },
        reload() {
            location.href = "./test_annivarsary.html";
        },
        create() {
            this.create_annivarsary();
        }
    },
    watch: {
        loginchk() {
            if (this.loginchk[0].chk == true) {
                window.sessionStorage.setItem(['user_id'], this.loginchk[0].id);
                location.href = "./test_annivarsary.html";
            }
        }
    },
    computed: {
    }
});