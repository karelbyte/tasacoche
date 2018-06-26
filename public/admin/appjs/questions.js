Vue.config.devtools = true;

Vue.use(VueQuillEditor);

new Vue({
    el: '#app',
    data () {
        return {
          item: {
             qtitle: '',
          },
          groups: [],
          group: {
              id: '',
              title: '',
              quests:[]
          },
          quest: {
              question: '',
              descrip: ''
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
       this.getlist()
    },
    methods: {
       getlist () {
           axios.get('/api/questions/options').then(res => {
             this.item = res.data.options;
             this.groups = res.data.questions
           })
       },
       save () {
          let data = {
              options: this.item,
              groups: this.groups
          };
          axios.post('/api/questions/options/save', data).then(res => {
             toastr["success"](res.data);
          });
       },
       add() {
           let g = JSON.parse(JSON.stringify(this.group));
           /* let id = this.groups.reduce((maximo, item) => { return maximo > item.id ? maximo : item.id }, 0);
           if (id === 0) { g.id =  1 } else { g.id = id + 1 }*/
           this.groups.push(g)
       },
       del(g) {
          this.groups = this.groups.filter(it => { return it.title !== g.title })
       },
       newquest (gr) {
          let qe = JSON.parse(JSON.stringify(this.quest));
          gr.quests.push(qe)
       },
       delquest(gr, qt) {
          gr.quests = gr.quests.filter(it => { return it.question !== qt.question })
       },
    }
});