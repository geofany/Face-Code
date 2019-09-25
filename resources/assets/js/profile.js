require('./bootstrap');

const app = new Vue({
  el: '#app',
  data: {
    msg: "i am from new:",
    content: '',
    privateMsgs : [],
    singleMsgs:[],
    msgFrom: '',

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
messages: function(id) {
  axios.get('http://localhost:8000/getMessages/' + id)
  .then(response => {
    console.log(response.data);
    app.singleMsgs = response.data;

  })
  .catch(function (error) {
    console.log(error);
  });
},

inputHandler(e) {
if (e.keyCode === 13 && !e.shiftKey) {
  e.preventDefault();
  this.sendMsg();
}
},
sendMsg() {
if (this.msgFrom) {
  alert(this.msgFrom);
}
}



  }

});
