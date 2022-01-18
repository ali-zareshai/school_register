<nav class="navbar-default navbar-static-side" role="navigation">
	<div class="sidebar-collapse">
		<ul class="nav metismenu" id="side-menu">
			<li class="nav-header">
				<div class="dropdown profile-element">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<span class="clear">
							<span class="block m-t-xs">
								<strong class="font-bold">{{ Auth::user()->email }}</strong>
							</span>
							<span class="text-muted text-xs block">عملیات
								<b class="caret"></b>
							</span>
						</span>
					</a>
					<ul class="dropdown-menu animated fadeInRight m-t-xs">
						<li>
							<a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">خروج</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
						</li>
					</ul>
				</div>
				<div class="logo-element">
					
				</div>
			</li>
			<li>
				<a href="{{ url('/') }}">
					<i class="fa fa-home"></i>
					<span class="nav-label">ثبت نام دانش آموز</span>
				</a>
			</li>

			<li>
				<a href="{{ url('/#/order-status') }}">
					<i class="fa fa-line-chart"></i>
					<span class="nav-label">لیست ثبت نام </span>
				</a>
			</li>
			


			<!-- <li class="active">
                        <a href="#"><i class="fa fa-chart"></i> <span class="nav-label">مجموعه</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse in" style="">
                            <li><a href="{{ url('/#/chart') }}"> زیرمجموعه </a></li>
                        </ul>
                    </li> -->
		</ul>

	</div>
</nav>