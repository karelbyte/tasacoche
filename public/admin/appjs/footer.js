Vue.config.devtools = true;

new Vue({
    el: '#app',
    data () {
        return {
          formData: 0,
          item: {
             copyright: '',
             fcar2: '',
             fcar1: '',
          }
        }
    },
    mounted () {
       this.formData = new FormData();
       this.getlist()
    },
    methods: {
       getlist () {
           axios.get('/api/footer/options').then(res => {
             this.item = res.data
           })
       },
       save () {
          axios.post('/api/footer/options/save', {'options': this.item}).then(res => {
             toastr["success"](res.data);
              if (this.file !== null) {
                  axios.post('/api/footer/options/save/img', this.formData).then(res => {
                      this.getlist()
                  })
                      .catch(err => {
                          toastr["error"](err.response.data);
                })
              }
          });

       },
       find (tx) {
         $('#' + tx).click()
       },
       getfile (e, targ) {
          let files = e.target.files || e.dataTransfer.files;
          if (!files.length) {
             toastr["error"]('No se selecciono una imagen');
          } else {
            let file = null;
            file = files[0];
            this.item[targ] = URL.createObjectURL(file);
            this.formData.append(targ, file)
          }
       }
    }
});