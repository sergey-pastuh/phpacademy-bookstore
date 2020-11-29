
<h1>Sign in</h1>
<form class="form-signin" method='post'>
    <h2 class="form-signin-heading">Please sign in</h2>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input value='<?=$form->email?>' name='email' type="text" id="inputEmail" class="form-control" placeholder="Email address"  autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input name='password' type="password" id="inputPassword" class="form-control" placeholder="Password" >
    <div class="checkbox">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>