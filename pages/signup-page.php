<div class="container d-flex justify-content-center">
    <form action="signup.php" method="post" class="d-flex flex-column gap-3 p-4 pb-2 rounded bg-light">
        <h1 class="text-center text-primary">Sign Up</h1>
        <div>
            <label for="userName">User Name</label>
            <input type="text" name="userName" class="form-control" id="userName">
        </div>
        <div>
            <label for="pass">Password</label>
            <input type="password" name="password" id="" class="form-control" id="pass">
        </div>
        <div>
            <label for="passConfirm">Confirm Password</label>
            <input type="password" name="confirmPassword" id="" class="form-control" id="passConfirm">
        </div>
        <input type="submit" value="Sign Up" name="signUp" class="btn btn-primary">
        <p>Already have an account? <a href="login.php">Log In</a></p>
    </form>
</div>