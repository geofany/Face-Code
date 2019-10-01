
/**
* First we will load all of this project's JavaScript dependencies which
* includes Vue and other libraries. It is a great starting point when
* building robust, powerful web applications using Vue and Laravel.
*/

require('./bootstrap');


/**
* Next, we will create a fresh Vue application instance and attach it to
* the page. Then, you may begin adding components to this application
* or customize the JavaScript scaffolding to fit your unique needs.
*/

const app = new Vue({
  el: '#app',
  data: {
    msg: "Update New Posts :",
    content: '',
    updatedContent:'',
    posts:[],
    postId:"",
    successMsg:"",
    commentData:{},
    commentSeen: false,
    image:'',
    bUrl:'http://localhost:8000',
    qry:'',
    results:[],

  },

  ready: function() {

    this.created();

  },

  created() {
    axios.get(this.bUrl + '/posts')
    .then(response => {
      console.log(response);
      this.posts = response.data;
      Vue.filter('myOwnTime', function(value){
        return moment(value).fromNow();
      });

    })
    .catch(function (error) {
      console.log(error);
    });
  },


  methods: {
    addPost(){
      // alert('Test');
      axios.post(this.bUrl + '/addPost', {
        content: this.content
      })
      .then((response) => {
        this.content = "";
        console.log('Saved Successfully');
        if(response.status===200) {
          // alert('Added');
          app.posts = response.data;
        }
      })
      .catch(function (error) {
        console.log(error);
      });
    },
    deletePost(id){
      axios.get(this.bUrl + '/deletePost/' + id)
      .then(response => {
        console.log(response);
        this.posts = response.data;

      })
      .catch(function (error) {
        console.log(error);
      });
    },

openModal(id){

  axios.get(this.bUrl + '/posts/' + id)
  .then(response => {
    console.log(response);
    this.updatedContent = response.data;

  })
  .catch(function (error) {
    console.log(error);
  });

},

updatePost(id){


    // alert('Test');
    axios.post(this.bUrl + '/updatePost/' + id, {
      updatedContent: this.updatedContent
    })
    .then((response) => {
      this.content = "";
      console.log('Changes Saved Successfully');
      if(response.status===200) {
        // alert('Added');
        app.posts = response.data;
      }
    })
    .catch(function (error) {
      console.log(error);
    });

},

    likePost(id){
      axios.get(this.bUrl + '/likePost/' + id)
      .then(response => {
        console.log(response);
        this.posts = response.data;

      })
      .catch(function (error) {
        console.log(error);
      });
    },

    addComment(post,key){

      axios.post(this.bUrl + '/addComment', {
        comment: this.commentData[key],
        id: post.id
      })
      .then(function (response) {
        console.log('Saved Successfully');
        if(response.status===200) {
          // alert('Added');
          app.posts = response.data;
        }
      })
      .catch(function (error) {
        console.log(error);
      });
    },

    onFileChange(e){

      var files = e.target.files || e.dataTransfer.files;
      this.createImage(files[0]);

    },

    createImage(file){

      var image = new Image;
      var reader = new FileReader;

      reader.onload = (e) => {
        this.image = e.target.result;
      };
      reader.readAsDataURL(file);

    },

    uploadImage(){

      axios.post(this.bUrl + '/saveImage', {
        image: this.image,
        content: this.content,

      })
      .then( (response) => {
        console.log('Saved Successfully');
        this.image="";
        this.content="";
        if(response.status===200) {
          // alert('Added');
          app.posts = response.data;
        }
      })
      .catch(function (error) {
        console.log(error);
      });

    },

removeImage(){
this.image="";
},

autoComplete(){
  this.results=[];
  axios.post(this.bUrl + '/search', {
  qry: this.qry
  })
  .then( (response) => {
      console.log(response);
      app.results = response.data;

  });
},

  }



});
