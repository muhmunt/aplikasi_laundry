<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand text-white" style=""  href="{{ url('/') }}">HOME</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" ></span>
            </button>
            <div class="collapse navbar-collapse"  id="navbarNav">
                <div class="navbar-nav ml-auto p-2" style="font-size: 500px;">
                    <ul class="navbar-nav">                            
                        @yield('nav')
                    </ul>
                </div>
            </div>
    </nav>
</header>