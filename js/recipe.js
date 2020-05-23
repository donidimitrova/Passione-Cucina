Vue.component('porzioni', {
    template: '<div>{{ name }} : <span>{{ servire * valori }}</span>{{ metrica }}</div>',
    props: ['name', 'servire', 'valori', 'metrica']
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


    window.console = window.console || function(t) {};
 

    if (document.location.search.match(/type=embed/gi)) {
      window.parent.postMessage("resize", "*");
    }
 

    Vue.component('stelle-rating', {
    
      props: {
        'name': String,
        'value': null,
        'id': String,
        'disabled': Boolean,
        'required': Boolean },
    
    
      template: '<div class="stelle-rating">\
            <label class="star-rating__star" v-for="rating in ratings" \
            :class="{\'is-selected\': ((value >= rating) && value != null), \'is-disabled\': disabled}" \
            v-on:click="set(rating)" v-on:mouseover="star_over(rating)" v-on:mouseout="star_out">\
            <input class="star-rating star-rating__checkbox" type="radio" :value="rating" :name="name" \
            v-model="value" :disabled="disabled">★</label></div>',

      data: function () {
        return {
          temp_value: null,
          ratings: [1, 2, 3, 4, 5] };
    
      },
    
      methods: {
        star_over: function (index) {
          var self = this;
    
          if (!this.disabled) {
            this.temp_value = this.value;
            return this.value = index;
          }
    
        },
    
        star_out: function () {
          var self = this;
    
          if (!this.disabled) {
            return this.value = this.temp_value;
          }
        },
    
     
        set: function (value) {
          var self = this;
    
          if (!this.disabled) {
            this.temp_value = value;
            return this.value = value;
          }
        } } });
    
    
    
    new Vue({
      el: '#app' });

  