Vue.config.devtools = true;
Vue.use(VueQuillEditor);
new Vue({
    el: '#app',
    data () {
        return {
          formData: 0,
          item: {
             wtitle: '',
             // Paso 1
             wstept1: '',
             wstep1: '',
             wimg1: '',
             // Paso 2
             wstept2: '',
             wstep2: '',
             wimg2: '',
             // Paso 3
             wstept3: '',
             wstep3: '',
             wimg3: '',
             // Paso 4
             wstept4: '',
             wstep4: '',
             wimg4: '',
          },
            editorOption: {
                theme: 'snow'
            }
        }
    },
    components: {
       LocalQuillEditor: VueQuillEditor.quillEditor
    },
    mounted () {
       this.formData = new FormData();
       this.getlist()
    },
    methods: {
       getlist () {
           axios.get('/api/work/options').then(res => {
             this.item = res.data
           })
       },
       save () {
          axios.post('/api/work/options/save', {'options': this.item}).then(res => {
             toastr["success"](res.data);
              if (this.file !== null) {
                  axios.post('/api/work/options/save/img', this.formData).then(res => {
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