    <nav class="navbar navbar-default">
        <div class="container-fluid">
		    <div class="navbar-header">
		        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			    <span class="sr-only">Toggle Navigation</span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">{{ env('APP_TITLE') ? : "Votación ATYPAX" }}</a>
		    </div>
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
				    @if (Auth::guest())
				        <li><a href="{{route('auth/login')}}">{{ trans('nav.login') }}</a></li>
						<li><a href="{{route('auth/register')}}">{{ trans('nav.signup') }}</a></li>
				    @else
		                <li>
		                    <a href="#">{{ Auth::user()->vch_nombres }}</a>
		                </li>
                    <li>
                    {!! link_to_route('usuario.edit', $title = 'Editar', $parameters = Auth::user()->id) !!}
                    </li>
		                <li><a href="{{route('auth/logout')}}">{{ trans('nav.logout') }}</a></li>

			        @endif
				</ul>
			</div>
		</div>
	</nav>
