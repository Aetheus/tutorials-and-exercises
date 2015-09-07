
/* part 3*/
(function($){

    var Item = Backbone.Model.extend({
        defaults: {
            part1: "Hello",
            part2: "World"
        }
    });

    var List = Backbone.Collection.extend({
        model: Item
    });

    var ListView = Backbone.View.extend({
        el: $("body"),

        events: {
            "click button#add" : "addItem"
        },


        initialize: function (){
            _.bindAll(this, "render", "addItem","appendItem");

            this.collection = new List();

            // bind the "add" event of the collection to the appendItem function
            // thus when a new item is added, the view is updated view the appendItem function
            this.collection.bind("add", this.appendItem);

            this.collection.add(new Item());

            this.counter = 1;

            this.render();
        },

        render: function (){
            $(this.el).append('<button id="add" > Add Item </button>');
            $(this.el).append('<ul> <li> Stuff: </li> </ul>')

            var self = this;
            _.each(this.collection.models, function(item){
                self.appendItem(item);
            });

        addItem: function (){
            var item = new Item();
            item.set({
                part1: "Hello", part2: "World"
            });
            this.collection.add(item);  //this triggers the "add" event, which in turn calls appendItem function (See initialize)
        },

        //this function is meant to be called when the "add" event of the collection is triggered
        appendItem: function(item){
            $("ul",this.el).append("<li>" + item.get("part1") + " " + item.get("part2") + " #" + this.counter +" </li>");
            this.counter++;
        },
    });

    var lv = new ListView();

})(jQuery);




/*  Part 2
    (function($){

    var ListView = Backbone.View.extend({
        el: $("body"),  //attaches "this.el" to an existing element

        //bind a DOM element's event (e.g: button#add's click) to a function in the view (e.g: add item)
        events: {
                "click button#add": "addItem"
        },

        counter: 1,     //custom attr for our view to keep track of how many items in list

        initialize: function (){
                _.bindAll(this, "render", "addItem");  // fix loss of context for "this" within methods. Every func that uses "this" should be in here

                this.render();
        },

        render: function(){
            $(this.el).append('<button id="add"> Add Item </button>');
            $(this.el).append("<ul><li> hello world! </li></ul>")
        },

        addItem: function(){
            $("ul", this.el).append("<li> Hello world " + this.counter + "</li>");
            this.counter++;
        }
    });


    var listView = new ListView();

})(jQuery);*/
