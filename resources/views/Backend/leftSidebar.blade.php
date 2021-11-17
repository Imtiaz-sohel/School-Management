      <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">
        <div class="user-profile">
        <div class="ulogo">
            <a href="{{ route('dashboard') }}">
            <!-- logo for regular state and mobile devices -->
            <div class="d-flex align-items-center justify-content-center">
                <img src="{{ asset('backend/images/logo-dark.png') }}" alt="" />
                <h3><b>Sunny</b> Admin</h3>
            </div>
            </a>
        </div>
        </div>
        <!-- sidebar menu-->
    <ul class="sidebar-menu" data-widget="tree" id="scroll">
        <li class="@yield('dashbaord')">
            <a href="{{ route('dashboard') }}">
            <i data-feather="pie-chart"></i>
            <span>Dashboard</span>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
            <i data-feather="message-circle"></i>
            <span>User Managemnt</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="@yield('user')">
                    <a href="{{ route('allUser') }}"><i class="ti-more"></i>View User</a>
                </li>
                <li>
                    <a href="{{ route('addUser') }}"><i class="ti-more"></i>Add User</a>
                </li>
            </ul>
        </li>
       @if(Auth::user()->role=='Admin')           
       <li class="treeview @yield('profile')">
           <a href="{{ route('profile') }}">
           <i data-feather="message-circle"></i>
           <span>Manage Profile</span>
           <span class="pull-right-container">
               <i class="fa fa-angle-right pull-right"></i>
           </span>
           </a>
           <ul class="treeview-menu">
               <li class="@yield('y_profile')">
                   <a href="{{ route('profile') }}"><i class="ti-more"></i>Your Profile</a>
               </li>
               <li class="@yield('c_profile')">
                   <a href="{{ route('passwordView') }}"><i class="ti-more"></i>Change Password</a>
               </li>
           </ul>
       </li>
       @endif

        <li class="treeview @yield('setup')">
            <a href="{{ route('studentClass') }}">
            <i data-feather="message-circle"></i>
            <span>Student Class</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="@yield('class')">
                    <a href="{{ route('studentClass') }}"><i class="ti-more"></i> View Student Class</a>
                </li>
                <li class="@yield('a_class')">
                    <a href="{{ route('addClass') }}"><i class="ti-more"></i>Add Student Class</a>
                </li>
            </ul>
        </li>

        <li class="treeview @yield('year')">
            <a href="{{ route('studentYearView') }}">
            <i data-feather="message-circle"></i>
            <span>Student Year</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="@yield('v_year')">
                    <a href="{{ route('studentYearView') }}"><i class="ti-more"></i>Year</a>
                </li>
                <li class="@yield('a_year')">
                    <a href="{{ route('addYear') }}"><i class="ti-more"></i>Add Year</a>
                </li>
            </ul>
        </li>

        <li class="treeview @yield('group')">
            <a href="{{ route('studentYearView') }}">
            <i data-feather="message-circle"></i>
            <span>Student Group</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="@yield('v_group')">
                    <a href="{{ route('studentGroupView') }}"><i class="ti-more"></i>Group view</a>
                </li>
                <li class="@yield('a_group')">
                    <a href="{{ route('groupAdd') }}"><i class="ti-more"></i>Group Add</a>
                </li>
            </ul>
        </li>

        <li class="treeview @yield('shift')">
            <a href="{{ route('shiftView') }}">
            <i data-feather="message-circle"></i>
            <span>Student Shift</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="@yield('v_shift')">
                    <a href="{{ route('shiftView') }}"><i class="ti-more"></i>Shift View</a>
                </li>
                <li class="@yield('a_shift')">
                    <a href="{{ route('shiftAdd') }}"><i class="ti-more"></i>Shift Add</a>
                </li>
            </ul>
        </li>

        <li class="treeview @yield('fee')">
            <a href="{{ route('feeView') }}">
            <i data-feather="message-circle"></i>
            <span>Student Fee Catgory</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="@yield('v_fee')">
                    <a href="{{ route('feeView') }}"><i class="ti-more"></i>Fee Category View</a>
                </li>
                <li class="@yield('a_fee')">
                    <a href="{{ route('feeAdd') }}"><i class="ti-more"></i>Fee Category Add</a>
                </li>
            </ul>
        </li>

        <li class="treeview @yield('feeAmount')">
            <a href="{{ route('feeAmountView') }}">
            <i data-feather="message-circle"></i>
            <span>Student Fee Amount</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="@yield('v_amount')">
                    <a href="{{ route('feeAmountView') }}"><i class="ti-more"></i>Fee Amount View</a>
                </li>
                <li class="@yield('a_amount')">
                    <a href="{{ route('feeAmountAdd') }}"><i class="ti-more"></i>Fee Amount Amount Add</a>
                </li>
            </ul>
        </li>

        <li class="treeview @yield('examtype')">
            <a href="{{ route('examTypeView') }}">
            <i data-feather="message-circle"></i>
            <span>Exam Type</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="@yield('v_examtype')">
                    <a href="{{ route('examTypeView') }}"><i class="ti-more"></i>Exam Type View</a>
                </li>
                <li class="@yield('a_examtype')">
                    <a href="{{ route('examTypeAdd') }}"><i class="ti-more"></i>Exam Type Add</a>
                </li>
            </ul>
        </li>

        <li class="treeview @yield('subject')">
            <a href="{{ route('subjectView') }}">
            <i data-feather="message-circle"></i>
            <span>Student Subject</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="@yield('v_subject')">
                    <a href="{{ route('subjectView') }}"><i class="ti-more"></i>Subject View</a>
                </li>
                <li class="@yield('a_subject')">
                    <a href="{{ route('subjectAdd') }}"><i class="ti-more"></i>Subject Add</a>
                </li>
            </ul>
        </li>

        <li class="treeview @yield('assignSubject')">
            <a href="{{ route('assignsubjectView') }}">
            <i data-feather="message-circle"></i>
            <span>Assign Subject</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="@yield('v_assignsubject')">
                    <a href="{{ route('assignsubjectView') }}"><i class="ti-more"></i>Assign Subject View</a>
                </li>
                <li class="@yield('a_assignsubject')">
                    <a href="{{ route('assignsubjectAdd') }}"><i class="ti-more"></i>Assign Subject Add</a>
                </li>
            </ul>
        </li>

        <li class="treeview @yield('degination')">
            <a href="{{ route('degisnationView') }}">
            <i data-feather="message-circle"></i>
            <span>Employee Designation</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="@yield('v_degination')">
                    <a href="{{ route('degisnationView') }}"><i class="ti-more"></i>Designation View</a>
                </li>
                <li class="@yield('a_degination')">
                    <a href="{{ route('degisnationAdd') }}"><i class="ti-more"></i>Designation Add</a>
                </li>
            </ul>
        </li>


        <li class="treeview @yield('registration')">
            <a href="#">
            <i data-feather="message-circle"></i>
            <span>Student Management</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="@yield('v_registration')">
                    <a href="{{ route('viewregistration') }}"><i class="ti-more"></i>Student Registration</a>
                </li>
            </ul>
        </li>








    </ul>
    </aside>