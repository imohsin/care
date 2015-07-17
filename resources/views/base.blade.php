<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    @section('head')
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    @show
</head>
<body>
    <table border="1" width="100%">
    <tr height="120">
    	<td width="120">{{--logo--}}
    		<center><H1>CARE</H1></center></td>
    	<td>{{--header--}}</td>
    </tr>
    <tr valign="top">
    	<td height="700">{{--menu--}}
			<p/>
			<a href="{{ url('/') }}">Dashboard</a><p/>
			<a href="{{ route('organizations') }}">Organizations</a><p/>
			<a href="{{ route('coupons') }}">Coupons</a><p/>
			<a href="{{ route('deliveries') }}">Deliveries</a><p/>
			<a href="{{ route('returns') }}">Returns</a><p/>
			<a href="{{ route('enquiries') }}">Enquiries</a><p/>
			<a href="{{ route('import') }}">Import</a><p/>
			<a href="{{ route('export') }}">Export</a><p/>
    	</td>
    	<td>@yield('body')</td>
    </tr>
    </table>
</body>
</html>