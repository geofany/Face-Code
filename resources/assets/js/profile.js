require('./bootstrap');

const app = new Vue({
  el: '#app',
  data: {
    msg: "i am from new:",
    content: '',
    privateMsgs : [],
    singleMsgs:[],
    msgFrom: '',
    conID: '',

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
        app.conID = response.data[0].conversation_id;

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
        axios.post('http://localhost:8000/sendMessage', {
          conID: this.conID,
          msg: this.msgFrom
        })
        .then(function (response) {
          console.log(response.data);
          if(response.status===200) {
            app.singleMsgs = response.data;
          }

        })
        .catch(function (error) {
          console.log(error);
        });
      }
    },

friendID: function(id){
app.friend_id = id;
},
sendNewMsg(){
  axios.post('http://localhost:8000/sendNewMessage', {
friend_id: this.friend_id,
msg : this.newMsgFrom,
})
  .then(response => {
    console.log(response.data);
    if (response.status===200) {
      window.location.replace('http://localhost:8000/messages');
      app.msg = 'your message has been sent';
    }

  })
  .catch(function (error) {
    console.log(error);
  });
}



  }

});
