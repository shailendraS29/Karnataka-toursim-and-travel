<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if (isset($_GET['bookingid'])) {
    $bookingId = intval($_GET['bookingid']);
} else {
    die("Invalid booking ID.");
}

try {
    $sql = "SELECT tblbooking.BookingId, tblusers.FullName, tblusers.MobileNumber, tblusers.EmailId, 
            tbltourpackages.PackageName, tblbooking.FromDate, tblbooking.ToDate, tblbooking.Comment, 
            tblbooking.status, tblbooking.CancelledBy, tblbooking.UpdationDate 
            FROM tblusers 
            JOIN tblbooking ON tblbooking.UserEmail = tblusers.EmailId 
            JOIN tbltourpackages ON tbltourpackages.PackageId = tblbooking.PackageId 
            WHERE tblbooking.BookingId = :bookingId";
    $query = $dbh->prepare($sql);
    $query->bindParam(':bookingId', $bookingId, PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);

    if ($result) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Booking Report - GoKarnataka Tours and Travels</title>
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

                body {
                    font-family: 'Roboto', sans-serif;
                    background-color: #f0f2f5;
                    margin: 0;
                    padding: 20px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                }
                .ticket {
                    width: 100%;
                    max-width: 800px;
                    background-color: #ffffff;
                    border-radius: 10px;
                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                    overflow:hidden;
                    border: 1px solid #dee2e6;
                }
                .ticket-header {
                    background-color: #007bff;
                    color: #fff;
                    padding: 15px;
                    text-align: center;
                    position:relative;
                

                }
                .ticket-header h1 {
                    margin: 0;
                    font-size: 24px;
                    font-weight: 700;
                }
                .ticket-header p {
                    margin: 5px 0;
                    font-size: 14px;
                }
                .ticket-section {
                    padding: 20px;
                    border-bottom: 1px solid #dee2e6;
                }
                .ticket-section h2 {
                    font-size: 18px;
                    color: #007bff;
                    margin-bottom: 10px;
                    border-bottom: 2px solid #007bff;
                    display: inline-block;
                }
                .ticket-section p {
                    font-size: 14px;
                    margin: 5px 0;
                }
                .ticket-section p strong {
                    display: inline-block;
                    width: 150px;
                    font-weight: 500;
                }
                .ticket-footer {
                    padding: 20px;
                    text-align: center;
                    background-color: #f8f9fa;
                }
                .ticket-footer p {
                    margin: 0;
                    font-size: 14px;
                    color: #007bff;
                }
                .btn-download {
                    display: block;
                    width: 200px;
                    margin: 20px auto;
                    padding: 10px;
                    text-align: center;
                    background-color: #007bff;
                    color: #fff;
                    text-decoration: none;
                    border-radius: 5px;
                    font-size: 16px;
                    font-weight: bold;
                }
                .btn-download:hover {
                    background-color: #0056b3;
                }
                @media (max-width: 768px) {
    .ticket-header h1 {
        font-size: 18px;
    }
    .ticket-section h2 {
        font-size: 14px;
    }
    .ticket-section p {
        font-size: 10px;
    }
    .ticket-section p strong {
        width: auto;
    }
}
@media (max-width: 480px) {
    .ticket-header h1 {
        font-size: 16px;
    }
    .ticket-section h2 {
        font-size: 12px;
    }
    .ticket-section p {
        font-size: 10px;
    }
    .ticket-footer p {
        font-size: 10px;
    }
}

            </style>
        </head>
        <body>
            <div class="ticket">
                <div class="ticket-header">
                    <h1>GoKarnataka Tours and Travels</h1>
                    <p>Bengaluru, Karnataka</p>
                    <p>Contact: +91 8310898276</p>
                </div>

                <div class="ticket-section">
                    <h2>Booking Details</h2>
                    <p><strong>Booking ID:</strong> #BK-<?php echo $result->BookingId; ?></p>
                    <p><strong>Booking Status:</strong> 
                        <?php
                        if ($result->status == 0) {
                            echo "Pending";
                        } elseif ($result->status == 1) {
                            echo "Confirmed";
                        } elseif ($result->status == 2) {
                            if ($result->CancelledBy == 'a') {
                                echo "Canceled by Admin at {$result->UpdationDate}";
                            } elseif ($result->CancelledBy == 'u') {
                                echo "Canceled by User at {$result->UpdationDate}";
                            }
                        }
                        ?>
                    </p>
                </div>

                <div class="ticket-section">
                    <h2>Passenger Details</h2>
                    <p><strong>Full Name:</strong> <?php echo $result->FullName; ?></p>
                    <p><strong>Mobile Number:</strong> <?php echo $result->MobileNumber; ?></p>
                    <p><strong>Email ID:</strong> <?php echo $result->EmailId; ?></p>
                </div>

                <div class="ticket-section">
                    <h2>Package Details</h2>
                    <p><strong>Package Name:</strong> <?php echo $result->PackageName; ?></p>
                    <p><strong>From:</strong> <?php echo $result->FromDate; ?></p>
                    <p><strong>To:</strong> <?php echo $result->ToDate; ?></p>
                    <p><strong>Comment:</strong> <?php echo $result->Comment; ?></p>
                    <p><strong>Package Cost:</strong> ₹9000/-</p>
                </div>

                <div class="ticket-section">
                    <h2>Frequently Asked Questions</h2>
                    <p><strong>Q1:</strong> How do I cancel my booking?</p>
                    <p>A: You can cancel your booking by visiting our website and navigating to the 'My Bookings' section.</p>
                    <p><strong>Q2:</strong> Can I reschedule my trip?</p>
                    <p>A: Yes, you can reschedule your trip by contacting our customer support at least 24 hours before your trip.</p>
                    <p><strong>Q3:</strong> What is the refund policy?</p>
                    <p>A: Our refund policy can be found in the 'Terms and Conditions' section of our website.</p>
                    <p><strong>Q4:</strong> How can I contact customer support?</p>
                    <p>A: You can contact our customer support at +91 8310898276 or email us at support@gokarnataka.com.</p>
                    <p><strong>Q5:</strong> What should I do if I have a complaint?</p>
                    <p>A: If you have a complaint, please contact our customer support team, and we will do our best to resolve the issue.</p>
                </div>

                <div class="ticket-section">
                    <h2>Important Terms and Conditions</h2>
                    <p>1. The booking is non-transferable.</p>
                    <p>2. Cancellation charges apply as per the policy.</p>
                    <p>3. Please carry a valid ID proof during travel.</p>
                    <p>4. Any changes to the booking should be communicated at least 24 hours before the trip.</p>
                    <p>5. GoKarnataka Tours and Travels is not responsible for any personal belongings lost during the trip.</p>
                    <p>6. Please arrive at the departure point at least 30 minutes before the scheduled time.</p>
                </div>

                <div class="ticket-footer">
                    <p>Thank you for choosing GoKarnataka Tours and Travels!</p>
                </div>
                <a href="generate_pdf.php?bookingid=<?php echo $result->BookingId; ?>" class="btn-download">Download Ticket</a>

            </div>
        </body>
        </html>
        <?php
    } else {
        echo "No booking found with the given ID.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
