@if ($errors->any()) |
    <span style="color: #f00;">
        @foreach ($errors->all() as $error)
            {{ $error }}
        @break
    @endforeach
</span>
@endif

@if (session('success'))
|
<span style="color: green;">
    {{ session('success') }}
</span>
@endif

@if (session('error'))
|
<span style="color: #f00;">
    {{ session('error') }}
</span>
@endif
