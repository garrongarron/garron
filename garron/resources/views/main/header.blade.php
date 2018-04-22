<!-- Start Header -->
<header id="header">
	<!-- Header Inner -->
	<div class="header-inner">
		<div class="container">
			<div class="row">
				
				<div class="col-md-3 col-sm-6 col-xs-12">
					<!-- Logo -->
					<div class="logo" style="padding-top: 0px;">
							<div style="color:white; 
							font-size: 15px;
							font-weight: 500;
							padding: 15px 15px;
							text-transform: uppercase;

							background: #F2784B;
							border-radius: 25px 0px 25px 0px;">Garron <span style="font-size: 1em; 
													color: white;
													text-transform: capitalize;
													font-style: italic;">Consulting Group</span></div>
					</div>
					<!--/ End Logo -->
				</div>
				
				<div class="col-md-9 col-sm-6 col-xs-12">
					<div class="nav-area">
						<!-- Main Menu -->
						<nav class="mainmenu">
							
							<div class="mobile-nav"></div>

							<div class="collapse navbar-collapse">
								<ul id="menu-top-menu" class="nav navbar-nav">
<li class="menu-item menu-item-type-custom menu-item-object-custom"><a title="{{ trans('home.home') }}" href="#header">{{ trans('home.home') }}</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom"><a title="{{ trans('home.about') }}" href="#about-us">{{ trans('home.about') }}</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom"><a title="{{ trans('home.service') }}" href="#service">{{ trans('home.service') }}</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom"><a title="{{ trans('home.team') }}" href="#team">{{ trans('home.team') }}</a></li>
<!--<li class="menu-item menu-item-type-custom menu-item-object-custom"><a title="{{ trans('home.project') }}" href="#project">{{ trans('home.project') }}</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom"><a title="{{ trans('home.testimonials') }}" href="#testimonial">{{ trans('home.testimonials') }}</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom"><a title="{{ trans('home.blog') }}" href="#blog">{{ trans('home.blog') }}</a></li>-->
<li class="menu-item menu-item-type-custom menu-item-object-custom"><a title="{{ trans('home.contact') }}" href="#footer-top">{{ trans('home.contact') }}</a></li>

<li class="menu-item menu-item-type-custom menu-item-object-custom">
					<form id="locale" action="{{ url('/locale') }}" method="GET" style=" padding:12px;">
							<select name="locale" class="form-control">
								<option value="en">English</option>
								<option value="es" {{ session('locale') == 'es' ? 'selected' : '' }}>Español</option>
							</select>
						</form>
						<script>
							jQuery('#locale select').on('change', function(){
								jQuery('#locale').submit();
							})
						</script>
</li>

								</ul>
							</div>				
						</nav>
						<!--/ End Main Menu -->
						<!-- Search Form -->
						<ul class="search">
							<li><a href="#header"><i class="fa fa-search"></i></a></li>
						</ul>
						<div class="search-form">
							<form class="form" 
								action="https://demo.samuraithemes.com/agency-x/" method="get" id="searchform" role="search">
							<i class="fa fa-remove"></i>
							<input type="search" placeholder="search here" value="" name="s"/>
							<button type="submit" value="send"><i class="fa fa-search"></i></button>
						</form>							
						</div>
						<!--/ End Search Form -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/ End Header Inner -->
</header>
<!--/ End Header -->