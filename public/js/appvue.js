Vue.config.devtools = true;

Vue.use(VueFormWizard);

new Vue({
    el: '#app',
    data () {
        return {
           tasa: ''
        }
    },
    components: {

    },
    methods: {
        onComplete: function(){
            alert('Yay. Done!');
        }
    }
});