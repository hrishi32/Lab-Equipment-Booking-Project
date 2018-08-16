<html>
<head>
<title>IIT Mandi|Internet Access</title>
<link rel="stylesheet" href="ldap/css/style.css" type="text/css">
</head>
<body>
<div class="wrapper row1">

</div>
<!-- content -->
<div class="wrapper row2">
  <div class="clear" id="container">
    <section id="slider"><a href="#"><img alt="" src="ldap/images/banner.jpg"></a></section>
    <!-- content body -->
    <aside id="left_column">
      <h2 class="title">Categories</h2>
      <nav>
        <ul>
          
          <li><a href="http://wing.iitmandi.ac.in/" target="_blank">WING Portal</a></li>
          <li><a href="http://insite.iitmandi.ac.in/" target="_blank">Intranet</a></li>
	  <li><a href="faq.php" target="_blank">FAQ</a></li>
          </ul>
      </nav>
      <!-- /nav -->
      <h2 class="title">Contacts</h2>
      <section class="last">
        <address>
        						<b>Lalit Thakur</b><br>
							Sr. Lab Assistant, WING,<br>
							Phone: 01905267129 <br>
        						Email: <a href="#">Lalit@iitmandi.ac.in</a><br><br>
        						
        						 
        					</address>
      </section>
      <!-- /section -->
    </aside>
    <!-- main content -->
    <div id="content">
      <article>
 <form action="{{route('login')}}" method="post" name="login_form">
  @csrf
                        <table>
                                <tbody>
                                        <tr><td></td><td><b>IIT Mandi LDAP Login</b></td></tr>
                                        <tr><td></td><td></td></tr>
                                        <tr><td>Username</td><td><input type="text" name="username" value="" /></td></tr>
                                        <tr><td>Password</td><td><input type="password" name="password" /></td></tr>
                                        <tr>
                                                <td></td>
                                                <td>
                                                        <input type="submit" value="Submit" />&nbsp;&nbsp;
                                                        <input type="reset" value="Reset" name="reset" id="reset">
                                                </td>
                                        </tr>
                                </tbody>
                        </table>

 </article>
    </div>
    <!-- / content body -->
  </div>
</div>
<!-- footer -->
<div class="wrapper row3">
  <footer class="clear" id="footer">
    <p class="fl_right">Copyright &copy; 2016 - All Rights Reserved - <a href="http://iitmandi.ac.in" target="_blank">IIT Mandi</a></p><br>
<hr>
   
  </footer>
</div>