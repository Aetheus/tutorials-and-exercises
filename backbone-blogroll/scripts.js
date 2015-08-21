//Backbone Model
var Blog = Backbone.Model.extend({
    defaults: {
        author: '',
        title: '',
        url: ''
    }
});

//Backbone Collection
var Blogs = Backbone.Collection.extend({});

//instantiate two Blogs
var blog1 = new Blog({author: "Mike", title: "Mike's Blog", url: "http://michaelsblog.com"});

var blog2 = new Blog({author: "John", title: "John's Blog", url: "http://johnsblog.com"});

//instantiate a Collection
var blogs = new Blogs([blog1, blog2]);


// backbone view for 1 blog
var BlogView = Backbone.View.extend({
    model: new Blog(),
    tagName: "tr",
    initialize: function() {
        this.template = _.template(
            $(".blogs-list-template").html()
        );
    }
    render: function() {
        this.$el.html( this.template(this.model.toJSON()) )
    }
});

//backbone view for all blogs
var BlogsView = Backbone.View.extend({

});
