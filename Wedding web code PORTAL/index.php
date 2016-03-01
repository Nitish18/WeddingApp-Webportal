<!DOCTYPE html> 
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title>ADMIN Login</title>
<link rel =  "stylesheet" type="text/css" href="style.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> 
</head>

<body>
<div class="container">
	<div class="row" >  
        <div class="col-md-4 col-md-offset-4">  
            <div class="login-panel panel panel-danger" id ="login_form">  
                <div class="panel-heading">  
                    <h3 class="panel-title" align="center">Sign In</h3>  
                </div>  
                <div class="panel-body">  
                    <form role="form" method="post" action="login.php">  
                        <fieldset> 
                           <div class="input-group">
                                       <span class="input-group-addon">ID</span>
                               <div class="form-group" >  
                                <input class="form-control" placeholder="Admin ID" name="username" type="text"  required autofocus>  
                               </div>  
                           </div> 
<br/><br/>
                           <div class="input-group">
                                       <span class="input-group-addon">@</span>
                            <div class="form-group">  
                                <input class="form-control" placeholder="Password" name="password" type="password" required>  
                            </div> 
                            </div> 
 <br/><br/>
                            <input class="btn btn-lg btn-danger btn-block" type="submit" value="Login" name="login" >  
  
                             </fieldset>  
                    </form>  
                </div>  
            </div>  
        </div>  
    </div>  
</div>  
  
</div>

</body>
</html>