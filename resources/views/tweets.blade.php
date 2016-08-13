<div class="overlay"><div class="text-muted text-center" style="margin-top: 10px;">Loading...</div></div>
@foreach ($tweets as $key => $tweet)
	@if($key == 0)
		<div class="media twitter-media" style="margin-top: 0">
	@else	
		<div class="media twitter-media">
	@endif
	  <div class="media-left">
        <a href="{{ url('https://twitter.com/'.$tweet->screen_name) }}" target="_blank">
          <img class="media-object" src="{{ $tweet->image }}" alt="{{ $tweet->name }}">
        </a>
      </div>
      <div class="media-body">
        <div class="media-heading">
        	<div>
        		<a href="{{ url('https://twitter.com/'.$tweet->screen_name) }}" target="_blank">
        			<b>{{ $tweet->name }}</b> <span class="text-muted">&commat;{{ $tweet->screen_name }}</span>
        		</a> - <span class="text-muted" style="font-size: 13px;">{{ $tweet->created_at->diffForHumans() }}</span>
        	</div>
        	<a href="{{ url('https://twitter.com/kamaalrkhan/status/'.$tweet->twitter_id) }}" target="_blank">
        		{{ $tweet->text }}
        	</a>
        </div>
      </div>
    </div>

@endforeach

<div class="pull-right">
	<button class="btn btn-primary btn-refresh">Refresh</button>
</div>

{{ $tweets->links() }}