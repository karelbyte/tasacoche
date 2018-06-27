Vue.config.devtools = true;

Vue.use(VueFormWizard);

Vue.component('v-select', VueSelect.VueSelect);

new Vue({
    el: '#app',
    data () {
        return {
           email: '',
           marcas: [],
           marca: null,
           modelos: [],
           modelo: null,
           combustibles: [],
           combustible: null,
           matriculas: [],
           matricula: null,
           versiones: [],
           version: null,
           kms: [],
           km: null
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
            axios.get('/api/front/datafuells').then(res => {
                this.combustibles = res.data
            })
        },
        getfuell () {
            this.combustibles = [];
            this.combustible = null;
            axios.get('/api/front/datafuells').then(res => {
                this.combustibles = res.data
            })
        },
        getfuell () {
            this.combustibles = [];
            this.combustible = null;
            axios.get('/api/front/datafuells').then(res => {
                this.combustibles = res.data
            })
        },
        getplaques () {
            this.matriculas = [];
            this.matricula = null;
            axios.get('/api/front/dataplaques').then(res => {
                this.matriculas = res.data
            })
        },
        getversion () {
            this.versiones = [];
            this.version = null;
            let data = {
                'marca': this.marca.nombre,
                'modelo': this.modelo.nombre,
                'combustible': this.combustible.codigo,
                'matricula': this.matricula.valor
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
            this.kms = null;
            axios.get('/api/front/datakms').then(res => {
                this.kms = res.data
            })
        },
        onComplete: function(){
            alert('Yay. Done!');
        }
    }
});