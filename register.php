<html>
<head>
  <script src="js/css.js"></script>
</head>
<body>
  <script src="js/header.js"></script>
  <link rel="stylesheet" type="text/css" href="assets/css/register.css" />

  <div id="wrapper" class="container">

    <div id="register" class="animate form">
      <span class="head">Registration</span>
      <form name="input" action="auth.php" method="POST">
    		<table align="center">
          <tr><td class="formLabel">Username:</td><td><input type="text" name="username" pattern="[A-Za-z0-9]{1,}" title="Letters or numbers only" required></td></tr>
          <tr><td class="formLabel">Password:</td><td><input type="password" name="password" pattern="[A-Za-z0-9]{1,}" title="Letters or numbers only" required></td></tr>
    			<tr><td class="formLabel">First name:</td><td><input type="text" name="firstname" pattern="[A-Za-z]{1,}" title="Letters only" required></td></tr>
    			<tr><td class="formLabel">Last name:</td><td><input type="text" name="lastname" pattern="[A-Za-z]{1,}" title="Letters only" required></td></tr>
    			<tr><td class="formLabel">Nickname:</td><td><input type="text" name="nicktname" pattern="[A-Za-z]{1,}" title="Letters only"></td></tr>
    			<tr><td class="formLabel">Gender:</td><td>
    										<input type="radio" name="sex" value="male" checked> Male
    										<input type="radio" name="sex" value="female"> Female
    								<br/>
    			</td></tr>
          <tr><td class="formLabel">Email:     </td><td><input type="email" name="email" required></td></tr>
    			<tr><td class="formLabel">Food Preferences:   </td><td>
    										<input type="checkbox" name="foodprefs" value="thai"> Thai
    										<input type="checkbox" name="foodprefs" value="japan"> Japan
    										<input type="checkbox" name="foodprefs" value="foo"> Foo
    										<input type="checkbox" name="foodprefs" value="foo2"> Foo2<br/>
    										<input type="checkbox" name="foodprefs" value="foo3"> Foo3
                        <br/>
    		</table>
    		<b id="regisbtn">
    			<input type="submit" value="Submit" style="font-size:24px;color:blue;">
    			<input type="reset" value="Reset" style="font-size:24px;color:red;">
    		</b>
    		<br/><br/>
    	</form>
    </div>
  </div>
</body>
</html>
