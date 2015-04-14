<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Password Reset Email</title>
<style>

* {
	margin: 0;
	padding: 0;
	font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
	font-size: 100%;
	line-height: 1.6;
}

blockquote {
    page-break-inside: avoid;
    padding: 10px 20px;
    margin: 0 0 20px;
    font-size: 15px;
    border-left: 5px solid #eee;
  }

.pull-right {
  float: right !important;
}

body {
	-webkit-font-smoothing: antialiased;
	-webkit-text-size-adjust: none;
	width: 100%!important;
	height: 100%;
}
.btn {
  display: inline-block;
  padding: 6px 12px;
  margin-bottom: 0;
  margin-top: 8px;
  font-size: 14px;
  font-weight: normal;
  line-height: 1.42857143;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  cursor: pointer;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  background-image: none;
  border: 1px solid transparent;
  border-radius: 4px;
  color: #fff;
  background-color: #428bca;
  border-color: #357ebd;
}

.btn:hover,
.btn:focus,
.btn:active,
.btn.active
{
  color: #fff;
  background-color: #3276b1;
  border-color: #285e8e;
}
.btn:active,
.btn.active {
  background-image: none;
}

a {
	color: #348eda;
}

table.body-wrap {
	width: 100%;
	padding: 20px;
}

table.body-wrap .container {
	border: 1px solid #f0f0f0;
}

table.footer-wrap {
	width: 100%;	
	clear: both!important;
}

.footer-wrap .container p {
	font-size: 12px;
	color: #666;
	
}

table.footer-wrap a {
	color: #999;
}

h2, h3 {
	font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
	line-height: 1.1;
	margin-bottom: 15px;
	color: #000;
	margin: 40px 0 10px;
	line-height: 1.2;
	font-weight: 200;
}

h2 {
	font-size: 25px;
}
h3 {
	font-size: 18px;
}

p {
	margin-bottom: 4px;
	font-weight: normal;
	font-size: 14px;
}

.container {
	display: block!important;
	max-width: 600px!important;
	margin: 0 auto!important; /* makes it centered */
	clear: both!important;
}

/* Set the padding on the td rather than the div for Outlook compatibility */
.body-wrap .container {
	padding: 20px;
}

/* This should also be a block element, so that it will fill 100% of the .container */
.content {
	max-width: 600px;
	margin: 0 auto;
	display: block;
}

/* Let's make sure tables in the content area are 100% wide */
.content table {
	width: 100%;
}

</style>
</head>

<body bgcolor="#f6f6f6">

<!-- body -->
<table class="body-wrap">
	<tr>
		<td></td>
		<td class="container" bgcolor="#FFFFFF">

			<!-- content -->
			<div class="content">
			<table>
				<tr>
					<td>

						<h2 align="center">Ada pendaftar baru di Aplikasi CRM.</h2>
						<hr>
						<h3 align="center">Silahkan tentukan Role/Peran User di aplikasi.
						</h3> <br>
						<hr>
						<p>Berikut Datanya :</p>
						<ul>
							<li>Username: {{{ $username }}}</li>
							<li>Email: {{{ $email }}}</li>
							<li>Nama Lengkap: {{{ $nama_lengkap }}}</li>
							<li>Level: {{{ $level }}}</li>
							<li>Bagian: {{{ $bagian }}}</li>
							<li>Area: {{{ $area }}}</li>
						</ul>
					</td>
				</tr>
			</table>
			</div>
			<!-- /content -->
			
		</td>
		<td></td>
	</tr>
</table>
<!-- /body -->

<!-- footer -->
<table class="footer-wrap">
	<tr>
		<td></td>
		<td class="container">
			
			<!-- content -->
			<div class="content">
				<table>
					<tr>
						<td align="center">
							<p><a href="http://crm.sbp.net.id">~ <unsubscribe>Aplikasi CRM PT. SBP</unsubscribe> ~</a>.
							</p>
						</td>
					</tr>
				</table>
			</div>
			<!-- /content -->
			
		</td>
		<td></td>
	</tr>
</table>
<!-- /footer -->

</body>
</html>
