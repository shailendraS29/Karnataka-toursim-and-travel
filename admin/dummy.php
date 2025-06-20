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
$pdf->SetHeaderData('', 0, 'GoKarnataka Tours and Travels', 'Bengaluru, Karnataka\nContact: +91 8310898276', [0, 123, 255], [0, 123, 255]);

// Set header and footer fonts
$pdf->setHeaderFont(['helvetica', 'B', 12]);
$pdf->setFooterFont(['helvetica', '', 10]);

// Set margins
$pdf->SetMargins(15, 30, 15); // Left, top, right
$pdf->SetHeaderMargin(10);
$pdf->SetFooterMargin(10);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 20);

// Set font
$pdf->SetFont('helvetica', '', 10);

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
        // Booking Details Table
        $pdf->SetTextColor(0, 123, 255); // Blue text
        $pdf->SetFont('helvetica', 'B', 14);
        $pdf->Cell(0, 10, 'Booking Details', 0, 1, 'L');
        $pdf->SetFont('helvetica', '', 12);
        
        $html = '
        <table border="0" cellpadding="6" cellspacing="0" width="100%" style="border:1px solid #ddd; border-collapse: collapse;">
            <tr style="background-color: #f8f8f8;">
                <th width="30%" style="border: 1px solid #ddd;">Booking ID</th>
                <td style="border: 1px solid #ddd;">#BK-' . $result->BookingId . '</td>
            </tr>
            <tr>
                <th style="border: 1px solid #ddd;">Booking Status</th>
                <td style="border: 1px solid #ddd;">' . getBookingStatus($result) . '</td>
            </tr>
        </table>
        ';
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Ln(12);

        // Passenger Details Table
        $pdf->SetTextColor(0, 123, 255);
        $pdf->SetFont('helvetica', 'B', 14);
        $pdf->Cell(0, 10, 'Passenger Details', 0, 1, 'L');
        $pdf->SetFont('helvetica', '', 12);

        $html = '
        <table border="0" cellpadding="6" cellspacing="0" width="100%" style="border:1px solid #ddd; border-collapse: collapse;">
            <tr style="background-color: #f8f8f8;">
                <th width="30%" style="border: 1px solid #ddd;">Full Name</th>
                <td style="border: 1px solid #ddd;">' . $result->FullName . '</td>
            </tr>
            <tr>
                <th style="border: 1px solid #ddd;">Mobile Number</th>
                <td style="border: 1px solid #ddd;">' . $result->MobileNumber . '</td>
            </tr>
            <tr>
                <th style="border: 1px solid #ddd;">Email ID</th>
                <td style="border: 1px solid #ddd;">' . $result->EmailId . '</td>
            </tr>
        </table>
        ';
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Ln(12);

        // Package Details Table
        $pdf->SetTextColor(0, 123, 255);
        $pdf->SetFont('helvetica', 'B', 14);
        $pdf->Cell(0, 10, 'Package Details', 0, 1, 'L');
        $pdf->SetFont('helvetica', '', 12);

        $html = '
        <table border="0" cellpadding="6" cellspacing="0" width="100%" style="border:1px solid #ddd; border-collapse: collapse;">
            <tr style="background-color: #f8f8f8;">
                <th width="30%" style="border: 1px solid #ddd;">Package Name</th>
                <td style="border: 1px solid #ddd;">' . $result->PackageName . '</td>
            </tr>
            <tr>
                <th style="border: 1px solid #ddd;">From</th>
                <td style="border: 1px solid #ddd;">' . $result->FromDate . '</td>
            </tr>
            <tr>
                <th style="border: 1px solid #ddd;">To</th>
                <td style="border: 1px solid #ddd;">' . $result->ToDate . '</td>
            </tr>
            <tr>
                <th style="border: 1px solid #ddd;">Comment</th>
                <td style="border: 1px solid #ddd;">' . $result->Comment . '</td>
            </tr>
            <tr>
                <th style="border: 1px solid #ddd;">Package Cost</th>
                <td style="border: 1px solid #ddd;">Rs:9000/-</td>
            </tr>
        </table>
        ';
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Ln(12);

        // FAQ Table
        $pdf->SetTextColor(0, 123, 255);
        $pdf->SetFont('helvetica', 'B', 14);
        $pdf->Cell(0, 10, 'Frequently Asked Questions', 0, 1, 'L');
        $pdf->SetFont('helvetica', '', 12);

        $html = '
        <table border="0" cellpadding="6" cellspacing="0" width="100%" style="border:1px solid #ddd; border-collapse: collapse;">
            <tr style="background-color: #f8f8f8;">
                <td style="border: 1px solid #ddd;"><strong>Q1:</strong> How do I cancel my booking?</td>
                <td style="border: 1px solid #ddd;">A: You can cancel your booking by visiting our website and navigating to the \'My Bookings\' section.</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ddd;"><strong>Q2:</strong> Can I reschedule my trip?</td>
                <td style="border: 1px solid #ddd;">A: Yes, you can reschedule your trip by contacting our customer support at least 24 hours before your trip.</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ddd;"><strong>Q3:</strong> What is the refund policy?</td>
                <td style="border: 1px solid #ddd;">A: Our refund policy can be found in the \'Terms and Conditions\' section of our website.</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ddd;"><strong>Q4:</strong> How can I contact customer support?</td>
                <td style="border: 1px solid #ddd;">A: You can contact our customer support at +91 8310898276 or email us at support@gokarnataka.com.</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ddd;"><strong>Q5:</strong> What should I do if I have a complaint?</td>
                <td style="border: 1px solid #ddd;">A: If you have a complaint, please contact our customer support team, and we will do our best to resolve the issue.</td>
            </tr>
        </table>
        ';
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Ln(12);

        // Terms and Conditions Table
        $pdf->SetTextColor(0, 123, 255);
        $pdf->SetFont('helvetica', 'B', 14);
        $pdf->Cell(0, 10, 'Important Terms and Conditions', 0, 1, 'L');
        $pdf->SetFont('helvetica', '', 12);

        $html = '
        <table border="0" cellpadding="6" cellspacing="0" width="100%" style="border:1px solid #ddd; border-collapse: collapse;">
            <tr style="background-color: #f8f8f8;">
                <td style="border: 1px solid #ddd;">1. The booking is non-transferable.</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ddd;">2. Cancellation charges apply as per the policy.</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ddd;">3. Please carry a valid ID proof during travel.</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ddd;">4. Any changes to the booking should be communicated at least 24 hours before the trip.</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ddd;">5. GoKarnataka Tours and Travels is not responsible for any personal belongings lost during the trip.</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ddd;">6. Please arrive at the departure point at least 30 minutes before the scheduled time.</td>
            </tr>
        </table>
        ';
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Ln(12);

        // Footer
        $pdf->SetTextColor(0, 123, 255);
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0, 10, 'Thank you for choosing GoKarnataka Tours and Travels!', 0, 1, 'C');

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
