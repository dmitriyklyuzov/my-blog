<script>
        // Extend the Backbone Collection class - used for an array
        var Posts = Backbone.Collection.extend({
            url: '/posts'
        });

        // Used for a single entity
        var Post = Backbone.Model.extend({
            urlRoot: '/posts'
        });

        // Extend the Backbone View class
        var PostList = Backbone.View.extend({
            el: '#main-table',
            render: function(){
                var that = this;
                var posts = new Posts();
                posts.fetch({
                    success: function(posts){
                        var template = _.template($("#posts-table-template").html());
                        that.$el.html(template({'posts': posts.models}));
                    }
                });
            }
        });

        // Extend the Backbone Router class
        var Router = Backbone.Router.extend({
            routes: {
                '' : 'home'
            }
        });

        // Create an instance of the extended Backbone View class
        var showpost = new ShowPost();

        // Create an instance of the extended Backbone Router class
        var router = new Router();

        // On request of the home route do this
        router.on('route:home', function(){
            showpost.render();
        });

        // Start the Backbone
        Backbone.history.start();
    </script>