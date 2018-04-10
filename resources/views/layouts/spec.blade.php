<!doctype html>
<html lang="{{ config('app.locale') }}" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">	

    <title>{{ config('app.name', 'GraceCMS') }}</title>
	
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
	<link href="{{asset('css/style.css')}}" rel="stylesheet">
	<link href="{{asset('CSS/color/default.css')}}" rel="stylesheet">

	<link href="{{ asset('spec/css/reset.css') }}" rel="stylesheet"> <!-- CSS reset -->
	<link href="{{ asset('spec/css/style.css') }}" rel="stylesheet"> <!-- Resource style -->
<link href="{{asset('css/app.css')}}" rel="stylesheet">	

<link href="{{asset('img/favicon.ico')}}" rel="shortcut icon">
<link href="{{asset('css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('summernote/summernote.css') }}" rel="stylesheet"> <!-- Resource style -->

  
 
	
	
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
	    <script src="{{ asset('spec/js/modernizr.js') }}"></script> <!-- Modernizr -->
	
  	
	
</head>
<body>
	<header class="cd-main-header">
		<a href="#0" class="cd-logo"><img src="{{asset('spec/img/cd-logo.svg')}}"  alt="Logo"></a>
		
		<div class="cd-search is-hidden">
			<form action="#0">
				<input type="text" placeholder="Search..." />
			</form>
		</div> <!-- cd-search -->

		<a href="#0" class="cd-nav-trigger">Menu<span></span></a>

		<nav class="cd-nav">
			<ul class="cd-top-nav">
				<li><a href="#0">Tour</a></li>
				<li><a href="#0">Support</a></li>
				<li class="has-children account">
					<a href="#0">
						<img src="{{asset('spec/img/cd-avatar.png')}}" src="" alt="avatar">
						Account
					</a>

					<ul>

						<li><a href="#0">My Account</a></li>
						<li><a href="#0">Edit Account</a></li>
						<li><a href="#0">Logout</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</header> <!-- .cd-main-header -->

	<main class="cd-main-content">
		<nav class="cd-side-nav">
		
			<ul>
				<li class="cd-label">Main</li>
				<li class="has-children overview">
					<a href="#0">Overview</a>
					
					<ul>
						<li><a href="#0">All Data</a></li>
						<li><a href="#0">Category 1</a></li>
						<li><a href="#0">Category 2</a></li>
					</ul>
				</li>
				<li class="has-children notifications active">
					<a href="#0">Notifications<span class="count">3</span></a>
					
					<ul>
						<li><a href="#0">All Notifications</a></li>
						<li><a href="#0">Friends</a></li>
						<li><a href="#0">Other</a></li>
					</ul>
				</li>

				<li class="has-children comments">
					<a href="#0">Comments</a>
					
					<ul>
						<li><a href="#0">All Comments</a></li>
						<li><a href="#0">Edit Comment</a></li>
						<li><a href="#0">Delete Comment</a></li>
					</ul>
				</li>
			</ul>

			<ul>
				<li class="cd-label">Secondary</li>
				<li class="has-children bookmarks">
					<a href="#0">Bookmarks</a>
					
					<ul>
						<li><a href="#0">All Bookmarks</a></li>
						<li><a href="#0">Edit Bookmark</a></li>
						<li><a href="#0">Import Bookmark</a></li>
					</ul>
				</li>
				<li class="has-children images">
					<a href="#0">Images</a>
					
					<ul>
						<li><a href="#0">All Images</a></li>
						<li><a href="#0">Edit Image</a></li>
					</ul>
				</li>

				<li class="has-children users">
					<a href="#0">Users</a>
					
					<ul>
						<li><a href="#0">All Users</a></li>
						<li><a href="#0">Edit User</a></li>
						<li><a href="#0">Add User</a></li>
					</ul>
				</li>
			</ul>

			<ul>
				<li class="cd-label">Action</li>
				<li class="action-btn"><a href="#0">+ Button</a></li>
			</ul>
		</nav>

		<div class="content-wrapper">
		<div class = "blankdivider30"></div>
			
			@yield('content')
			
			
		</div> <!-- .content-wrapper -->
	</main> <!-- .cd-main-content -->
<!-- Scripts -->
  
    <script src="{{ asset('spec/js/jquery.menu-aim.js') }}"></script>
	<script src="{{ asset('spec/js/jquery-2.1.4.js') }}"></script>
	<script src="{{ asset('spec/js/main.js') }}"></script><!-- Resource jQuery -->
	
	<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/jquery.scrollTo.js')}}"></script>
<script src="{{asset('js/jquery.nav.js')}}"></script>
<script src="{{asset('js/jquery.localscroll-1.2.7-min.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('js/isotope.js')}}"></script>
<script src="{{asset('js/jquery.flexslider.js')}}"></script>
<script src="{{asset('js/inview.js')}}"></script>
<script src="{{asset('js/animate.js')}}"></script>
<script src="{{asset('js/validate.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>





<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('js/buttons.print.min.js')}}"></script>
    <script src="{{asset('js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('js/datatables.scroller.min.js')}}"></script>
    <script src="{{asset('js/jszip.min.js')}}"></script>
    <script src="{{asset('js/pdfmake.min.js')}}"></script>
    <script src="{{asset('js/vfs_fonts.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('js/custom.min.js')}}"></script

    <!-- Datatables -->
    <script>
        $(document).ready(function() {
            var handleDataTableButtons = function() {
                if ($("#datatable-buttons").length) {
                    $("#datatable-buttons").DataTable({
                        dom: "Bfrtip",
                        buttons: [
                        {
                            extend: "copy",
                            className: "btn-sm"
                        },
                        {
                            extend: "csv",
                            className: "btn-sm"
                        },
                        {
                            extend: "excel",
                            className: "btn-sm"
                        },
                        {
                            extend: "pdfHtml5",
                            className: "btn-sm"
                        },
                        {
                            extend: "print",
                            className: "btn-sm"
                        },
                        ],
                        responsive: true
                    });
                }
            };

            TableManageButtons = function() {
                "use strict";
                return {
                    init: function() {
                        handleDataTableButtons();
                    }
                };
            }();

            $('#datatable').dataTable();

            $('#datatable-keytable').DataTable({
                keys: true
            });

            $('#datatable-responsive').DataTable();

            $('#datatable-scroller').DataTable({
                ajax: "js/datatables/json/scroller-demo.json",
                deferRender: true,
                scrollY: 380,
                scrollCollapse: true,
                scroller: true
            });

            $('#datatable-fixed-header').DataTable({
                fixedHeader: true
            });

            var $datatable = $('#datatable-checkbox');

            $datatable.dataTable({
                'order': [[ 1, 'asc' ]],
                'columnDefs': [
                { orderable: false, targets: [0] }
                ]
            });
            $datatable.on('draw.dt', function() {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_flat-green'
                });
            });

            TableManageButtons.init();
        });
    </script>
	
	   <!-- /Datatables -->
	   <script src="{{asset('summernote/summernote.min.js')}}"></script>
	   <script type="text/javascript">
        $(document).ready(function() {
            $('#summernote').summernote({
              height:200,
            });
			
			$('#summernotemodal').summernote({
              height:150,
            });

            $('#summernoteconfession').summernote({
              height:100,
            });
        });
    </script>
	
	
</body>
</html>