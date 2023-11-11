<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</head>
<body>

    <div class="container mt-2">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="#"
              style="font-size: 24px;
              font-weight: bold;
              text-decoration: none;
              color: #333;">{{__('welcome.mini-crm')}}</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('adminDashboard')}}">{{__('welcome.home')}}</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{__('welcome.company')}}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="{{route('company.create')}}">{{__('welcome.add')}} {{__('welcome.new')}} {{__('welcome.company')}}</a></li>
                      <li><a class="dropdown-item" href="{{route('company.index')}}">{{__('welcome.view')}} {{__('welcome.all')}} {{__('welcome.companies')}}</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{__('welcome.employee')}}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="{{route('employee.create')}}">{{__('welcome.add')}} {{__('welcome.new')}} {{__('welcome.employee')}}</a></li>
                      <li><a class="dropdown-item" href="{{route('employee.index')}}">{{__('welcome.view')}} {{__('welcome.all')}} {{__('welcome.employees')}}</a></li>
                    </ul>
                  </li>
                </ul>
                <form method="POST" action="{{ route('adminLogout') }}">
                    @csrf
                    <button class="btn btn-sm btn-danger" type="submit">{{__('welcome.view')}}</button>
                </form>
                <form action="{{ route('lang.switch', ['locale' => app()->getLocale()]) }}" method="post">
                  @csrf
                  <select name="locale" onchange="this.form.submit()">
                      <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                      <option value="ur" {{ app()->getLocale() == 'ur' ? 'selected' : '' }}>Urdu</option>
                  </select>
              </form>
              </div>
            </div>
          </nav>
          @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</body>
</html>
<script>
  let table = new DataTable('#myTable');
</script>