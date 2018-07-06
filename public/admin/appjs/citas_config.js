Vue.config.devtools = true;

new Vue({
    el: '#app',
    data () {
        return {
            act: 'post',
            unlookview: false,
            diaschek:[],
            dias: [ {id: 1, 'name': 'Lunes'}, {id: 2, 'name': 'Martes'}, {id: 3, 'name': 'Miercoles'}, {id: 4, 'name': 'Jueves'}, {id: 5, 'name': 'Viernes'}, {id: 6, 'name': 'Sabado'}, {id: 0, 'name': 'Domingo'}],
            hbegin: '',
            hend: '',
            interval: 30,
            inter: 0,
            citasxdia: 0,
            hb :0
        }
    },
    watch: {
      'interval': 'cal',
    },
    mounted () {

    },
    methods: {
        save () {
           axios({
                method: this.act,
                url: '/api/users' + (this.act === 'post' ? '' : '/' + this.item.id),
                data: this.item
            }).then(response => {
                toastr["success"](response.data);
                this.getlist();
                this.unlookview = false
            }).catch(e => {
                toastr["error"](e.response.data)
            })

        },
        gethora (it) {
          let factor = this.interval;
          let h = 0;
          let init = ((this.hb) / 100) * 60;
          h = (it * factor);
          return  init //  (init + h) / 60
        },
        cal () {
           this.hb =  parseInt(this.hbegin.replace(':', ''));
           let he =  parseInt(this.hend.replace(':', ''));
           let horas = (he - this.hb) / 100;
           let minutos = horas * 60;
           this.citasxdia = _.range(0, (minutos / this.interval));
        }
    }
});