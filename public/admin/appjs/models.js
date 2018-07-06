Vue.config.devtools = true;

Vue.component('paginator', {
    // declara las propiedades
    props: ['tpage', 'pager'],
    template:
    `<div>
      <ul v-if="tpage > 1" class="pagination pagination-sm pagination-split" style="cursor: pointer">
        <li :class="{hide: currentpage === 1}"><a @click = "setpage(1)"> <span class="glyphicon glyphicon-step-backward mousehand " aria-hidden="true"></span></a></li>
        <li :class="{hide: currentpage === 1}"><a @click = "setpage(currentpage - 1)"><span class="glyphicon glyphicon-chevron-left mousehand " aria-hidden="true"></span></a></li>
        <li v-for="pagex in rango(tpage, currentpage)" :key="pagex" :class="{active: currentpage == pagex}" class="mousehand"><a @click = "setpage(pagex)"> {{pagex}}</a></li>
        <li :class="{hide: currentpage === tpage}"><a @click = "setpage(currentpage + 1)"><span class="glyphicon glyphicon-chevron-right mousehand" aria-hidden="true"></span></a></li>
        <li :class="{hide: currentpage === tpage}"><a @click = "setpage(tpage)"><span class="glyphicon glyphicon-step-forward mousehand" aria-hidden="true"></span></a></li>
      </ul>
    </div>`,
    methods: {
        setpage (page) {
            this.currentpage = page;
            this.pager.page = page;
            this.$emit('getresult', undefined, undefined, this.pager)
        }
    },
    watch: {
        tpage: function () {
            this.currentpage = 1
        }
    },
    data () {
        return {
            pagex: '',
            currentpage: 1,
            recordpage: this.pager.recordpage,
            rango: rangoutil
        }
    }
});

new Vue({
    el: '#app',
    data () {
        return {
            formData: 0,
            gan: false,
            title: '',
            act: 'post',
            lists: [],
            entity: {},
            unlookview: false,
            item: {
              id: 0,
              nombre: '',
              factor: '',
              imagen: '',

            },
            filters: {
                nombre: ''
            },
            orders: {
                field: 'nombre',
                type: 'asc'
            },
            pager: {
                page: 1,
                recordpage: 9
            },
            totalpage: 0,
        }
    },
    mounted () {
       this.formData = new FormData();
       this.getlist()
    },
    methods: {
        getlist (pFil, pOrder, pPager) {
            if (pFil !== undefined) { this.filters = pFil }
            if (pOrder !== undefined) { this.orders = pOrder }
            if (pPager !== undefined) { this.pager = pPager }
            axios({
                method: 'get',
                url: '/api/models/list',
                params: {start: this.pager.page - 1, take: this.pager.recordpage, filters: this.filters, orders: this.orders}
            }).then(response => {
                this.lists = response.data.list;
                this.totalpage = Math.ceil(response.data.total / this.pager.recordpage)
            }).catch(e => {
                toastr["error"](e.response.data)
            })
        },
        add () {
            this.title = 'Añadir Modelo';
            this.item.nombre = '';
            this.item.factor = '';
            this.act = 'post';
            this.unlookview = true
        },
        edit (it) {
           this.item = it;
           this.act = 'put';
           this.title = 'Actualizar modelo: <strong>' + this.item.nombre + '</strong>' + ' de la marca ' + this.item.marca;
           this.unlookview = true
        },
        save () {
           axios({
                method: this.act,
                url: '/api/models' + (this.act === 'post' ? '' : '/' + this.item.id),
                data: this.item
            }).then(response => {
                toastr["success"](response.data);
                this.getlist();
                this.unlookview = false
            }).catch(e => {
                toastr["error"](e.response.data)
            })

        },
        delitem () {
            axios({
                method: 'delete',
                url: '/api/models/' + this.item.id
            }).then(response => {
                $('#modaldelete').modal('hide');
                toastr["success"](response.data);
                this.getlist();
            }).catch(e => {
                toastr["error"](e.response.data)
            })

        },
        showdelete(it) {
          this.item = it;
          $('#modaldelete').modal('show')
        },
        close () {
            this.unlookview = false
        }
    }
});