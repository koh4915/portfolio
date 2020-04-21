<aside class="col-sm-2">
    <li class="media">
        <img class="mr-2 rounded" src="{{ Gravatar::src($user->email, 160) }}" alt="">
    </li>
    @include('user_follow.follow_button', ['user' => $user])
</aside>