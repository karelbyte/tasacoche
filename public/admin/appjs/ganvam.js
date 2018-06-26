Vue.config.devtools = true;

new Vue({
    el: '#app',
    data () {
        return {
            item: {
                token: '',
                url: ''
            },
            make: false,
            models: false,
            tax: false
        }
    },
    mounted () {
        this.getlist()
    },
    methods: {
        getlist () {
            axios({
                method: 'get',
                url: '/api/ganvam/data',
            }).then(response => {
                this.item = response.data;
            }).catch(e => {
                toastr["error"](e.response.data)
            })
        },
        save () {
            axios({
                method: 'post',
                url: '/api/ganvam/save',
                data: this.item
            }).then(response => {
                toastr["success"](response.data);
            }).catch(e => {
                toastr["error"](e.response.data)
            })

        },
        testgan () {
            axios({
                method: 'get',
                url: '/api/ganvam/test',
            }).then(response => {
                toastr["success"]('<i class="fa fa-wifi"> </i> Conectado a Ganvam!!');
            }).catch(e => {
                toastr["error"]('No se pudo conectar al servidor')
            })
        },
        getdata (patch, shows) {
            this[shows] = true;
            axios({
                method: 'get',
                url: '/api/ganvam/' + patch,
            }).then(response => {
                toastr["success"](response.data);
                this[shows] = false;
            }).catch(e => {
                toastr["error"]('No se pudo conectar al servidor');
                this[shows] = false;
            })
        }
    }
});