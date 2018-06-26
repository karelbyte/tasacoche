Vue.config.devtools = true;

new Vue({
    el: '#app',
    data () {
        return {
          item: {
              settemplate: 0
          }
        }
    },
    mounted () {;
       this.getlist()
    },
    methods: {
       getlist () {
           axios.get('/api/template/options').then(res => {
             this.item = res.data
           })
       },
       save () {
          axios.post('/api/template/options/save', {'options': this.item}).then(res => {
             toastr["success"](res.data)
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