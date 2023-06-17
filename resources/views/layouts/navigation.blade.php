<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('dashboard') }}">{{ env('APP_NAME')  }}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('dashboard') ? 'active' : ''  }}" href="{{ route('dashboard') }}">Dashboard</a>
        </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('company.index') ? 'active' : ''  }}" aria-current="page" href="{{ route('company.index') }}">Company</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('product.index') ? 'active' : ''  }}" aria-current="page" href="{{ route('product.index') }}">Product</a>
          </li>
        </ul>
        <form method="POST" action="{{ route('logout') }}" class="d-flex">
            @csrf
            <x-dropdown-link :href="route('logout')"
            onclick="event.preventDefault();
                        this.closest('form').submit();" class="btn btn-dark">
            {{ __('Log Out') }}
        </x-dropdown-link>
        </form>
      </div>
    </div>
  </nav>
