	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="../main/dashboard">Admin System</a></h1>
			<h2 class="section_title">@yield('title')</h2>
			<div class="btn_view_site"><a href="../../auth/logout">Logout</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	<section id="secondary_bar" style="display:block">
		<div class="user">
			<p>Login as: {{$user->name}}</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container" style="display:none">
			<article class="breadcrumbs"><a href="../main/dashboard">Website Admin</a> <div class="breadcrumb_divider"></div> <a class="current">Dashboard</a></article>
		</div>
	</section><!-- end of secondary bar -->


