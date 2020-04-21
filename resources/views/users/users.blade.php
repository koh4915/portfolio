@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="media" >
                <img class="m-3 rounded" src="{{ Gravatar::src($user->email, 80) }}" alt="">
                <div class="media-body">
                    <div class="mt-4">
                        {{ $user->name }}
                    </div>
                    <div>
                        <p>{!! link_to_route('users.show', 'View profile', ['id' => $user->id]) !!}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
     {{ $users->links() }}
@endif
