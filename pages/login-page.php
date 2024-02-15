<div class="container d-flex justify-content-center">
    <form action="login.php" method="post" class="d-flex flex-column gap-3 p-4 pb-2 rounded bg-light">
        <h1 class="text-center text-primary">Log In</h1>
        <div>
            <label for="userName" class="form-label">User Name</label>
            <input type="text" name="userName" class="form-control" id="userName">
        </div>
        <div>
            <label for="pass" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="pass">
        </div>
        <input type="submit" value="Log In" name="logIn" class="btn btn-primary">
        <p>Didn't have an account? <a href="signup.php">Sign Up</a></p>
    </form>
</div>