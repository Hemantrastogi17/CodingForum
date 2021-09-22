<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login to iForums</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/iFOrum/partials/_handleLogin.php" method="post">
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" class="form-control" id="emailLogin" name="emailLogin"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="passwordLogin" name="passwordLogin">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>
            </form>

        </div>
    </div>
</div>