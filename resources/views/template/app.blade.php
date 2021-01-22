<!doctype html>
<html lang="en">

<head>
    <title>Dashboard | Klorofil - Free Bootstrap Dashboard Template</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/linearicons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/chartist/css/chartist-custom.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" class="rel">
    <link rel="stylesheet" href="{{ asset('assets/vendor/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap.min.css" class="rel">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.bootstrap.min.css" class="rel"> --}}
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/favicon.png') }}">
</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <!-- NAVBAR -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="brand">
                <a href="/homel"><img src="{{ asset('assets/img/logo-dark.png') }}" alt="Klorofil Logo"
                        class="img-responsive logo"></a>
            </div>
            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-fullwidth"><i
                            class="lnr lnr-arrow-left-circle"></i></button>
                </div>
                {{-- <form class="navbar-form navbar-left">
                    <div class="input-group">
                        <input type="text" value="" class="form-control" placeholder="Search dashboard...">
                        <span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
                    </div>
                </form> --}}
                {{-- <div class="navbar-btn navbar-btn-right">
                    <a class="btn btn-success update-pro"
                        href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro"
                        title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO
                            PRO</span></a>
                </div> --}}
                <div id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        {{-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                <i class="lnr lnr-alarm"></i>
                                <span class="badge bg-danger">5</span>
                            </a>
                            <ul class="dropdown-menu notifications">
                                <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System
                                        space is almost full</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9
                                        unfinished tasks</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly
                                        report is available</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly
                                        meeting in 1 hour</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your
                                        request has been approved</a></li>
                                <li><a href="#" class="more">See all notifications</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                    class="lnr lnr-question-circle"></i> <span>Help</span> <i
                                    class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Basic Use</a></li>
                                <li><a href="#">Working With Data</a></li>
                                <li><a href="#">Security</a></li>
                                <li><a href="#">Troubleshooting</a></li>
                            </ul>
                        </li> --}}
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img
                                    src="{{ asset('assets/img/user.png') }}" class="img-circle" alt="Avatar">
                                <span>{{Auth::user()->name}}</span> <i
                                    class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                {{-- <li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                                <li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li> --}}
                                <li><a href="/profil/{{Auth::user()->id}}"><i class="lnr lnr-cog"></i> <span>Edit Profil</span></a></li>
                                <li><a href="{{route('logout')}}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="lnr lnr-exit"></i>
                                        <span>Logout</span></a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <!-- <li>
							<a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
						</li> -->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->
        <!-- LEFT SIDEBAR -->
        <div id="sidebar-nav" class="sidebar">
            <div class="sidebar-scroll">
                <nav>
                    <ul class="nav">
                        <li>
                            <a href="/home" class="@yield('home')"><i class="lnr lnr-home"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        @if (Auth::user()->level == "Admin")
                        
                        <li>
                            <a href="/grade" class="@yield('grade')"><i class="lnr lnr-layers"></i> <span>Data
                                    Grade</span>
                            </a>
                        </li>

                        <li>
                            <a href="/user" class="@yield('user')"><i class="lnr lnr-users"></i> <span>Pegawai</span>
                            </a>
                        </li>

                        <li>
                            <a href="/kinerja" class="@yield('kinerja')"><i class="lnr lnr-chart-bars"></i>
                                <span>Data Kinerja</span>
                            </a>
                        </li>

                        <li>
                            <a href="/tunjangan_kinerja" class="@yield('tunjangan')">
                                <i class="lnr lnr-book"></i>
                                <span>
                                    Laporan
                                </span>
                            </a>
                        </li>

                        @else
                        <li>
                            <a href="/tunjangan_pegawai" class="@yield('tunjangan')">
                                <i class="lnr lnr-briefcase"></i>
                                <span>
                                Tunjangan Kinerja
                                </span>
                            </a>
                        </li>
                        @endif

                        


                        {{-- <li><a href="panels.html" class=""><i class="lnr lnr-cog"></i> <span>Laporan</span></a></li> --}}
                        {{-- <li><a href="/absensi" class=""><i class="lnr lnr-alarm"></i>
                                <span>Data Absensi</span></a></li> --}}
                        {{-- <li>
                            <a href="#subPages" data-toggle="collapse" class="collapsed"><i
                                    class="lnr lnr-file-empty"></i> <span>Pages</span> <i
                                    class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="subPages" class="collapse ">
                                <ul class="nav">
                                    <li><a href="page-profile.html" class="">Profile</a></li>
                                    <li><a href="page-login.html" class="">Login</a></li>
                                    <li><a href="page-lockscreen.html" class="">Lockscreen</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="tables.html" class=""><i class="lnr lnr-dice"></i> <span>Tables</span></a></li>
                        <li><a href="typography.html" class=""><i class="lnr lnr-text-format"></i>
                                <span>Typography</span></a></li>
                        <li><a href="icons.html" class=""><i class="lnr lnr-linearicons"></i> <span>Icons</span></a>
                        </li> --}}
                    </ul>
                </nav>
            </div>
        </div>
        <!-- END LEFT SIDEBAR -->
        <!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            @yield('content')
            <!-- END MAIN CONTENT -->
        </div>
        <!-- END MAIN -->
        <div class="clearfix"></div>
        <footer>
            <div class="container-fluid">
                <p class="copyright">&copy; 2020 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>.
                    Sistem Informasi Tunjangan Kinerja.</p>
            </div>
        </footer>
    </div>
    <!-- END WRAPPER -->
    <!-- Javascript -->
    <script src="{{ asset ('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset ('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset ('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset ('assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset ('assets/vendor/chartist/js/chartist.min.js') }}"></script>
    <script src="{{ asset ('assets/vendor/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset ('assets/scripts/klorofil-common.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js"></script>
    {{-- <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script> --}}
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                select: true
            });
        });

    </script>


    <script>
        $(function () {
            var data, options;

            // headline charts
            data = {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                series: [
                    [23, 29, 24, 40, 25, 24, 35],
                    [14, 25, 18, 34, 29, 38, 44],
                ]
            };

            options = {
                height: 300,
                showArea: true,
                showLine: false,
                showPoint: false,
                fullWidth: true,
                axisX: {
                    showGrid: false
                },
                lineSmooth: false,
            };

            new Chartist.Line('#headline-chart', data, options);


            // visits trend charts
            data = {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
                    'Dec'
                ],
                series: [{
                    name: 'series-real',
                    data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
                }, {
                    name: 'series-projection',
                    data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
                }]
            };

            options = {
                fullWidth: true,
                lineSmooth: false,
                height: "270px",
                low: 0,
                high: 'auto',
                series: {
                    'series-projection': {
                        showArea: true,
                        showPoint: false,
                        showLine: false
                    },
                },
                axisX: {
                    showGrid: false,

                },
                axisY: {
                    showGrid: false,
                    onlyInteger: true,
                    offset: 0,
                },
                chartPadding: {
                    left: 20,
                    right: 20
                }
            };

            new Chartist.Line('#visits-trends-chart', data, options);


            // visits chart
            data = {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                series: [
                    [6384, 6342, 5437, 2764, 3958, 5068, 7654]
                ]
            };

            options = {
                height: 300,
                axisX: {
                    showGrid: false
                },
            };

            new Chartist.Bar('#visits-chart', data, options);


            // real-time pie chart
            var sysLoad = $('#system-load').easyPieChart({
                size: 130,
                barColor: function (percent) {
                    return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 -
                        percent / 100)) + ", 0)";
                },
                trackColor: 'rgba(245, 245, 245, 0.8)',
                scaleColor: false,
                lineWidth: 5,
                lineCap: "square",
                animate: 800
            });

            var updateInterval = 3000; // in milliseconds

            setInterval(function () {
                var randomVal;
                randomVal = getRandomInt(0, 100);

                sysLoad.data('easyPieChart').update(randomVal);
                sysLoad.find('.percent').text(randomVal);
            }, updateInterval);

            function getRandomInt(min, max) {
                return Math.floor(Math.random() * (max - min + 1)) + min;
            }

        });

    </script>

    <script type="text/javascript">
        var rupiah = document.getElementById('rupiah');
        rupiah.addEventListener('keyup', function (e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

    </script>

<script type="text/javascript">
    $('#golongan').on('change', function (e) {
        console.log(e);
        var id_golongan = e.target.value;
        $.get('/json-pangkat?id_golongan=' + id_golongan, function (data) {
            console.log(data);
            $('#pangkat').empty();
            $('#pangkat').append(
                '<option value="0" disable="true" selected="true">=== Silahkan Pilih Pangkat ===</option>'
            );

            $('#kec').empty();
            $('#kec').append(
                '<option value="0" disable="true" selected="true">=== Pilih Kabupaten/Kota Dahulu ===</option>'
            );

            $('#villages').empty();
            $('#villages').append(
                '<option value="0" disable="true" selected="true">=== Select Villages ===</option>'
                );

            $.each(data, function (index, kabkotaObj) {
                $('#pangkat').append('<option value="' + kabkotaObj.pangkat_id + '">' + kabkotaObj
                    .pangkat_nama + '</option>');
            })
        });
    });

    $('#pegawai').on('change', function (e) {
        console.log(e);
        var id_pegawai = e.target.value;
        $.get('/json-jk?id_pegawai=' + id_pegawai, function (data) {
            console.log(data);
            // $('#jenis_kelamin').empty();
            // $('#jenis_kelamin').append(
            //     '<input type="text" id="jenis_kelamin" name="detail_cuti_bersalin" class="form-control" placeholder="Cuti Bersalin" required>'
            //     );

            $.each(data, function (index, kecObj) {
                if (kecObj.jenis_kelamin == "Perempuan") {
                    $('#jenis_kelamin').prop("readonly", false);
                }
                else{
                    $('#jenis_kelamin').prop("readonly", true);
                }
            })
        });
    });

    $('#districts').on('change', function (e) {
        console.log(e);
        var districts_id = e.target.value;
        $.get('/json-village?districts_id=' + districts_id, function (data) {
            console.log(data);
            $('#villages').empty();
            $('#villages').append(
                '<option value="0" disable="true" selected="true">=== Select Villages ===</option>'
                );

            $.each(data, function (index, villagesObj) {
                $('#villages').append('<option value="' + villagesObj.id + '">' +
                    villagesObj
                    .name + '</option>');
            })
        });
    });

</script>


</body>

</html>
