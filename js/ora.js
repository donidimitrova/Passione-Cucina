var hours = new Date().getHours();
      
new Vue({
  el: '#app',
  data: {
    Mattina: hours < 12,
    Pomeriggio: hours >= 12 && hours < 18,
    isEvening: hours >= 18
  }
});
