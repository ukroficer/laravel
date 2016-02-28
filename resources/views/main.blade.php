<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html" />
		<meta name="author" content="Silence / REPT" />
		<title>Project</title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="/css/style.css">
	</head>

	<body>

		<header>
			<div class="container">
				<div class="row">

					<nav class="navbar navbar-default" role="navigation">
						<div class="container-fluid">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand" href="#">Title</a>
							</div>
					
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse navbar-ex1-collapse">


								<ul class="nav navbar-nav navbar-right">
									<li class="active"><a href="<?=URL::to('/');?>">Main</a></li>
			            			<li><a href="<?=URL::to('/tags');?>">Tags</a></li>
								</ul>
							</div><!-- /.navbar-collapse -->
						</div>
					</nav>
					
				</div>
			</div>
		</header>
		

		<div class="container">
		    <div class="form-group text-center">
		    	<div class="success_msg">
		    		<?=Session::get('message');?>
		    	</div>
                @foreach ($errors->all() as $error)
                   <div class="error">{{ $error }}</div>
                @endforeach
 		    </div>
			<div class="row">
				@yield('content')
			</div>
           	
        </div>
		    

		<script src="http://code.jquery.com/jquery-2.2.0.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src='/js/script.js'></script>	
		<!-- ./script -->
	</body>
</html>