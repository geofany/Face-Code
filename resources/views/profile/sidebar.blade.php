<div class="col-md-3 left-sidebar">
	<div class="panel panel-default">
		<div class="panel-heading">Sidebar - Quick Links</div>

		@if(Auth::check())
		<ul>
			<li style="list-style-type:none;">
				<a href="{{ url('/profile') }}/{{Auth::user()->slug}}">
					<img src="{{Auth::user()->pic}}"
					width="32" style="margin:5px"  />
					{{Auth::user()->name}}</a>
				</li>
				<hr style="margin:0;">
				<li style="list-style-type:none;">
					<a href="{{url('/')}}"> <img src="/img/news_feed.png"
						width="32" style="margin:5px"  />
						News Feed</a>
					</li>
					<hr style="margin:0">
					<li style="list-style-type:none;">
						<a href="{{url('/friends')}}"> <img src="/img/friends.png"
							width="32" style="margin:5px"  />
							Friends </a>
						</li>
						<hr style="margin:0">
						<li style="list-style-type:none;">
							<a href="{{url('/messages')}}"> <img src="/img/msg.png"
								width="32" style="margin:5px"  />
								Messages</a>
							</li>
							<hr style="margin:0">
							<li style="list-style-type:none;">
								<a href="{{url('/findFriends')}}"> <img src="/img/friends.png"
									width="32" style="margin:5px"  />
									Find Friends</a>
								</li>
							</ul>
							@endif
						</div>
					</div>
