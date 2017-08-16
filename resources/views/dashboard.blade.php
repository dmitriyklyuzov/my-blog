<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin Dashboard</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Bootstrap Core CSS -->
		<link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/admin-panel.css') }}" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
		<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	</head>

	<body>

		<!-- Navbar -->
		<nav id="main-navbar" class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="{{ url('/') }}">Admin Panel</a>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
					<!-- <ul class="nav navbar-nav">
						<li class="active"><a href="#" onclick="event.preventDefault(); loadElement('users');">Dashboard</a></li>
						<li><a href="#" onclick="event.preventDefault(); loadElement('pages');">Pages</a></li>
						<li><a href="#" onclick="event.preventDefault(); loadElement('posts');">Posts</a></li>
						<li><a href="#" onclick="event.preventDefault(); loadElement('users');">Users</a></li>
					</ul> -->
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
										Hi, {{ strtoupper($user->name) }} <span class="caret"></span>
								</a>

								<ul class="dropdown-menu" role="menu">
										<li>
												<a href="{{ route('logout') }}"
														onclick="event.preventDefault();
																		 document.getElementById('logout-form').submit();">
														Logout
												</a>

												<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
														{{ csrf_field() }}
												</form>
										</li>
								</ul>
						</li>
						</li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav> <!-- #main-navbar -->

		<section id="main">
			<div class="container">
				<div class="row">

					<!-- Left navbox -->
					<div class="col-md-3">

						<div class="list-group">
							<a href="#" onclick="event.preventDefault(); loadElement('overview');" class="list-group-item active">
								<i class="fa fa-cog" aria-hidden="true"></i> Dashboard
							</a>
							<a href="#" onclick="event.preventDefault(); loadElement('pages');" class="list-group-item">
								<i class="fa fa-list-ul" aria-hidden="true"></i> Pages
								<span class="badge">3</span>
							</a>
							<a href="#" onclick="event.preventDefault(); loadElement('posts');" class="list-group-item">
								<i class="fa fa-pencil" aria-hidden="true"></i> Posts
								<span class="badge">3</span>
							</a>
							<a href="#" onclick="event.preventDefault(); loadElement('users');" class="list-group-item">
								<i class="fa fa-user" aria-hidden="true"></i> Users
								<span class="badge">4</span>
							</a>
						</div>
						
						<!-- Statistics -->
						<div class="panel">
							<div class="panel-heading blue white-text">
								<h3 class="panel-title">Disk Usage</h3>
							</div>
							<div class="panel-body">
								<div class="progress">
									<div class="progress-bar progress-bar-warning" role="progressbar"
										aria-valuenow="85"
										aria-valuemin="0"
										aria-valuemax="100"
										style="width: 85%;">
											85%
									</div>
								</div>
							</div>
						</div>

						<div class="panel">
							<div class="panel-heading blue white-text">
								<h3 class="panel-title">Bandwidth Used</h3>
							</div>
							<div class="panel-body">
								<div class="progress">
									<div class="progress-bar progress-bar-success" role="progressbar"
										aria-valuenow="40"
										aria-valuemin="0"
										aria-valuemax="100"
										style="width: 40%;">
											40%
									</div>
								</div>
							</div>
						</div>

					</div>

					<!-- Main content -->
					<div class="col-md-9">

						<!-- Overview panel -->
						<span id="overview-panel">
							<div class="panel">
								<div class="panel-heading panel-blue-white">
									<h3 class="panel-title">Overview</h3>
								</div>
								<div class="panel-body">

								<!-- Users  -->
									<div class="col-lg-3 col-sm-6 col-xs-12">
										<a href="#" onclick="event.preventDefault(); loadElement('users');">
											<div class="thumbnail background-primary">
												<div class="caption clearfix">
													<div class="col-xs-3">
														<h1 style="color: #fff;" class="text-center">
															<i class="fa fa-users" aria-hidden="true"></i>
														</h1>
													</div>
													<div class="col-xs-9">
														<h4 style="color: #fff; text-align: right">3</h4>
														<!-- <h4 style="color: #fff; text-align: right"><span id="user-number">0</span></h4> -->
														<b><p style="color: #fff; text-align: right">USERS</p></b>
													</div>
												</div>
											</div>
										</a>
									</div>

									<!-- Pages -->
									<div class="col-lg-3 col-sm-6 col-xs-12">
										<a href="#" onclick="event.preventDefault(); loadElement('pages');">
											<div class="thumbnail background-success">
												<div class="caption clearfix">
													<div class="col-xs-3">
														<h1 style="color: #fff;" class="text-center">
															<i class="fa fa-list-ul" aria-hidden="true"></i>
														</h1>
													</div>
													<div class="col-xs-9">
														<h4 style="color: #fff; text-align: right">3</h4>
														<b><p style="color: #fff; text-align: right">PAGES</p></b>
													</div>
												</div>
											</div>
										</a>
									</div>

									<!-- Posts -->
									<div class="col-lg-3 col-sm-6 col-xs-12">
										<a href="#" onclick="event.preventDefault(); loadElement('posts');">
											<div class="thumbnail background-info">
												<div class="caption clearfix">
													<div class="col-xs-3">
														<h1 style="color: #fff;" class="text-center">
															<i class="fa fa-pencil" aria-hidden="true"></i>
														</h1>
													</div>
													<div class="col-xs-9">
														<h4 style="color: #fff; text-align: right">3</h4>
														<b><p style="color: #fff; text-align: right">POSTS</p></b>
													</div>
												</div>
											</div>
										</a>
									</div>

									<!-- Visitors -->
									<div class="col-lg-3 col-sm-6 col-xs-12">
										<a href="#">
											<div class="thumbnail background-warning">
												<div class="caption clearfix">
													<div class="col-xs-3">
														<h1 style="color: #fff;" class="text-center">
															<i class="fa fa-globe" aria-hidden="true"></i>
														</h1>
													</div>
													<div class="col-xs-9">
														<h4 style="color: #fff; text-align: right">7,456</h4>
														<b><p style="color: #fff; text-align: right">VISITORS</p></b>
													</div>
												</div>
											</div>
										</a>
									</div>

								</div>
							</div> <!-- top panel -->
						</span>

						<!-- Main table panel -->
						<div class="panel">
							{{-- Main panel goes here --}}
							<span id="main-table">

								<script type="text/template" id="posts-table-template">
									<div class="panel-heading panel-blue-white clearfix">
										<div class="col-md-11">
											<h3 class="panel-title" id="main-panel-heading">Your blog posts</h3>
										</div>
										<div class="col-md-1">
											<!-- <button class="btn btn-default" type="button">Add new</button> -->
											<a id="main-panel-add-link" data-toggle="modal" href="#/new"><i style="color:white;" class="fa fa-plus fa-lg"></i></a>
										</div>
									</div>
									<div class="panel-body" id="main-panel-body">
										<div class="table-responsive">
											{{-- Main table goes here --}}
											<table class="table table-striped table-hover">
												<thead>
													<th>ID</th>
													<th>Title</th>
													<th>Published</th>
													<th>Created</th>
													<th></th>
												</thead>
												
												<% _.each(posts, function(post){ %>
													<tr>
														<td><%= post.get('id') %></td>
														<td><%= post.get('title') %></td>
														<td>
															<% if(post.get('published')==1){ %>
																<i class="fa fa-check" aria-hidden="true"></i>
															<% }
															else{ %>
																<i class="fa fa-times" aria-hidden="true"></i>
															<% } %>



														</td>
														<td><%= post.get('created_at') %></td>
														<td>
															{{-- <button class="btn btn-sm btn-default" type="button" id="dropdownMenuButton">
																	<i class="fa fa-pencil" aria-hidden="true"></i> Edit
															</button> --}}

															<a class="btn btn-sm btn-default" type="button" data-toggle="modal" data-target="#addPostModal">
																<i class="fa fa-pencil" aria-hidden="true"></i> Edit
															</a>
														</td>
													</tr>

												<% }); %>
												
											</table>
										</div>
									</div>
								</script>
							</span>
						</div> <!-- main table panel -->

					</div> <!-- col-md-9 -->
				</div> <!-- row -->
			</div> <!-- container -->
		</section> <!-- main -->

		<script src="{{ asset('jquery/jquery.min.js') }}"></script>

		{{-- Modals --}}

		<!-- Add post -->
    <div class="modal fade" id="addPostModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action="">
          
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Add a new post</h4>
            </div>
            <div class="modal-body">

              <div class="form-group">
                <label>Post Title</label>
                <input type="text" class="form-control" placeholder="Post Title">  
              </div>
              
              <div class="form-group">
                <label>Post Body</label>
                <textarea name="post-editor" class="form-control" placeholder="Post Body"></textarea>
              </div>

              <div class="checkbox">
                <label>
                  <input type="checkbox"> Published
                </label>
              </div>

              <div class="form-group">
                <label>Topics</label>
                <br>
                <input type="checkbox"> Drama &nbsp;
                <input type="checkbox"> Comedy &nbsp;
                <input type="checkbox"> Horror
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>

		<!-- Bootstrap core JavaScript-->
		{{-- <script src="{{ asset('jquery/jquery.min.js') }}"></script> --}}
		<script src="{{ asset('underscore/underscore.js') }}"></script>
		<script src="{{ asset('backbone/backbone.js') }}"></script>

		

		<script>
			
			// Extend the Backbone Collection class
			var Posts = Backbone.Collection.extend({
				url: '/posts'
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
					'' : 'home',
					'new' : 'editPost'
				}
			});

			// Create an instance of the extended Backbone View class
			var postlist = new PostList();

			// Create an instance of the extended Backbone Router class
			var router = new Router();

			// On request of the home route do this
			router.on('route:home', function(){
				postlist.render();
			});

			router.on('route:editPost', function(){
				console.log('Editing a post');
			});

			// Start the Backbone
			Backbone.history.start();

		</script>
	</body>
</html>