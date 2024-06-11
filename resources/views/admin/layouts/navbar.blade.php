  <!-- Navbar -->
  @include('admin.layouts.menu')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('design/adminLte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column">
            <li class="nav-item">
                <a href="{{aurl('exam')}}" class="nav-link mb-0">
                    <i class="nav-icon far fa-file-alt"></i>
                    <p>Templates</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('quiz.list')  }}" class="nav-link mb-0">
                    <i class="nav-icon far fa-file-alt"></i>
                    <p>Quiz</p>
                </a>
            </li>


{{--            <li class="nav-item">--}}
{{--                <a href="{{aurl('question/create')}}" class="nav-link mb-0">--}}
{{--                    <i class="nav-icon far fa-file-alt"></i>--}}
{{--                    <p>{{ trans('admin.new_question')}}</p>--}}
{{--                </a>--}}
{{--            </li>--}}


{{--            <li class="nav-item">--}}
{{--                <a href="{{aurl('answer/create')}}" class="nav-link mb-0">--}}
{{--                    <i class="nav-icon far fa-file-alt"></i>--}}
{{--                    <p>{{ trans('admin.new_answer')}}</p>--}}
{{--                </a>--}}
{{--            </li>--}}

{{--            <li class="nav-item">--}}
{{--                <a href="{{aurl('answer')}}" class="nav-link mb-0">--}}
{{--                    <i class="nav-icon far fa-file-alt"></i>--}}
{{--                    <p>{{ trans('admin.answers')}}</p>--}}
{{--                </a>--}}
{{--            </li>--}}


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
