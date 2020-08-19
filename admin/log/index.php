<?php

require '../../includes/main.php';
heads();
?>


    <main>
        <div class="container">

        <div class="row">
					<div class="col s12 m12 p-0">
						<blockquote>
							<h5 class="blue-text">Dashboard</h5>
							<p>Live Server Details</p>
						</blockquote>
					</div>
			</div>

            <table id="feeTable" class="striped">
                <thead style="display: none;">
                    <tr>
                        <th>PARTICULARS</th>
                        <th>TERM</th>
                        <th>FEE DATE</th>
                        <th class="right">AMOUNT</th>
                    </tr>
                </thead>

                <tbody style="display: none;">

                </tbody>
                <tfoot style="display: none;">
                    <tr>
                        <td colspan="2">
                            <blockquote>
                                <h5 id="feeTotal"></h5>
                                <p>Total</p>
                            </blockquote>
                        </td>
                        <td colspan="2">
                            <div class="center">
                                <button onclick="redirect(this)" class="btn-large waves-effect waves-light blue tooltipped" data-position="top" data-tooltip="You will be redirected to payment gateway !">
                                    <i class="material-icons right">account_balance_wallet</i>Pay
                                </button>
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>


            <div class="fader" style="display: none;">
                <div class="divider"></div>
                <div class="divider"></div>
                <blockquote style="border-color: green;" class="ml-1">
                    <h5 class="green-text">Your Transactions</h5>
                    <p>&#38; Receipts</p>
                </blockquote>
                <table id="preTable" class="table striped fader" style="display: none;">
                    <thead>
                        <tr>
                            <th style="word-break: break-all;">TRANSACTION ID</th>
                            <th>DATE</th>
                            <th>AMOUNT</th>
                            <th class="center">STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="divider"></div>
        </div>
    </main>
<?php
footer();
?>
<script>
    $(document).ready(() => {
    $('body').fadeIn(1000);
    $('.sidenav').sidenav();
    hideTable();
    $(':button').prop('disabled', true);
    load();
    $('.tooltipped').tooltip();
});
</script>