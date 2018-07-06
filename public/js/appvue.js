Vue.config.devtools = true;

Vue.component('v-select', VueSelect.VueSelect);

new Vue({
    el: '#app',
    data () {
        return {
           email: '',
           marcas: [],
           marca: 0,
           modelos: [],
           modelo: null,
           combustibles: [],
           combustible: null,
           matriculas: [],
           matricula: null,
           versiones: [],
           version: null,
           kms: [],
           km: null,
           step: 1,
           tasa: '',
           cp: '',
           nombre: '',
           fecha: '',
           hora: '',
           movil: '',
           url: 'marcas/'
        }
    },
    watch: {
      'marca': 'getmodels',
      'modelo': 'getfuell',
      'combustible': 'getplaques',
      'matricula': 'getversion',
      'version': 'getkms'
    },
    mounted () {
      this.getdata()
    },
    methods: {
        geturl (ur) {
            return 'marcas/' + ur
        },
        getdata () {
          axios.get('/api/front/datamake').then(res => {
              this.marcas = res.data
          })
        },
        getmodels () {
            this.modelos = [];
            this.modelo = null;
            axios.get('/api/front/datamodels/' + this.marca.id).then(res => {
                this.modelos = res.data
            })
        },
        getfuell () {
            this.combustibles = [];
            this.combustible = null;
            axios.get('/api/front/datafuells/' + this.modelo.nombre).then(res => {
                this.combustibles = res.data
            })
        },
        getplaques () {
            this.matriculas = [];
            this.matricula = null;
            axios.get('/api/front/dataplaques/' + this.modelo.nombre + '/' + this.combustible.codigo).then(res => {
              this.matriculas = res.data
            })
        },
        getversion () {
            this.versiones = [];
            this.version = null;
            let data = {
                'marca': this.marca.marca,
                'modelo': this.modelo.nombre,
                'combustible': this.combustible.codigo,
                'matricula': this.matricula.anyo
            };
            axios({
                method: 'get',
                url: '/api/front/dataversion',
                params: {data: data}
            }).then(res => {
                this.versiones = res.data
            }).catch(e => {
            })
        },
        getkms () {
            this.kms = [];
            this.km = null;
            axios.get('/api/front/datakms').then(res => {
                this.kms = res.data
            })
        },
        checkstep1 () {
            let chekmail = /^(([^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*)|(".+"))@(([^<>()[\].,;:\s@"]+\.)+[^<>()[\].,;:\s@"]{2,})$/i.test(this.email);
            if (!chekmail) {
                toastr["info"]('No es una dirección de correo válida!')
            } else {
               if (this.marcas !== null && this.modelo !== null && this.combustible !== null && this.matricula !== null && this.version !== null && this.km !== null ) {
                   let data = {
                       'marca': this.marca,
                       'modelo': this.modelo,
                       'version': this.version.id,
                       'km': this.km.id,
                   };
                   axios({
                       method: 'get',
                       url: '/api/front/tasa',
                       params: {data: data}
                   }).then(res => {
                       this.tasa = res.data + ' €';
                       this.step = 2
                   }).catch(e => {
                       toastr["info"](e.response.data)
                   });
               } else {
                   toastr["info"]('Complete todo los datos para continuar!')
               }

            }
        },
        checkstep2 () {
           if (this.cp !== '' && this.nombre !== '' && this.fecha !== '' && this.hora !== '' && this.movil !== '') {
                    let data = {
                        'nombres': this.nombre,
                        'email': this.email,
                        'telefono': this.movil,
                        'fecha': this.fecha,
                         'hora': this.hora,
                           'cp': this.cp,
                        'version': this.version.version,
                        'km': this.km.nombre,
                        'matricula': this.matricula.anyo,
                        'tasacion': this.tasa,
                        'status_id': 1
                    };
                    axios({
                        method: 'post',
                        url: '/api/front/cita',
                        data: data
                    }).then(res => {
                        this.step = 3
                    }).catch(e => {
                    });
                } else {
                    toastr["info"]('Complete todo los datos para continuar!')
           }
      },
      retax () {
         this.step = 1
      }

    }
});