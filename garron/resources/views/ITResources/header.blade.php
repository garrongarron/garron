<!-- Start Header -->
<header id="header">
	<!-- Header Inner -->
	<div class="header-inner">
		<div class="container">
			<div class="row">
				
				<div class="col-md-3 col-sm-6 col-xs-12">


					<!-- Logo -->
					<div class="logo" style="padding-top: 0px; cursor: pointer;"
					onclick="javascript:window.location.href = ('{{ route('ITResources') }}')">
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
<!--<li class="menu-item menu-item-type-custom menu-item-object-custom"><a title="{{ trans('home.home') }}" href="#header">{{ trans('home.home') }}</a></li>-->
		 						<!-- Authentication Links -->
		                        @guest
		                            <li><a href="{{ route('login') }}">Login</a></li>
		                            <!--<li><a href="{{ route('register') }}">Register</a></li>-->
		                        @else
		                            <li class="dropdown">
		                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
		                                    {{ Auth::user()->name }} <span class="caret"></span>
		                                </a>

		                                <ul class="dropdown-menu">
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
		                        @endguest



								</ul>
							</div>				
						</nav>
						<!--/ End Main Menu -->



						<!-- Search Form -->
						<!--<ul class="search">
							<li><a href="#header"><i class="fa fa-search"></i></a></li>
						</ul>-->
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