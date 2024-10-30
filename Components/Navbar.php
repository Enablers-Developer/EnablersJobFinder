<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Finder</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .links {
            padding: 10px;
            padding-left: 15px;
            padding-right: 15px;
            border-radius: 30px;
            align-items: center;
            color: black;
            text-decoration: none;

            &:hover {
                background-color: grey;
                color: white;
                transition: background-color 0.3s ease-in-out, color 0.2s ease-in-out;
            }
        }

        body {
            background-color: white;
        }
    </style>
</head>

<body>

    <!-- Styling a Navbar -->
    <div class="d-flex align-items-center justify-content-between">
        <!-- Starting of the Logo -->
        <div class="p-4">
            <a href="index.php" class="text-decoration-none">
                <h1 class="text-muted ps-5"><strong>Job Finder</strong></h1>
            </a>
        </div>
        <!-- Ending of the Logo -->

        <!-- Starting of the Links -->
        <div>
            <ul class="list-unstyled d-flex p-4 pe-5">
                <?php if (!isset($excludeJobs)): ?>
                    <h4>
                        <li><a href="index.php" class="links">Jobs</a></li>
                    </h4>
                <?php endif; ?>

                <?php if (empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
                    <?php if (!isset($links)): ?>
                        <h4>
                            <li>
                                <a class="links" href="login.php">Login</a>
                            </li>
                        </h4>
                        <h4>
                            <li>
                                <a class="links" href="sign-up.php">Sign Up</a>
                            </li>
                        </h4>
                    <?php endif; ?>

                <?php } else {

                    if (isset($_SESSION['id_user'])) {
                        ?>
                        <?php if (!isset($excludeJobs2)): ?>
                            <h4>
                                <li><a href="../index.php" class="links">Jobs</a></li>
                            </h4>
                        <?php endif; ?>
                        <h4>
                            <li>
                                <a class="links" href="./user/index.php">Dashboard</a>
                            </li>
                        </h4>

                        <?php
                    } else if (isset($_SESSION['id_company'])) {
                        ?>
                        <?php if (!isset($excludeJobs2)): ?>
                                <h4>
                                    <li><a href="../index.php" class="links">Jobs</a></li>
                                </h4>
                        <?php endif; ?>
                            <h4>
                                <li>
                                    <a class="links" href="./company/index.php">Dashboard</a>
                                </li>
                            </h4>

                    <?php } ?>
                    <h4>
                        <li>
                            <a class="links" href="logout.php">Logout</a>
                        </li>
                    </h4>
                <?php } ?>
            </ul>
        </div>
        <!-- Ending of the links -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>

</html>