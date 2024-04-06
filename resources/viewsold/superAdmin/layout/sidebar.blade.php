<!--start sidebar -->
<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('assets/images/logo-icon-2.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">AMS</h4>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{route('superadmin.dashboard')}}">
                <div class="parent-icon">
                    <ion-icon name="home-outline"></ion-icon>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        @if(auth('web')->user()->userType == '0')
        <li>
            <a href="{{route('superadmin.adminList')}}">
                <div class="parent-icon">
                    <ion-icon name="bag-handle-outline"></ion-icon>
                </div>
                <div class="menu-title">Admins</div>
            </a>
            <!-- <ul>
                <li><a href="#">
                        <ion-icon name="ellipse-outline"></ion-icon>Create
                    </a>
                </li>
                <li><a href="#">
                        <ion-icon name="ellipse-outline"></ion-icon>List
                    </a>
                </li>
            </ul> -->
        </li>
        @endif
        <li>
            <a href="{{route('superadmin.attendanceList')}}">
                <div class="parent-icon">
                    <ion-icon name="calendar-outline"></ion-icon>
                </div>
                <div class="menu-title">All Attendance</div>
            </a>
        </li>
        <li>
            <a href="{{route('superadmin.leaveList')}}">
                <div class="parent-icon">
                    <ion-icon name="calendar-outline"></ion-icon>
                </div>
                <div class="menu-title">All Leaves</div>
            </a>
        </li>
        <li>

            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <ion-icon name="school-outline"></ion-icon>
                </div>
                <div class="menu-title">Schools</div>
            </a>
            <ul>
                <li><a href="{{route('superadmin.schoolCreate')}}">
                        <ion-icon name="ellipse-outline"></ion-icon>Create
                    </a>
                </li>
                <li><a href="{{route('superadmin.schoolList')}}">
                        <ion-icon name="ellipse-outline"></ion-icon>List
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <ion-icon name="bag-handle-outline"></ion-icon>
                </div>
                <div class="menu-title">Headmaster</div>
            </a>
            <ul>
                <li><a href="{{route('superadmin.headmasterCreate')}}">
                        <ion-icon name="ellipse-outline"></ion-icon>Create
                    </a>
                </li>
                <li><a href="{{route('superadmin.headmasterList')}}">
                        <ion-icon name="ellipse-outline"></ion-icon>List
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <ion-icon name="bag-handle-outline"></ion-icon>
                </div>
                <div class="menu-title">Fields Staffs</div>
            </a>
            <ul>
                <li><a href="{{route('superadmin.staffCreate')}}">
                        <ion-icon name="ellipse-outline"></ion-icon>Create
                    </a>
                </li>
                <li><a href="{{route('superadmin.staffList')}}">
                        <ion-icon name="ellipse-outline"></ion-icon>List
                    </a>
                </li>
            </ul>
        </li>
        <!-- <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <ion-icon name="bag-handle-outline"></ion-icon>
                </div>
                <div class="menu-title">All Attendance</div>
            </a>
            <ul>
                
                <li><a href="#">
                        <ion-icon name="ellipse-outline"></ion-icon>List
                    </a>
                </li>
            </ul>
        </li> -->
        
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <ion-icon name="bag-handle-outline"></ion-icon>
                </div>
                <div class="menu-title">Everyone's Data</div>
            </a>
            <ul>
                <li><a href="#">
                        <ion-icon name="ellipse-outline"></ion-icon>Create
                    </a>
                </li>
                <li><a href="#">
                        <ion-icon name="ellipse-outline"></ion-icon>List
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <ion-icon name="bag-handle-outline"></ion-icon>
                </div>
                <div class="menu-title">All Report</div>
            </a>
            <ul>
                <li><a href="#">
                        <ion-icon name="ellipse-outline"></ion-icon>Create
                    </a>
                </li>
                <li><a href="#">
                        <ion-icon name="ellipse-outline"></ion-icon>List
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <ion-icon name="bag-handle-outline"></ion-icon>
                </div>
                <div class="menu-title">Role Permission</div>
            </a>
            <ul>
                <li><a href="#">
                        <ion-icon name="ellipse-outline"></ion-icon>Create
                    </a>
                </li>
                <li><a href="#">
                        <ion-icon name="ellipse-outline"></ion-icon>List
                    </a>
                </li>
            </ul>
        </li>
        @if(auth('web')->user()->userType == '0')
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <ion-icon name="bag-handle-outline"></ion-icon>
                </div>
                <div class="menu-title">Block</div>
            </a>
            <ul>
                <li><a href="{{route('blockCreate')}}">
                        <ion-icon name="ellipse-outline"></ion-icon>Create
                    </a>
                </li>
                <li><a href="{{route('blockList')}}">
                        <ion-icon name="ellipse-outline"></ion-icon>List
                    </a>
                </li>
            </ul>
        </li>
        @endif
    </ul>
    <!--end navigation-->
</aside>
<!--end sidebar -->
