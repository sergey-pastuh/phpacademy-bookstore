<h1>Register</h1>
<form class="form-signin" method='post'>
    <h2 class="form-signin-heading">Please register</h2>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input value='<?=$form->email?>' name='email' type="text" id="inputEmail" class="form-control" placeholder="Email address"  autofocus>
    
    <label for="inputPassword" class="sr-only">Password</label>
    <input name='password' type="password" id="inputPassword" class="form-control" placeholder="Password" >
    
    <label for="inputPasswordRepeat" class="sr-only">Repeat Password</label>
    <input name='passwordRepeat' type="password" id="inputPasswordRepeat" class="form-control" placeholder="Password" >
    
    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
</form>