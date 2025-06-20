<?php
require_once('../vendor/autoload.php'); // Adjust path as necessary
include('../includes/config.php'); // Adjust path if necessary

// Create new PDF document
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('GoKarnataka Tours and Travels');
$pdf->SetTitle('Booking Report');
$pdf->SetSubject('Booking Report');

// Set default header data
$pdf->SetHeaderData('', 0, 'GoKarnataka Tours and Travels', 'Bengaluru, Karnataka.|Contact: +91 8310898276', [0, 123, 255], [0, 123, 255]);

// Set header and footer fonts
$pdf->setHeaderFont(['helvetica', 'B', 10]);
$pdf->setFooterFont(['helvetica', '', 8]);

// Set margins
$pdf->SetMargins(10, 25, 10); // Left, top, right
$pdf->SetHeaderMargin(10);
$pdf->SetFooterMargin(10);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 15);

// Set font
$pdf->SetFont('helvetica', '', 8);

// Add a page
$pdf->AddPage();

if (isset($_GET['bookingid']) && is_numeric($_GET['bookingid'])) {
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
        $html = '
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap");
            body {
                font-family: "Roboto", sans-serif;
                background-color: #f0f2f5;
                margin: 0;
                padding: 10px;
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
                overflow: hidden;
                border: 1px solid #dee2e6;
            }
            .ticket-header {
                background-color: #007bff;
                color: #fff;
                padding: 10px;
                text-align: center;
                position: relative;
            }
            .ticket-header h1 {
                margin: 0;
                font-size: 20px;
                font-weight: 700;
            }
            .ticket-header p {
                margin: 5px 0;
                font-size: 10px;
            }
            .ticket-section {
                padding: 10px;
                border-bottom: 1px solid #dee2e6;
            }
            .ticket-section h2 {
                font-size: 14px;
                color: #007bff;
                margin-bottom: 5px;
                border-bottom: 1px solid #007bff;
                display: inline-block;
            }
            .ticket-section p {
                font-size: 10px;
                margin: 2px 0;
            }
            .ticket-section p strong {
                display: inline-block;
                width: 100px;
                font-weight: 500;
            }
            .ticket-footer {
                padding: 10px;
                text-align: center;
                background-color: #f8f9fa;
            }
            .ticket-footer p {
                margin: 0;
                font-size: 10px;
                color: #007bff;
            }
            @media (max-width: 768px) {
                .ticket-header h1 {
                    font-size: 16px;
                }
                .ticket-section h2 {
                    font-size: 12px;
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
                    font-size: 14px;
                }
                .ticket-section h2 {
                    font-size: 12px;
                }
                .ticket-section p {
                    font-size: 10px;
                }
                .ticket-footer p {
                    font-size: 8px;
                }
            }
        </style>
        ';

        // Booking Details
        $html .= '
        <div class="ticket">
            <div class="ticket-header">
                <h1>GoKarnataka Tours and Travels</h1>
                <p>Bengaluru, Karnataka</p>
                <p>Contact: +91 8310898276</p>
            </div>

            <div class="ticket-section">
                <h2>Booking Details</h2>
                <p><strong>Booking ID:</strong> #BK-' . $result->BookingId . '</p>
                <p><strong>Booking Status:</strong> ' . getBookingStatus($result) . '</p>
            </div>

            <div class="ticket-section">
                <h2>Passenger Details</h2>
                <p><strong>Full Name:</strong> ' . $result->FullName . '</p>
                <p><strong>Mobile Number:</strong> ' . $result->MobileNumber . '</p>
                <p><strong>Email ID:</strong> ' . $result->EmailId . '</p>
            </div>

            <div class="ticket-section">
                <h2>Package Details</h2>
                <p><strong>Package Name:</strong> ' . $result->PackageName . '</p>
                <p><strong>From:</strong> ' . $result->FromDate . '</p>
                <p><strong>To:</strong> ' . $result->ToDate . '</p>
                <p><strong>Comment:</strong> ' . $result->Comment . '</p>
                <p><strong>Package Cost:</strong> Rs:9000/-</p>
            </div>

            <div class="ticket-section">
                <h2>Frequently Asked Questions</h2>
                <p><strong>Q1:</strong> How do I cancel my booking?</p>
                <p>A: You can cancel your booking by visiting our website and navigating to the "My Bookings" section.</p>
                <p><strong>Q2:</strong> Can I reschedule my trip?</p>
                <p>A: Yes, you can reschedule your trip by contacting our customer support at least 24 hours before your trip.</p>
                <p><strong>Q3:</strong> What is the refund policy?</p>
                <p>A: Our refund policy can be found in the "Terms and Conditions" section of our website.</p>
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
        </div>';

        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Ln(10);

        // Footer
        $pdf->SetTextColor(0, 123, 255);
        $pdf->SetFont('helvetica', '', 10);
 

        // Output PDF
        $pdf->Output('Booking_Report_' . $result->BookingId . '.pdf', 'D');
    } else {
        $pdf->Cell(0, 10, 'No booking found with the given ID.', 0, 1, 'C');
        $pdf->Output();
    }
} catch (PDOException $e) {
    $pdf->Cell(0, 10, "Error: " . $e->getMessage(), 0, 1, 'C');
    $pdf->Output();
}

function getBookingStatus($result) {
    if ($result->status == 0) {
        return "Pending";
    } elseif ($result->status == 1) {
        return "Confirmed";
    } elseif ($result->status == 2) {
        if ($result->CancelledBy == 'a') {
            return "Canceled by Admin at " . $result->UpdationDate;
        } elseif ($result->CancelledBy == 'u') {
            return "Canceled by User at " . $result->UpdationDate;
        }
    }
    return "Unknown";
}
?>
