<?php 
include('includes/checklogin.php');
check_login(); // Ensure user is an admin

// Database connection
include('includes/db_config.php'); // Make sure this path is correct

try {
    // Prepare and execute the SQL query
    $sql = "SELECT * FROM contact_messages ORDER BY created_at DESC";
    $query = $dbh->prepare($sql);
    $query->execute();
    $messages = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Handle database error
    echo "Error: " . $e->getMessage();
    $messages = []; // Ensure $messages is always defined
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Contact Messages</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        <?php include('includes/sidebar.php'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include('includes/header.php'); ?>
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Contact Messages</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Messages</li>
                        </ol>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Messages</h6>
                                </div>
                                <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Message</th>
                                                <th>Created At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($messages as $message): ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($message['id']); ?></td>
                                                    <td><?php echo htmlspecialchars($message['name']); ?></td>
                                                    <td><?php echo htmlspecialchars($message['email']); ?></td>
                                                    <td><?php echo nl2br(htmlspecialchars($message['message'])); ?></td>
                                                    <td><?php echo htmlspecialchars($message['created_at']); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php include('includes/modal.php'); ?>
                </div>
            </div>
            <?php include('includes/footer.php'); ?>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/ruang-admin.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTableHover').DataTable();
        });
    </script>
</body>
</html>
