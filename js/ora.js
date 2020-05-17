var hours = new Date().getHours();
      
new Vue({
  el: '#app',
  data: {
    isMorning: hours < 12,
    isAfternoon: hours >= 12 && hours < 18,
    isEvening: hours >= 18
  }
});
