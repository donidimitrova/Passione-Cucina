Vue.component('serving-ingredient', {
    template: '<div class="Recipe-Ingredient">{{ name }} : <span>{{ serving * baseValue }}</span>{{ metric }}</div>',
    props: ['name', 'serving', 'baseValue', 'metric']
  })
  new Vue({
    el: '#Vue',
    data() {
      return {
        serving: 1
      }
    },
    methods: {
      decreaseServing() {
        this.serving = this.serving - 1
      },
      increaseServing() {
        this.serving = this.serving + 1
      }
    }
  })


    window.console = window.console || function(t) {};
 

    if (document.location.search.match(/type=embed/gi)) {
      window.parent.postMessage("resize", "*");
    }
 

    Vue.component('star-rating', {
    
      props: {
        'name': String,
        'value': null,
        'id': String,
        'disabled': Boolean,
        'required': Boolean },
    
    
      template: '<div class="star-rating">\
            <label class="star-rating__star" v-for="rating in ratings" \
            :class="{\'is-selected\': ((value >= rating) && value != null), \'is-disabled\': disabled}" \
            v-on:click="set(rating)" v-on:mouseover="star_over(rating)" v-on:mouseout="star_out">\
            <input class="star-rating star-rating__checkbox" type="radio" :value="rating" :name="name" \
            v-model="value" :disabled="disabled">★</label></div>',
    
      /*
                                                                    * Initial state of the component's data.
                                                                    */
      data: function () {
        return {
          temp_value: null,
          ratings: [1, 2, 3, 4, 5] };
    
      },
    
      methods: {
        /*
                  * Behaviour of the stars on mouseover.
                  */
        star_over: function (index) {
          var self = this;
    
          if (!this.disabled) {
            this.temp_value = this.value;
            return this.value = index;
          }
    
        },
    
        /*
            * Behaviour of the stars on mouseout.
            */
        star_out: function () {
          var self = this;
    
          if (!this.disabled) {
            return this.value = this.temp_value;
          }
        },
    
        /*
            * Set the rating.
            */
        set: function (value) {
          var self = this;
    
          if (!this.disabled) {
            this.temp_value = value;
            return this.value = value;
          }
        } } });
    
    
    
    new Vue({
      el: '#app' });
    //# sourceURL=pen.js
  