@props(['prefix'])

@if ($prefix)
    @if(session()->has($prefix.'.success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session($prefix.'.success') }}
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        </div>
    @endif

    @if(session()->has($prefix.'.error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session($prefix.'.error') }}
            <button type="button" class="btn-close" <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        </div>
    @endif

    @if(session()->has($prefix.'.errors'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach(session($prefix.'.errors') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        </div>
    @endif
@else
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        </div>
    @endif

    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        </div>
    @endif

    @if(session()->has('errors'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach(session('errors') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        </div>
    @endif
@endif

