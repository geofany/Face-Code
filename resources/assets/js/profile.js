require('./bootstrap');

const app = new Vue({
  el: '#app',
  data: {
    msg: "i am from new:",
    content: '',
    privateMsgs : [],

  },

  ready: function() {

    this.created();

  },

  created() {
    axios.get('http://localhost:8000/getMessages')
    .then(response => {
      console.log(response.data);
      app.privateMsgs = response.data;

    })
    .catch(function (error) {
      console.log(error);
    });
  },
  

  methods: {

  }

});
