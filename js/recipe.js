Vue.component('porzioni', {
    template: '<div>{{ name }} : <span>{{ servire * valori }}</span>{{ misura }}</div>',
    props: ['name', 'servire', 'valori', 'misura']
  })
  new Vue({
    el: '#Vue',
    data() {
      return {
        servire: 1
      }
    },
    methods: {
      meno() {
        this.servire = this.servire - 1
      },
      piu() {
        this.servire = this.servire + 1
      }
    }
  })



  Vue.component('votazione', { 
    props: {
      'name': String,
      'valore': null,
      'id': String,
      'disabled': Boolean,
      'required': Boolean },
    template: '#template-stelle',
    data: function () {
      return {
        temp_valore: null,
        voti: [1, 2, 3, 4, 5] };
    },
    methods: {
      sopra: function (index) {
        var self = this;
        if (!this.disabled) {
          this.temp_valore = this.valore;
          return this.valore = index;
        }
  
      },
      lascia: function () {
        var self = this;
  
        if (!this.disabled) {
          return this.valore = this.temp_valore;
        }
      },
      imposta: function (valore) {
        var self = this;
  
        if (!this.disabled) {
          this.temp_valore = valore;
          return this.valore = valore;
        }
      } } });
  
  
  
  new Vue({
    el: '#stelle' });

  