<x-app>
<header class="mb-6 relative">
    <img 
    src="/images/default-profile-banner.jpg"
    alt=""
    class="mb-2"
    >
    <div class="flex justify-between items-center mb-4">
    <div>
   <h2 class="font-bold text-2xl mb-0">  {{ $user->name}} </h2>
   <p class="text-sm"> Joined {{$user->created_at->diffForHumans()}}</p>
    </div>
<div class="flex"> 
    @if (auth()->user()->is($user))
<a href="{{$user->path('edit')}}" class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs mr-2">Edit Profile </a>
@endif
@unless (auth()->user()->is($user))
<form method="POST" action="/profiles/{{$user->name}}/follow">
    @csrf
    <button type="submit" class=" rounded-full shadow py-2 px-4 text-black text-xs">
    {{auth()->user()->following($user) ? 'Unfollow Me': 'Follow Me'}}    
    </button></form>
    @endunless
</div>
    </div>
    <p class="text-sm">
        Hey I'm Bugs Bunny!
        </p>
    <img 
            src="{{$user->avatar}}"
            alt=""
            class="rounded-full mr-2 absolute"
            style="width:150px; left: calc(50% - 75px); top: 138px"
            >

</header>

@include ('_timeline',[
    'tweets' => $user->tweets
])

</x-app>