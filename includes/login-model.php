<!-- Login Modal -->

<div class="modal fade"
     id="loginModal"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content"
             style="
             background:#161616;
             color:white;
             border:1px solid #2a2a2a;
             border-radius:18px;
             ">

            <!-- Header -->

            <div class="modal-header border-0">

                <h4 class="modal-title">

                    Login

                </h4>

                <button type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal">

                </button>

            </div>

            <!-- Body -->

            <div class="modal-body">

                <form method="POST"
                      action="api/login-process.php">

                    <!-- Email -->

                    <div class="mb-3">

                        <label class="form-label">Email</label>

                        <input type="email"
                               name="email"
                               class="form-control"
                               required>

                    </div>

                    <!-- Password -->

                    <div class="mb-3">

                        <label class="form-label">

                            Password

                        </label>

                        <input type="password"
                               name="password"
                               class="form-control"
                               required>

                    </div>

                    <!-- Remember -->

                    <div class="form-check mb-3">

                        <input class="form-check-input"
                               type="checkbox">

                        <label class="form-check-label">

                            Remember Me

                        </label>

                    </div>

                    <!-- Login Button -->

                    <button type="submit"
                            class="btn btn-warning w-100">

                        Login

                    </button>

                </form>

                <!-- Extra Links -->

                <div class="text-center mt-4">

                    <a href="auth/forgot-password.php"
                       class="text-warning text-decoration-none">

                        Forgot Password?

                    </a>

                    <br><br>

                    <span style="color:#aaa;">

                        Don't have an account?

                    </span>

                    <a href="auth/signup.php"
                       class="text-warning text-decoration-none">

                        Signup

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>