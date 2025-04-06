<div>
    <form action="{{route('logout')}}" method="POST">
        @csrf
        <x-buttons.button type="submit">
            Sign Out
        </x-buttons.button>
    </form>
    {{$slot}}
</div>